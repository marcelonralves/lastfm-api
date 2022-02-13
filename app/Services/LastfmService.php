<?php

namespace App\Services;

use GuzzleHttp\Client;

class LastfmService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(array('verify' => false));
    }
    public function getArtists(string $username)
    {
        $url = "https://ws.audioscrobbler.com/2.0/";
        $request = $this->client->request("GET", $url, [
            'query' => [
                'method' => 'user.gettopalbums',
                'user' => $username,
                'api_key' => env('API_LASTFM'),
                'format' => 'json',
                'period' => '7day'
            ]
        ]);

        return json_decode($request->getBody(), true);
    }
}
