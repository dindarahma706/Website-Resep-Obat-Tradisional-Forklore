@extends('layouts.frontend')

@section('title')
    History
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h1>History</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pasien</th>
                                <th>Umur</th>
                                <th>Gender</th>
                                <th>Penyakit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pasien as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->Nama }}</td>
                                <td>{{ $item->Umur }}</td>
                                <td>{{ $item->Gender }}</td>
                                <td>{{ $item->Penyakit }}</td>
            
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