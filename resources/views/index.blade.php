@extends('layouts.frontend')

@section('title')
  Cover
@endsection

@section('content')  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
  <section class="home" id="home">
    <div class="home-text">
      <h1>Indigenous Forklor</h1>
      <h2>Medicine The <br> Most Precious Things</h2>
      <a href="/register" class="btn">Get Started</a> 
    </div>

    <div class="home-img">
      <img src="{{ asset('assets/img/undraw_medicine.svg') }}">

    </div>

  </section>
</body>
</html>

@endsection
