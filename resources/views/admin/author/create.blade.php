@extends('admin.layouts.master')
@section('content')

    <script>
        jQuery(document).ready(function() {
            jQuery(".myselect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>

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
                        <li><a href="{{ route('admin.authors') }}">Authors</a></li>
                        <li class="active">Create</li>
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
                            <strong class="card-title">{{ $page_name }} </strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">

                                    <hr>

                                    {{ Form::open(['url' => 'back/authors/store', 'method' => 'post']) }}


                                    <div class="form-group">
                                        {{ Form::label('name', 'Name', ['class' => 'control-label mb-1']) }}

                                        {{ Form::text('name', null, ['class' => 'form-control '. ($errors->has('name') ? 'is-invalid' : ''), 'id' => 'name',  'autofocus' => 'autofocus']) }}

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('email', 'Email', ['class' => 'control-label mb-1']) }}

                                        {{ Form::email('email', null, ['class' => 'form-control '. ($errors->has('email') ? 'is-invalid' : ''), 'id' => 'email']) }}

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('password', 'Password', ['class' => 'control-label mb-1']) }}

                                        {{ Form::password('password', ['class' => 'form-control '. ($errors->has('password') ? 'is-invalid' : ''), 'id' => 'password']) }}

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('roles', 'Roles', ['class' => 'control-label mb-1']) }}

                                        {{ Form::select('roles[]', $roles, null, ['class' => 'form-control myselect', 'data-placeholder' => 'Select Roles', 'multiple']) }}
                                        
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block">
                                            <i class="fa fa-save fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Save</span>
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
