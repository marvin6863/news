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
                          <li><a href="{{ route('admin.categories') }}">Categories</a></li>
                          <li class="active">Edit</li>
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
                              <div id="pay-invoice">
                                  <div class="card-body">
                                      <hr>

                                      {{ Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'put']) }}


                                      <div class="form-group">
                                          {{ Form::label('name', 'Name', ['class' => 'control-label mb-1']) }}

                                          {{ Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''), 'id' => 'name']) }}
                                          @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>

                                      <div>
                                          <button id="payment-button" type="submit"
                                              class="btn btn-lg btn-warning btn-block">
                                              <i class="fa fa-save fa-lg"></i>&nbsp;
                                              <span id="payment-button-amount">Update</span>
                                              <span id="payment-button-sending" style="display:none;">Sending…</span>
                                          </button>
                                      </div>
                                      {{ Form::close() }}
                                  </div>
                              </div>

                          </div>
                      </div> <!-- .card -->

                  </div>

              </div>
          </div>
      </div>
  @endsection
