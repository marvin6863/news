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
                            <strong class="card-title">{{ $page_name }} </strong>
                        </div>
                        <div class="card-body">
                            <!-- Credit Card -->
                            <div id="pay-invoice">
                                <div class="card-body">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li> {{ $error }} </li>
                                                @endforeach

                                            </ul>

                                        </div>
                                    @endif

                                    <hr>

                                    {{ Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) }}

                                    <div class="form-group">
                                        {{ Form::label('title', 'Title', ['class' => 'control-label mb-1']) }}

                                        {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('category', 'Category', ['class' => 'control-label mb-1']) }}

                                        {{ Form::select('category_id', $categories, $post->category_id, ['class' => 'form-control myselect', 'data-placeholder' => 'Select Category']) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('short_description', 'Short Description', ['class' => 'control-label mb-1']) }}

                                        {{ Form::textarea('short_description', null, ['class' => 'form-control', 'id' => 'short_description']) }}
                                    </div>

                                    <div class="form-group">
                                        {{ Form::label('description', 'Description', ['class' => 'control-label mb-1']) }}

                                        {{ Form::textarea('description', null, ['class' => 'form-control my-editor', 'id' => 'description']) }}
                                    </div>

                                    <div class="form-group">
                                        @if ($post->main_image)
                                            <img src="{{ asset('post') }}/{{ $post->thumb_image }} "
                                                class="img img-responsive w-15 rounded mb-2">
                                        @endif
                                    </div>

                                    <div class="form-group">

                                        {{ Form::label('image', 'Image', ['class' => 'control-label']) }}

                                        {{ Form::file('img', ['class' => 'form-control']) }}
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
