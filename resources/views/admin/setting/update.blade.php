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
                          <li><a href="{{ route('setting') }}">Settings</a></li>
                          <li class="active">Update</li>
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
                              <strong class="card-title"> {{ $page_name }} </strong>
                          </div>
                          <div class="card-body">
                              <!-- Credit Card -->
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
                              <div id="pay-invoice">
                                  <div class="card-body">
                                      <hr>

                                      {{ Form::open(['url' => '/back/settings/update', 'method' => 'put', 'enctype' => 'multipart/form-data']) }}


                                      <div class="form-group">
                                          {{ Form::label('name', 'System Name', ['class' => 'control-label mb-1']) }}

                                          {{ Form::text('name', $system_name, ['class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''), 'id' => 'name']) }}

                                          @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}*</strong>
                                              </span>
                                          @enderror
                                      </div>

                                      <div class="form-group">
                                          {{ Form::label('favicon', 'Favicon', ['class' => 'control-label mb-1']) }}

                                          {{ Form::file('favicon', ['class' => 'form-control']) }}
                                      </div>

                                      <div class="form-group">
                                          {{ Form::label('front_logo', 'Front Logo', ['class' => 'control-label mb-1']) }}

                                          {{ Form::file('front_logo', ['class' => 'form-control']) }}
                                      </div>

                                      <div class="form-group">
                                          {{ Form::label('admin_logo', 'Admin Logo', ['class' => 'control-label mb-1']) }}

                                          {{ Form::file('admin_logo', ['class' => 'form-control']) }}
                                      </div>

                                      <div>
                                          <button id="payment-button" type="submit"
                                              class="btn btn-lg rounded btn-warning btn-block">
                                              <i class="fa fa-save fa-lg"></i>&nbsp;
                                              <span id="payment-button-amount">Update</span>
                                          </button>
                                      </div>
                                      {{ Form::close() }}
                                  </div>
                              </div>

                          </div>
                      </div> <!-- .card -->


                  </div>

              </div>
          @endsection
