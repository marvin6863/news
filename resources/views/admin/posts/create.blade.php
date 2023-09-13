@extends('admin.layouts.master')
@section('content')
    <script>
        jQuery(document).ready(function() {
            jQuery(".myselect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });

            jQuery('textarea.my-editor').ckeditor({
                filebrowserImageBrowseUrl: '{{ url('/public') }}/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '{{ url('/public') }}/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
                filebrowserBrowseUrl: '{{ url('/public') }}/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '{{ url('/public') }}/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'
            });
        });
    </script>

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
                        <li><a href="{{ route('admin.posts') }}">Posts</a></li>
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

                                    {{ Form::open(['url' => 'back/posts/store', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}


                                    <div class="form-group">
                                        {{ Form::label('title', 'Title', ['class' => 'control-label mb-1']) }}

                                        {{ Form::text('title', null, ['class' => 'form-control ' . ($errors->has('title') ? 'is-invalid' : ''), 'id' => 'title']) }}

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('category', 'Category', ['class' => 'control-label mb-1']) }}

                                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control myselect', 'data-placeholder' => 'Select Category']) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('short_description', 'Short Description', ['class' => 'control-label mb-1']) }}

                                        {{ Form::textarea('short_description', null, ['class' => 'form-control ' . ($errors->has('short_description') ? 'is-invalid' : ''), 'id' => 'short_description']) }}

                                        @error('short_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('description', 'Description', ['class' => 'control-label mb-1']) }}

                                        {{ Form::textarea('description', null, ['class' => 'form-control my-editor ' . ($errors->has('description') ? 'is-invalid' : ''), 'id' => 'description']) }}

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('image', 'Image', ['class' => 'control-label mb-1']) }}

                                        {{ Form::file('img', ['class' => 'form-control ' . ($errors->has('img') ? 'is-invalid' : '')]) }}

                                        @error('img')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <button id="payment-button" type="submit"
                                            class="btn btn-lg btn-success rounded btn-block">
                                            <i class="fa fa-save fa-lg"></i>&nbsp;
                                            <span id="payment-button-amount">Save</span>
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
