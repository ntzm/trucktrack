<?php

namespace App\Directions;

use App\Models\Location;
use GuzzleHttp\Client;
use Illuminate\Cache\Repository as Cache;

class PolylineFetcher
{
    const CACHE_PREFIX = 'directions:';

    /**
     * @var Cache
     */
    private $cache;

    /**
     * @var Client
     */
    private $http;

    /**
     * @var string
     */
    private $apiKey;

    public function __construct(Cache $cache, Client $http, string $apiKey)
    {
        $this->cache = $cache;
        $this->http = $http;
        $this->apiKey = $apiKey;
    }

    /**
     * Fetch the directions polyline from the cache if it exists, or query
     * Google's directions API for it.
     *
     * @param Location $from
     * @param Location $to
     *
     * @return string
     */
    public function fetch(Location $from, Location $to): string
    {
        $key = $this->getCacheKey($from, $to);

        return $this->cache->rememberForever($key, function () use ($from, $to) {
            return $this->queryApi($from, $to);
        });
    }

    /**
     * Query Google's directions API for directions and return the encoded
     * overview polyline.
     *
     * @param Location $from
     * @param Location $to
     *
     * @return string
     *
     * @throws DirectionsRequestException
     */
    private function queryApi(Location $from, Location $to): string
    {
        $response = $this->http->get('https://maps.googleapis.com/maps/api/directions/json', [
            'query' => [
                'origin' => $from->name.','.$from->country->name,
                'destination' => $to->name.','.$to->country->name,
                'travelMode' => 'DRIVING',
                'key' => $this->apiKey,
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        if ($data['status'] !== 'OK') {
            throw new DirectionsRequestException($data['status']);
        }

        return $data['routes'][0]['overview_polyline']['points'];
    }

    /**
     * Get the cache key for two locations.
     *
     * It doesn't matter what order the locations are in, so we'll do a basic
     * sort beforehand so we don't generate two different cache entries for the
     * same line.
     *
     * @param Location $from
     * @param Location $to
     *
     * @return string
     */
    private function getCacheKey(Location $from, Location $to): string
    {
        $locations = [$from->id, $to->id];

        sort($locations);

        return self::CACHE_PREFIX.implode('|', $locations);
    }
}
