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
                        <li><a href="{{ route('admin.permissions') }}">Permissions</a></li>
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
                            <strong class="card-title">{{ $page_name }}</strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">

                                    <hr>

                                    {!! Form::model($permission,['route' => ['permission.update', $permission->id], 'method' => 'put']) !!}

                                    <div class="form-group">
                                        {{ Form::label('name', 'Name', ['class' => 'control-label mb-1']) }}

                                        {{ Form::text('name', null, ['class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''), 'id' => 'name', 'autofocus' => 'autofocus']) }}

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('display_name', 'Display Name', ['class' => 'control-label mb-1']) }}

                                        {{ Form::text('display_name', null, ['class' => 'form-control', 'id' => 'display_name']) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('description', 'Description', ['class' => 'control-label mb-1']) }}

                                        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) }}
                                    </div>


                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">
                                            <i class="fa fa-save fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Submit</span>
                                        </button>
                                    </div>
                                    {!! Form::close() !!}

                                </div>
                            </div>

                        </div>
                    </div> <!-- .card -->

                </div><!--/.col-->

            </div>

        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
