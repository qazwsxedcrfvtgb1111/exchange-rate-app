@extends('layouts.app')

@section('content')
    <div class="row">
        <a href="{{action('ExchangeController@index')}}" class="btn btn-primary">Back</a>
    </div>
    <div class="row result-container">
        The Api has encountered an error!
    </div>
@endsection