@extends('layouts.app')

@section('content')
    <form action="{{action('ExchangeController@result')}}" method="get">
        <div class="row">
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        </div>
        <div class="row">
            <div class="col-5">
                <div class="form-group">
                    <p class="text-center">From</p>
                    <select title="Currency" class="form-control" id="from-currency" name="from_currency">
                        @foreach($symbols as $symbol)
                            <option {{old('from_currency') !== $symbol ?: 'selected'}}>{{$symbol}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input class="form-control" title="Amount" id="amount" type="number" name="amount" min="0"
                           value="{{old('amount')}}">
                </div>
            </div>
            <div class="col-2 convert-container">
                <div>
                    <button type="submit" class="btn btn-primary">Convert</button>
                </div>
            </div>
            <div class="col-5">
                <div class="form-group">
                    <p class="text-center">To</p>
                    <select title="Currency" class="form-control" name="to_currency">
                        @foreach($symbols as $symbol)
                            <option {{old('to_currency') !== $symbol ?: 'selected'}}>{{$symbol}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
@endsection
