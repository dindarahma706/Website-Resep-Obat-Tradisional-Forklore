@extends('layouts.frontend')

@section('title')
    Form
@endsection

@section('css')
    <link href="{{ asset('frontend/css/form.css') }}" rel="stylesheet">
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
@endsection

@section('content')
    <div>
        <h1>Racik Resep</h1>
        <div id="multi-step-form-container">
            <!-- Form Steps / Progress Bar -->
            <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                <!-- Step 1 -->
                <li class="form-stepper-active text-center form-stepper-list" step="1">
                    <a class="mx-2">
                        <span class="form-stepper-circle">
                            <span>1</span>
                        </span>
                        <div class="label">Tentang Resep</div>
                    </a>
                </li>
                <!-- Step 2 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>2</span>
                        </span>
                        <div class="label text-muted">Pilih Bahan</div>
                    </a>
                </li>
            </ul>
            <!-- Step Wise Form Content -->
            <form action="{{ url('submision') }}" id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST">
                @csrf
                <!-- Step 1 Content -->
                <section id="step-1" class="form-step">
                    <h2 class="font-normal">Judul Resep</h2>
                    <!-- Step 1 input fields -->
                    <div class="mt-3">
                        <input id="" type="text" class="form-control" name="judul" required>
                    </div>

                    <h2 class="font-normal">Penyakit</h2>
                    <!-- Step 1 input fields -->
                    <div class="mt-3">
                        <input id="" type="text" class="form-control" name="penyakit" required>
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                    </div>
                </section>
                <!-- Step 2 Content, default hidden on page load. -->
                <section id="step-2" class="form-step d-none">
                    <h2 class="font-normal">Masukkan bahan utama</h2>
                    <select name="id_bahan[]" multiple="multiple" class="3col active form-control">\
                        @foreach($bahan as $item)
                        <option value="{{$item->id}}">{{$item->Nama_Tumbuhan}}</option>
                        @endforeach

                    </select>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                        <button class="button btn-navigate-form-step" type="submit" >Simpan</button>
                    </div>

                </section>
            </form>
        </div>
    </div>
<script src="{{asset('frontend/js/jquery.js')}}"></script>
<script src="{{asset('frontend/js/popper.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.multiselect.js')}}"></script>


<script>
    // Multi select
    $('select[multiple].active.3col').multiselect({
	  columns: 2,
	  placeholder: 'Pilih Bahan Herbal',
	  search: true,
	  searchOptions: {
	      'default': 'Cari Bahan'
	  },
	  selectAll: false

	});

    const navigateToFormStep = (stepNumber) => {
    /**
     * Hide all form steps.
     */
    document.querySelectorAll(".form-step").forEach((formStepElement) => {
        formStepElement.classList.add("d-none");
    });
    /**
     * Mark all form steps as unfinished.
     */
    document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
        formStepHeader.classList.add("form-stepper-unfinished");
        formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
    });
    /**
     * Show the current form step (as passed to the function).
     */
    document.querySelector("#step-" + stepNumber).classList.remove("d-none");
    /**
     * Select the form step circle (progress bar).
     */
    const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
    /**
     * Mark the current form step as active.
     */
    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
    formStepCircle.classList.add("form-stepper-active");
    /**
     * Loop through each form step circles.
     * This loop will continue up to the current step number.
     * Example: If the current step is 3,
     * then the loop will perform operations for step 1 and 2.
     */
    for (let index = 0; index < stepNumber; index++) {
        /**
         * Select the form step circle (progress bar).
         */
        const formStepCircle = document.querySelector('li[step="' + index + '"]');
        /**
         * Check if the element exist. If yes, then proceed.
         */
        if (formStepCircle) {
            /**
             * Mark the form step as completed.
             */
            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
            formStepCircle.classList.add("form-stepper-completed");
        }
    }
};
/**
 * Select all form navigation buttons, and loop through them.
 */
document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
    /**
     * Add a click event listener to the button.
     */
    formNavigationBtn.addEventListener("click", () => {
        /**
         * Get the value of the step.
         */
        const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
        /**
         * Call the function to navigate to the target form step.
         */
        navigateToFormStep(stepNumber);
    });
});
</script>

@endsection