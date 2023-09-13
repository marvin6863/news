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
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Comments</li>
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
                                        <th>Name</th>
                                        <th>Post</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $i => $row)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td> {{ $row->post->title }} </td>
                                            <td>{{ $row->comment }}</td>
                                            <td>
                                                {{ Form::open(['method' => 'PUT', 'url' => ['/back/comment/status/' . $row->id], 'style' => 'display:inline']) }}
                                                @if ($row->status === 1)
                                                    {{ Form::submit('Unpublish', ['class' => 'btn btn-danger btn-sm rounded']) }}
                                                @else
                                                    {{ Form::submit('Publish', ['class' => 'btn btn-success btn-sm rounded']) }}
                                                @endif
                                                {{ Form::close() }}
                                            </td>
                                            <td>
                                                <a href="{{ url('/back/comment/reply/' . $row->post_id) }} "
                                                    class="btn btn-primary btn-sm rounded">Reply</a>
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
