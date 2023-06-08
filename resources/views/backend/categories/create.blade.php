@extends('dashboard')
@section('title','Create Category')
@section('styles')
@endsection
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- Basic Layout -->
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Create Category</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('categories.store')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter The Category Name" />
                                            @error('name') <div class="text-danger">{{$message}}</div> @enderror

                                        </div>

                                        <button type="submit" class="btn btn-primary">save</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
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



