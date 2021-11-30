<?php

namespace App\Helpers;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Message;

class Helper
{
    /**
     * @param $url_params
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function makeApiCalls($url_params)
    {
        try {
            $client = new Client();
            $apiRequest = $client->request('GET', config('app.news_api_url') .$url_params.'&apiKey=' . config('app.news_api_key'));
            return json_decode($apiRequest->getBody()->getContents(), true);
        } catch (RequestException $e) {
            //For handling exception
            
            echo Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Message::toString($e->getResponse());
            }
        }
    }
}