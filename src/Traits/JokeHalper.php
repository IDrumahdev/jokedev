<?php

namespace Ibnudirsan\Jokedev;

use GuzzleHttp\Client;

class JokeHalper {

    public static function Random()
    {
        $client     = new CLient();

        $response   = $client->request('GET','https://icanhazdadjoke.com', [
            'headers' => [
                'Accept'    => 'text/plain',
            ]
        ]);

        if($response->getStatusCode() != 200) {
            return 'Gagal akses API Joke.';
        }
            
            $responseData = [
                'error'     => false,
                'info'      => [
                    'httpcode'  =>200,
                    'data'      => (string)$response->getBody(),
                    ]
                ];

            return response()->json($responseData, 200);
    }

}