@extends('layouts.app')

@section('content')

    </head>
    <div class="container p-5">
            <div class="row">

                <div class="col-12">

                    <div class="card" style="width: 100%">
                        <div class="card-body">
                            <h5 class="card-title">Post Form</h5>
                            <form method="post" action="{{route('post.update', $post->id)}}">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea class="form-control" name="short_description" id="short_description" cols="30" rows="4">{{  $post->short_description}}</textarea>
                                    @error('short_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="7">{{  $post->description}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 ">
                                    <label for="published_at" class="form-label">Published At</label>
                                    <input type="text" name="published_at" id="published_at" class="form-control datetimepicker-input" data-toggle="datetimepicker" data-target="#published_at" value="{{ $post->published_at }}">
                                    @error('published_at')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('post.index') }}" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



{{--        </div>--}}
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Popperjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js" ></script>
    <script type="text/javascript">
        $(function () {
            $('#published_at').datetimepicker({
                format: 'YYYY-MM-DD hh:mm A'

            });
        });

    </script>
@endsection
