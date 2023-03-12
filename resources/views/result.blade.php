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
                                <th>ID</th>
                                <th>HASIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hasil as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->hasil }}</td>
            
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