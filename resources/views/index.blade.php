@extends('layouts.frontend')

@section('title')
  Cover
@endsection

@section('content')  
<!-- 
<div class="d-flex h-100 text-center text-bg-dark">
  <main class="cover-container d-flex p-3 mx-auto flex-column">
    <h1>Cover your page.</h1>
    <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
    <p class="lead">
      <a href="/register" class="btn btn-lg btn-secondary fw-bold">Get started</a>
    </p>
  </main>
</div>   -->
  <section class="home" id="home">
    <div class="home-text">
      <h1>Indigenous Forklor</h1>
      <h2>Medicine The <br> Most Precious Things</h2>
      @guest
      <a href="/register" class="btn">Get Started</a> 
      @endguest
    </div>

    <div class="home-img">
      <img src="{{ asset('assets/img/undraw_medicine.svg') }}">
    </div>

    <div class="d-flex h-100 text-center" >
      <main class="cover-container d-flex p-3 mx-auto flex-column">
      <p class="lead pt-3">
        
        <a href="{{route('resep-default')}}" class="button btn btn-lg btn-secondary fw-bold">Cari Resep</a>
        @auth
          @if(Auth::user()->status=='1')
          <a href="{{route('home')}}" class="button btn btn-lg btn-secondary fw-bold">Buat Resep</a>
          @endif
          @if(Auth::user()->role_as=='1')
          <a href="{{url('add-resep')}}" class="button btn btn-lg btn-secondary fw-bold">Tambah Bahan</a>
          @endif
        @endauth
      </p>
      </main>
    </div>

  </section>




@endsection

