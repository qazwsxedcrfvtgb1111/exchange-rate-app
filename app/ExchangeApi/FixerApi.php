<?php

namespace App\ExchangeApi;

use App\Exceptions\ExchangeException;
use GuzzleHttp\Client;

class FixerApi implements ExchangeApi
{
    const URL = 'http://data.fixer.io/api/';

    private $client;
    private $accessKey;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->accessKey = env('FIXER_KEY');
    }

    public function getSymbols(): array
    {
        return array_keys($this->request('symbols')['symbols']);
    }

    public function convert(string $fromSymbol, string $toSymbol, float $amount): float
    {
        // direct convert method is not available for the free version
        $rates = $this->request('latest', ['symbols' => implode(',', [$fromSymbol, $toSymbol])])['rates'];
        return $amount / $rates[$fromSymbol] * $rates[$toSymbol];
    }

    private function request(string $action, $data = [])
    {
        $res = $this->client->get(self::URL . $action . '?'
            . http_build_query($data + ['access_key' => $this->accessKey]));
        if ($res->getStatusCode() !== 200) {
            throw new ExchangeException('API error: ' . $res->getBody());
        }
        $result = json_decode($res->getBody()->getContents(), true);
        if (!$result['success']) {
            throw new ExchangeException($result['error']['info']);
        }

        return $result;
    }
}