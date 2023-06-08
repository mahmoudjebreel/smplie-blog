@extends('dashboard')
@section('title','All Tags')

@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

                <div class="content-wrapper">
                    <!-- Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <!-- Striped Rows -->
                        <div class="card">
                            <h5 class="card-header">All Tags</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                    @if(count($tags)>0)
                                    @foreach($tags as $tag)
                                    <tr>
                                        <td>{{$tag->id}}</td>
                                        <td>{{$tag->name}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <div class="btn-group">
                                                    <a class="dropdown-item" href="{{route('tags.edit',$tag->id)}}">
                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('tags.show',$tag->id)}}">
                                                        <i class="bx bx-edit-alt me-1"></i> Show
                                                    </a>
                                                    <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
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
                                        <p>No Tags To Show</p>
                                    @endif
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <div class="float-right">
                                                {!! $tags->links() !!}
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
