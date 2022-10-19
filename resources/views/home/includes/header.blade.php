<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Ecommerce</a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <a class="btn btn-success btn-sm ml-3" href="{{ url('cart') }}/1">
                <i class="fa fa-shopping-cart"></i> Cart
                <span class="badge badge-light"></span>
            </a>
        </div>
    </div>
</nav>