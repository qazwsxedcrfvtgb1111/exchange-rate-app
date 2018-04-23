<?php

namespace App\ExchangeApi;


interface ExchangeApi
{
    public function getSymbols(): array;

    public function convert(string $fromSymbol, string $toSymbol, float $amount): float;
}