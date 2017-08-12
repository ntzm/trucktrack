<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Config\Repository as Config;
use Illuminate\Session\Store as Session;
use Illuminate\Support\Str;

class AddSecurityHeaders
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var Session
     */
    private $session;

    public function __construct(Config $config, Session $session)
    {
        $this->config = $config;
        $this->session = $session;
    }

    public function handle($request, Closure $next)
    {
        $this->session->put('nonce', $nonce = Str::random(32));

        return $next($request)
            ->withHeaders([
                'Content-Security-Policy' => "default-src 'self' 'nonce-$nonce'",
                'Referrer-Policy' => 'no-referrer',
                'Strict-Transport-Security' => 'max-age=63072000; includeSubdomains',
                'X-Content-Type-Options' => 'nosniff',
                'X-Frame-Options' => 'DENY',
                'X-XSS-Protection' => '1; mode=block',
            ]);
    }
}
