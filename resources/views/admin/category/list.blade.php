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
                          <li class="active">Categories</li>
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
                                  <a href="{{ url('/back/category/create') }}"
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
                                          <th>Name</th>
                                          <th>Status</th>
                                          <th>Option</th>
                                      </tr>
                                  </thead>
                                  <tbody>

                                      @foreach ($data as $i => $row)
                                          <tr>
                                              <td>{{ ++$i }}</td>
                                              <td>{{ $row->name }}</td>
                                              <td>
                                                  {{ Form::open(['method' => 'PUT', 'url' => ['/back/category/status/' . $row->id], 'style' => 'display:inline']) }}
                                                  @if ($row->status === 1)
                                                      {{ Form::submit('Unpublish', ['class' => 'btn btn-danger btn-sm rounded']) }}
                                                  @else
                                                      {{ Form::submit('Publish', ['class' => 'btn btn-sm rounded btn-success']) }}
                                                  @endif
                                                  {{ Form::close() }}

                                              </td>

                                              <td>
                                                  @permission(['Post Add', 'All', 'Post Update'])
                                                      <a href="{{ route('categories.edit', $row->id) }}"
                                                          class="btn btn-warning btn-sm rounded">
                                                          <i class="fa fa-pencil"></i>
                                                      </a> |
                                                  @endpermission
                                                  @permission(['Post Delete', 'All'])
                                                      {!! Form::open(['url' => 'back/category/delete/' . $row->id, 'style' => 'display:inline', 'method' => 'delete']) !!}

                                                      <button type="submit" class="btn btn-danger btn-sm rounded"
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
