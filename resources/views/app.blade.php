<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Wu Tang Financial™</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

</head>
<body background="http://localhost/efs/public/saya.png">
<div class="container">
    <div style="text-align: center;">
        <br>
    <a href="index.php">Home Page</a> |
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
