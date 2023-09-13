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

                            {{ Form::open(['url' => 'back/comment/reply', 'method' => 'post']) }}

                            <div class="form-group">
                                {{ Form::label('comment', 'Comment', ['class' => 'control-label mb-1']) }}

                                {{ Form::textarea('comment', null, ['class' => 'form-control ' . ($errors->has('comment') ? 'is-invalid' : ''), 'id' => 'comment']) }}

                                @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}*</strong>
                                    </span>
                                @enderror
                            </div>
                            {{ Form::hidden('post_id', $id) }}

                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-success rounded btn-block">
                                    <i class="fa fa-save fa-lg"></i>&nbsp;
                                    <span id="payment-button-amount">Submit</span>
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
