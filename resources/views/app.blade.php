<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mercy Affordable Housing Property Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

</head>
<body background="http://financeblog.herokuapp.com/saya.png">
<div class="container">
    <div style="text-align: center;">
        <br>
    <a href="https://financeblog.herokuapp.com/">Home Page</a> |
    <a href="{{ action('CustomerController@index') }}">Customers</a> |
    <a href="{{ action('StockController@index') }}">Stocks</a> |
    <a href="{{ action('InvestmentController@index') }}">Investments</a>
    </div>

</div>
<hr>
<div class="container">
    @yield('content')
</div>
</body>
</html>
