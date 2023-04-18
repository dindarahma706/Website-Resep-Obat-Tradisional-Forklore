@extends('layouts.frontend')

@section('title')
    Cari Resep
@endsection

@section('content')
<div class="container">
    <div class="row height d-flex justify-content-center align-items-center">
        <form action="{{route('resep-default')}}" method="get">
            <div class="col-md-8">
                
                <div class="search row mb-1">
                    <div class="col-9">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari Resep" value="{{$keyword}}">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary form-control" type="submit">Search</button>
                    </div>
                </div>
                
            </div>
        </form>
        
    </div>    
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h1 style="color:#000000">Resep Obat</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Resep</th>
                                <th>Penyakit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key=>$item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->penyakit }}</td>
                                <td>
                                    <a href="{{route('detailResep',['id'=>$item->id])}}" class="btn btn-primary shadow-lg">Lihat Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection