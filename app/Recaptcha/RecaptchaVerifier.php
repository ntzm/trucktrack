<?php

namespace App\Recaptcha;

use GuzzleHttp\Client;

class RecaptchaVerifier
{
    /**
     * @var Client
     */
    private $http;

    /**
     * @var string
     */
    private $secretKey;

    public function __construct(Client $http, string $secretKey)
    {
        $this->http = $http;
        $this->secretKey = $secretKey;
    }

    /**
     * Verify a reCAPTCHA response.
     *
     * @param string $input
     * @param string|null $ip
     *
     * @return bool
     *
     * @throws RecaptchaException
     */
    public function verify(string $input, string $ip = null): bool
    {
        $response = $this->http->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => $this->buildRequest($input, $ip),
        ]);

        $data = json_decode($response->getBody(), true);

        if (isset($data['error-codes'])) {
            throw new RecaptchaException(implode(', ', $data['error-codes']));
        }

        return $data['success'];
    }

    /**
     * Build the request from the input and the IP address.
     *
     * @param string $input
     * @param string|null $ip
     *
     * @return array
     */
    private function buildRequest(string $input, string $ip = null): array
    {
        $data = [
            'secret' => $this->secretKey,
            'response' => $input,
        ];

        if ($ip !== null) {
            $data['remoteip'] = $ip;
        }

        return $data;
    }
}
