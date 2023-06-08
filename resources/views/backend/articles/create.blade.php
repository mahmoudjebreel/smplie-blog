@extends('dashboard')
@section('title','Create Article')
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
                                    <h5 class="mb-0">Create Article</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter The Article Title" />
                                            @error('title') <div class="text-danger">{{$message}}</div> @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="full_text">Full Text</label>
                                            <textarea class="form-control" name="full_text" id="full_text" rows="3"></textarea>
                                            @error('full_text') <div class="text-danger">{{$message}}</div> @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="category_id">Category</label>
                                            <select class="form-control categories" id="category_id" name="category_id"
                                                    style="width: 100%;">
                                                <option>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id') <div class="text-danger">{{$message}}</div> @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="tags[]">Tag</label>
                                            <select class="form-control" name="tags[]" multiple>
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('tags') <div class="text-danger">{{$message}}</div> @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input class="form-control" type="file" id="image" name="image" />
                                            @error('image') <div class="text-danger">{{$message}}</div> @enderror

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
