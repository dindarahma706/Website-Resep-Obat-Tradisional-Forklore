@extends('layouts.frontend')

@section('title')
    Daftar Pengguna
@endsection

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h1 style="color:black">Daftar Pengguna</h1>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead class="table-dark">
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
                                <td class="align-middle">{{ $key +1 }}</td>
                                <td class="align-middle">{{ $item->name }}</td>
                                <td class="align-middle">{{ $item->email }}</td>
                                <td class="align-middle">
                                    <img class="img" src="{{ asset('assets/uploads/sertif/'.$item->sertif_image) }}" alt="image here..">    
                                </td>
                                <td class="align-middle">
                                    @if($item->status==0)
                                    <a href="{{url('verify-user/'.$item->id)}}" class="btn btn-success shadow-lg">ACC</a>
                                    @endif
                                    @if($item->status==1)
                                    <a href="{{url('block-user/'.$item->id)}}" class="btn btn-danger shadow-lg">BLOCK</a>
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
