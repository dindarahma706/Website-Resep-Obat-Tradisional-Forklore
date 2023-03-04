@extends('layouts.frontend')

@section('title')
    Edit Resep
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambahkan Resep</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('update-resep/'.$resep->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Nama Tumbuhan</label>
                                <input type="text" class="form-control" name="Nama_Tumbuhan" value="{{ $resep->Nama_Tumbuhan }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Penyakit</label>
                                <input type="text" class="form-control" name="Penyakit" value="{{ $resep->Penyakit }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Deskripsi</label>
                                <input type="text" class="form-control" name='Deskripsi' value="{{ $resep->Deskripsi }}" required>
                            </div>
                            <div class="col-md-12">
                                @if($resep->Image)
                                    <img class="img" src="{{ asset('assets/uploads/resep/'.$resep->Image)}}" alt="Category Image">
                                @endif
                                <input type="file" name="Image" class="form-control"
                            </div>
                            <div class="col-md-12">
                                <button type="submit" name="Image" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection