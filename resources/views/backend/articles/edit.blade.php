@extends('dashboard')
@section('title','Update Article')
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
                                    <h5 class="mb-0">Update Article</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('articles.update',$article->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" class="form-control" name="title" id="title" value="{{$article->title}}" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="full_text">Full Text</label>
                                            <textarea class="form-control" name="full_text" id="full_text" rows="3">{{$article->full_text}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="category_id">Category</label>
                                            <select class="form-control categories" id="category_id" name="category_id"
                                                    style="width: 100%;">
                                                <option>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id }}"{{ $category->id === $article->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id') <div class="text-danger">{{$message}}</div> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="tags[]">Tag</label>
                                            <select class="form-control" name="tags[]" multiple>
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}" @if (in_array($tag->id, $selectedTags)) selected @endif>{{ $tag->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('tags') <div class="text-danger">{{$message}}</div> @enderror

                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input class="form-control" type="file" id="image" name="image" />
                                            @if ($article->image)
                                                <img width="100px" height="90px" src="{{asset('images/article/'.$article->image) }}" alt="Current Image">
                                            @endif
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
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


