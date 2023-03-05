@extends('layouts.frontend')

@section('title')
    Daftar Pengguna
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h1>Daftar Pengguna</h1>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Sertifikat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $key=> $item)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <img class="img" src="{{ asset('assets/uploads/sertif/'.$item->sertif_image) }}" alt="image here..">    
                                </td>
                                <td>
                                    @if($item->status==0)
                                    <a href="{{url('verify-user/'.$item->id)}}" class="btn btn-success">ACC</a>
                                    @endif
                                    @if($item->status==1)
                                    <a href="{{url('block-user/'.$item->id)}}" class="btn btn-danger">BLOCK</a>
                                    @endif

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
