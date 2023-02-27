@extends('layouts.frontend')

@section('title')
    Resep
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
                                <th>ID</th>
                                <th>Nama Tumbuhan</th>
                                <th>Penyakit</th>
                                <th>Jenis</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resep as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->Nama_Tumbuhan }}</td>
                                <td>{{ $item->Penyakit }}</td>
                                <td>{{ $item->Jenis }}</td>
                                <td>
                                    <img class="img" src="{{ asset('assets/uploads/resep/'.$item->Image) }}" alt="image here..">    
                                </td>
                                <td>
                                    <a href="{{ url('edit-resep/'.$item->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ url('delete-resep/'.$item->id) }}" class="btn btn-danger">Delete</a>
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