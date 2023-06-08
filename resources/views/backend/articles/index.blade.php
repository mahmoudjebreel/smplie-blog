@extends('dashboard')
@section('title','All Articles')

@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">

                    <!-- Striped Rows -->
                    <div class="card">
                        <h5 class="card-header">All Articles</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <td>Full Text</td>
                                    <td>Category Name</td>
                                    <td>Image</td>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @if(count($articles)>0)
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{$article->id}}</td>
                                        <td>{{$article->title}}</td>
                                        <td>{{$article->full_text}}</td>
                                        <td>{{$article->category->name}}</td>
                                        <td><img width="80" height="90px" src="{{asset('images/article/'.$article->image)}}"></td>
                                        <td>
                                            <div class="btn-group">
                                                <div class="btn-group">
                                                    <a class="dropdown-item" href="{{route('articles.edit',$article->id)}}">
                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('articles.show',$article->id)}}">
                                                        <i class="bx bx-edit-alt me-1"></i> Show
                                                    </a>
                                                    <form action="{{ route('articles.destroy', $article->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="dropdown-item" href="javascript:void(0);">
                                                            <i class="bx bx-trash me-1"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <p>No Articles To Show</p>
                                @endif
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <div class="float-right">
                                            {!! $articles->links() !!}
                                        </div>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!--/ Striped Rows -->


                </div>
                <!-- / Content -->


                <div class="content-backdrop fade"></div>
            </div>

        </div>
    </div>


@endsection
