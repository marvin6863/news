@section('title', 'Authors')

@extends('admin.layouts.master')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="active">{{ $page_name }}</li>
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
                            <a href="{{ route('authors.create') }}"
                                class="btn btn-success btn-sm rounded pull-right">Create</a>
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
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $i => $row)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>
                                                @if ($row->roles()->get())
                                                    <ul style="padding: 20px;margin: 20px">
                                                        @foreach ($row->roles()->get() as $role)
                                                            <li> {{ $role->name }} </li>
                                                        @endforeach

                                                    </ul>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('authors.edit', $row->id) }}"
                                                    class="btn btn-warning btn-sm rounded">
                                                    <i class="fa fa-pencil"></i>
                                                </a> |
                                                {!! Form::open(['url' => 'back/authors/delete/' . $row->id, 'style' => 'display:inline', 'method' => 'delete']) !!}

                                                <button type="submit" class="btn btn-danger btn-sm rounded"
                                                    onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                                    <i class="fa fa-trash"></i>

                                                </button>
                                                {!! Form::close() !!}

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
