@extends('layouts.app')

@section('content')
    <div class="row">
        <a href="{{action('ExchangeController@index')}}" class="btn btn-primary">Back</a>
    </div>
    <div class="row result-container">
        <div class="col-5 text-center">
            {{$from_amount}} {{$from_currency}}
        </div>
        <div class="col-2 text-center">=</div>
        <div class="col-5 text-center">
            {{round($to_amount, 2)}} {{$to_currency}}
        </div>
    </div>
@endsection