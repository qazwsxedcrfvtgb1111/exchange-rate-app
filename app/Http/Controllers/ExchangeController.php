<?php

namespace App\Http\Controllers;

use App\ExchangeApi\ExchangeApi;
use App\Http\Requests\ConvertRequest;

class ExchangeController extends Controller
{
    private $api;

    public function __construct(ExchangeApi $api)
    {
        $this->api = $api;
    }

    public function index()
    {
        return view('exchange', ['symbols' => $this->api->getSymbols()]);
    }

    public function result(ConvertRequest $request)
    {
        $toAmount = $this->api->convert($request->from_currency, $request->to_currency, $request->amount);
        return view('result', [
            'from_currency' => $request->from_currency,
            'to_currency' => $request->to_currency,
            'from_amount' => $request->amount,
            'to_amount' => $toAmount
        ]);

    }

    public function error()
    {
        return view('error');
    }
}
