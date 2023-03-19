@extends('layouts.frontend')

@section('title')
    Tambah Resep
@endsection

@section('content')
<style>
body {
  font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  background-color: #efefef; }

p {
  color: #b3b3b3;
  font-weight: 300; }

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"; }

a {
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease; }
  a, a:hover {
    text-decoration: none !important; }

.content {
  padding: 7rem 0; }

h2 {
  font-size: 20px; }

.ms-options {
  padding: 20px;
  border: none; }

.ms-options-wrap > button:focus, .ms-options-wrap > button {
  border-radius: 4px;
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease;
  -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
  border: none !important;
  height: 40px;
  padding-left: 10px;
  padding-right: 10px;
  z-index: 2; }
  .ms-options-wrap > button:focus:hover, .ms-options-wrap > button:hover {
    -webkit-box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.1);
    box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.1); }
  .ms-options-wrap > button:focus:after, .ms-options-wrap > button:after {
    right: 10px; }
  .ms-options-wrap > button:focus:active, .ms-options-wrap > button:focus:focus, .ms-options-wrap > button:active, .ms-options-wrap > button:focus {
    outline: none; }

.ms-options-wrap.ms-active > button:focus, .ms-options-wrap.ms-active > button {
  -webkit-box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.1);
  box-shadow: 0 2px 10px 0 rgba(0, 0, 0, 0.1); }

.ms-options-wrap > .ms-options {
  z-index: 1;
  margin-top: 12px;
  border: none !important;
  -webkit-box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.1);
  box-shadow: 0 15px 30px 0 rgba(0, 0, 0, 0.1);
  border-radius: 4px; }
  .ms-options-wrap > .ms-options .ms-search input {
    border-bottom: 1px solid #efefef; }
  .ms-options-wrap > .ms-options .ms-selectall {
    color: #aaaaaa;
    text-transform: uppercase;
    font-size: 11px; }
    .ms-options-wrap > .ms-options .ms-selectall:hover {
      color: #000; }
  .ms-options-wrap > .ms-options > ul li.selected label {
    border-radius: 4px;
    background: #e1f2fb; }
  .ms-options-wrap > .ms-options > ul li label {
    border-radius: 4px;
    border: none;
    padding-top: 5px;
    padding-bottom: 5px; }
  .ms-options-wrap > .ms-options > ul li:hover label {
    border: none;
    background: #f7f7f7; }

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">{{ __('Buat') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('result') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="Nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama Resep') }}</label>

                            <div class="col-md-6">
                                <input id="Resep" type="text" class="form-control" name="Resep" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Penyakit" class="col-md-4 col-form-label text-md-end">{{ __('Penyakit') }}</label>

                            <div class="col-md-6">
                                <input onchange="getBahan()" id="Penyakit" placeholder="demam" type="text" class="form-control" name="Penyakit" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="Bahan" class="col-md-4 col-form-label text-md-end">{{ __('Bahan') }}</label>
                            <div class="col-md-5">

                                <select name="basic[]" multiple="multiple" class="3col active form-control">
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>
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
<script src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.multiselect.js')}}"></script>

<script>


	$('select[multiple].active.3col').multiselect({
	  columns: 3,
	  placeholder: 'Select States',
	  search: true,
	  searchOptions: {
	      'default': 'Search States'
	  },
	  selectAll: true
	});

</script>
@endsection