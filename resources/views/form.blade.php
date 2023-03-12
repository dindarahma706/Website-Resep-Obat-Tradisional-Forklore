@extends('layouts.frontend')

@section('title')
    Form
@endsection

@section('css')
    <link href="{{ asset('frontend/css/form.css') }}" rel="stylesheet">
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
                        <div class="label">Pilih Bahan 1</div>
                    </a>
                </li>
                <!-- Step 2 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>2</span>
                        </span>
                        <div class="label text-muted">Pilih Bahan 2</div>
                    </a>
                </li>
                <!-- Step 3 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>3</span>
                        </span>
                        <div class="label text-muted">Pilih Bahan 3</div>
                    </a>
                </li>
            </ul>
            <!-- Step Wise Form Content -->
            <form action="{{ url('result') }}" id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST">
                @csrf
                <!-- Step 1 Content -->
                <section id="step-1" class="form-step">
                    <h2 class="font-normal">Masukkan bahan utama</h2>
                    <!-- Step 1 input fields -->
                    <div class="mt-3">
                        <input id="" type="text" class="form-control" name="bahan1" required>
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Next</button>
                    </div>
                    <div class="mt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pilihan Bahan utama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($racik1 as $item)
                                <tr>
                                    <td>{{ $item->bahan1 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
                <!-- Step 2 Content, default hidden on page load. -->
                <section id="step-2" class="form-step d-none">
                    <h2 class="font-normal">Masukkan bahan tambahan (opsional)</h2>
                    <!-- Step 2 input fields -->
                    <div class="mt-3">
                        <input  type="text" class="form-control" name="bahan2">
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="1">Prev</button>
                        <button class="button btn-navigate-form-step" type="button" step_number="3">Next</button>
                    </div>
                    <div class="mt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pilihan Bahan tambahan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($racik2 as $item)
                                <tr>
                                    <td>{{ $item->bahan2 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
                <!-- Step 3 Content, default hidden on page load. -->
                <section id="step-3" class="form-step d-none">
                    <h2 class="font-normal">Masukkan bahan tambahan lainnya (opsional)</h2>
                    <!-- Step 3 input fields -->
                    <div class="mt-3">
                        <input  id="" type="text" class="form-control" name="bahan3">
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                        <button class="button submit-btn" type="submit">Save</button>
                    </div>
                    <div class="mt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pilihan bahan tamabahan lainnya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($racik3 as $item)
                                <tr>
                                    <td>{{ $item->bahan3 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </form>
        </div>
    </div>

<script>
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