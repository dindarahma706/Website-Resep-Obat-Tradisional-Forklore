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
                    <h1>Resep Obat
                        <a class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-primary"href="{{ url('insert-resep') }}">Tambah</button>
                        </a>
                    </h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Tumbuhan</th>
                                <th>Penyakit</th>
                                <th>Deskripsi</th>>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resep as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->Nama_Tumbuhan }}</td>
                                <td>{{ $item->Penyakit }}</td>
                                <td>{{ $item->Deskripsi }}</td>
                                <td>
                                    <img class="img" src="{{ asset('assets/uploads/resep/'.$item->Image) }}" alt="image here..">    
                                </td>
                                <td>
                                    <a href="{{ url('edit-resep/'.$item->id) }}" class="btn btn-outline-primary">Edit</a>
                                    <a href="{{ url('delete-resep/'.$item->id) }}" class="btn btn-outline-danger">Delete</a>
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