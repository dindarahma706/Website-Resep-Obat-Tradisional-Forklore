@extends('layouts.frontend')

@section('title')
    Logged
@endsection

@section('content')
<style>
  .button {
    padding: 30px;
    display: inline-block;
    margin: 100px 60px 80px 100px;
    font-size: 40px;
  }
  </style>
  <div class="d-flex h-100 text-center" >
    <main class="cover-container d-flex p-3 mx-auto flex-column">
    <p class="lead pt-3">
      <a href="/form" class="button btn btn-lg btn-secondary fw-bold">Indigineous Folklore</a>
      <a href="/empiris" class="button btn btn-lg btn-secondary fw-bold">Metode 2</a>
      <a href="/empiris" class="button btn btn-lg btn-secondary fw-bold">Metode 3</a>
    </p>
    </main>
  </div>
@endsection
