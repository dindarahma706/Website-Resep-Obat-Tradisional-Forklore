@extends('layouts.frontend')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">{{ __('Biodata Pasien') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('result') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="Nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama Pasien') }}</label>

                            <div class="col-md-6">
                                <input id="Nama" type="text" class="form-control" name="Nama" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Umur" class="col-md-4 col-form-label text-md-end">{{ __('Umur') }}</label>

                            <div class="col-md-6">
                                <input id="Umur" type="number" class="form-control" name="Umur" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Gender" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Kelamin') }}</label>

                            <div class="form-check col-md-3">
                            <input class="form-check-input" type="radio" name="Gender" id="Gender" value="Laki-Laki" required>
                            <label class="form-check-label" for="Gender">
                              Laki-Laki
                            </label>
                          </div>
                          <div class="form-check col-md-3">
                            <input class="form-check-input" type="radio" name="Gender" id="Gender" value="Perempuan" required>
                            <label class="form-check-label" for="Gender">
                              Perempuan
                            </label>
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Penyakit" class="col-md-4 col-form-label text-md-end">{{ __('Penyakit') }}</label>

                            <div class="col-md-6">
                                <input id="Penyakit" placeholder="demam" type="text" class="form-control" name="Penyakit" required>
                            </div>
                        </div>

                        


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection