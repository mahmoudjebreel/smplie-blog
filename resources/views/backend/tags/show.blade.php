@extends('dashboard')
@section('title','Show Tag')
@section('styles')
@endsection
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

                <div class="content-wrapper">


                    <div class="container-xxl flex-grow-1 container-p-y">

                        <!-- Accordion -->
{{--                        <h5 class="mt-4">Show Category</h5>--}}
                        <div class="row">
                            <div class="col-md mb-4 mb-md-0">
                                <div class="accordion mt-3" id="accordionExample">
                                    <div class="card accordion-item active">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button
                                                type="button"
                                                class="accordion-button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#accordionOne"
                                                aria-expanded="true"
                                                aria-controls="accordionOne">
                                                Show Category
                                            </button>
                                        </h2>

                                        <div
                                            id="accordionOne"
                                            class="accordion-collapse collapse show"
                                            data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                               Tag Name : {{$tag->name}}
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <!--/ Accordion -->

                        <!--/ Advance Styling Options -->
                    </div>
                    <!-- / Content -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>


@endsection
@section('scripts')
@endsection


