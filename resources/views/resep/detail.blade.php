@extends('layouts.frontend')

@section('title')
    {{$resep->judul}}
@endsection

@section('content')
  <div class="container mt-5 ">
    <div class="row">
      <div class="col-lg-8">
        <h1 class="mb-3">{{$resep->judul}}</h1>
        <h4 class="mb-3">Penyakit: {{$resep->penyakit}}</h4>
        <img src="{{asset('assets/uploads/resep/'.$resep->photo)}}" class="img-thumbnail rounded mx-auto d-block" alt="gambar resep" width="30%">
        <p class="mb-4">
            {!! $resep->cara_pembuatan !!}
        </p>


      </div>
      <div class="col-lg-4 text-dark">
          <h5 class="card-title">Bahan yang dibutuhkan</h5>
        @foreach ($bahan as $item)
            <div class="card mb-4">
                <img src="{{ asset('assets/uploads/resep/'.$item->Image) }}" class="card-img-top" alt="Card Image" style="max-height: 200px;width:auto">
                <div class="card-body">
                    <h5 class="card-title">{{$item->Nama_Tumbuhan}}</h5>
                    <p class="card-text">{{$item->Deskripsi}}</p>
                </div>
            </div>            
        @endforeach
      </div>
    </div>
  </div>
    
@endsection