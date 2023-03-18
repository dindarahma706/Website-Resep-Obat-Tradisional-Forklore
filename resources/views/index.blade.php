@extends('layouts.frontend')

@section('title')
  Cover
@endsection

@section('content')  
@guest
<div class="d-flex h-100 text-center text-bg-dark">
  <main class="cover-container d-flex p-3 mx-auto flex-column">
    <h1>Cover your page.</h1>
    <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
    <p class="lead">
      <a href="/register" class="btn btn-lg btn-secondary fw-bold">Get started</a>
    </p>
  </main>
</div>  
@endguest

  <div class="d-flex h-100 text-center" >
    <main class="cover-container d-flex p-3 mx-auto flex-column">
    <p class="lead pt-3">
      <a href="/empiris" class="button btn btn-lg btn-secondary fw-bold">Empiris</a>
      <a href="/home" class="button btn btn-lg btn-secondary fw-bold">Scientics</a>
    </p>
    </main>
  </div>



@endsection
