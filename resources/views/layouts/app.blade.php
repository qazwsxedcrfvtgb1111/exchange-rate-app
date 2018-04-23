<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exchange Rates</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet" type="text/css">
</head>
<body class="bg-dark">
<nav class="navbar navbar-light bg-light mb-4">
    <a class="navbar-brand" href="{{action('ExchangeController@index')}}">Exchange</a>
</nav>
<div class="container">
    @yield('content')
</div>
<script src="/js/app.js"></script>
</body>
</html>