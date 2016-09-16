@extends('layouts.app')

@section('content')
        <!DOCTYPE html>
<html>
<head>
    <title>Wu Tang Financial™</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body background="http://localhost/efs/public/saya.png">
<div class="container">
    <div class="content">
        <div class="title">Wu Tang Financial™</div>
    </div>
    <hr>
    <a href="http://localhost/efs/public/">Home Page</a> |
    <a href="{{ action('CustomerController@index') }}">Customers</a> |
    <a href="{{ action('StockController@index') }}">Stocks</a> |
    <a href="{{ action('InvestmentController@index') }}">Investments</a>
</div>
@endsection
