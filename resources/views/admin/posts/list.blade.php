@extends('admin.layouts.master')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>{{ $page_name }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="active">Posts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{{ $page_name }}</strong>
                            @permission(['Post Add', 'All'])
                                <a href="{{ url('/back/posts/create') }}"
                                    class="btn btn-success btn-sm rounded pull-right">Create</a>
                            @endpermission
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="col-sm-12">
                                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            @endif
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Total View</th>
                                        <th>Status</th>
                                        <th>Hot News</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $i => $row)
                                        <tr>
                                            <td style="width: 5%">{{ ++$i }}</td>
                                            <td>
                                                @if (file_exists(public_path('/post/') . $row->thumb_image))
                                                    <img src="{{ asset('post') }}/{{ $row->thumb_image }} "
                                                        class="img img-responsive w-50 mx-auto d-block">
                                                @endif
                                            </td>
                                            <td style="width: 15%">{{ $row->title }}</td>
                                            <td style="width: 5%"> {{ $row->creator->name }} </td>

                                            <td style="width: 5%">{{ $row->view_count }}</td>
                                            <td>
                                                {{ Form::open(['method' => 'PUT', 'url' => ['/back/posts/status/' . $row->id], 'style' => 'display:inline']) }}
                                                @if ($row->status === 1)
                                                    {{ Form::submit('Unpublish', ['class' => 'btn btn-danger btn-sm rounded']) }}
                                                @else
                                                    {{ Form::submit('Publish', ['class' => 'btn btn-success btn-sm rounded']) }}
                                                @endif
                                                {{ Form::close() }}

                                            </td>

                                            <td style="width: 5%">
                                                {{ Form::open(['method' => 'PUT', 'url' => ['/back/posts/hot/news/' . $row->id], 'style' => 'display:inline']) }}
                                                @if ($row->hot_news === 1)
                                                    {{ Form::submit('No', ['class' => 'btn btn-danger btn-sm rounded']) }}
                                                @else
                                                    {{ Form::submit('Yes', ['class' => 'btn btn-success btn-sm rounded']) }}
                                                @endif
                                                {{ Form::close() }}

                                            </td>


                                            <td>
                                                @permission(['Post Add', 'All', 'Post Update'])
                                                    <a href="{{ route('comments.list', $row->id) }}"
                                                        class="btn btn-primary btn-sm rounded" title="Comment">
                                                        <i class="fa fa-comment"></i>
                                                    </a> |
                                                    <a href="{{ route('posts.edit', $row->id) }}"
                                                        class="btn btn-warning btn-sm rounded" title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a> |
                                                @endpermission
                                                @permission(['Post Delete', 'All'])
                                                    {!! Form::open(['url' => 'back/posts/delete/' . $row->id, 'style' => 'display:inline', 'method' => 'delete']) !!}

                                                    <button type="submit" title="Delete" class="btn btn-danger btn-sm rounded"
                                                        onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                                        <i class="fa fa-trash"></i>

                                                    </button>
                                                    {!! Form::close() !!}
                                                @endpermission

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
