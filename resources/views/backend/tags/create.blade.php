@extends('dashboard')
@section('title','Create Tag')
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
                                        <h5 class="mb-0">Create Tag</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('tags.store')}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label" for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter The Tag Name" />
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


