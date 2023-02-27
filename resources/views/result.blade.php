@extends('layouts.frontend')

@section('title')
    Hasil
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h1>Resep Obat</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Tumbuhan
                                </th>
                                <th>Gambar</th>
                                <th>Jenis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resep as $item)
                            <tr>
                                <td>{{ $item->Nama_Tumbuhan }}</td>
                                <td>
                                    <img class="img" src="{{ asset('assets/uploads/resep/'.$item->Image) }}" alt="image here..">    
                                </td>
                                <td>{{ $item->Jenis }}</td>
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