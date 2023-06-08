@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css">
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.11/dist/sweetalert2.min.css
" rel="stylesheet">
@endsection

@section('content')

    </head>
<div class="container p-5">
    <div class="row">
        @include('includes.messages')

        <div class="col-2 p-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postCreateModal">Create New Post</button>
        </div>
        <div class="col-12">
            <table class="table table-bordered" id="postTable">
                <thead>
                    <th>SN</th>
                    <th>Title</th>
                    <th>Short Description</th>
                    <th>Author</th>
                    <th>Published Date</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($posts as $post)
                    <tr>
                        <td> {{ $i++ }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->short_description }}</td>
                        <td>{{$post->getAuthor->name}}</td>
                        <td> {{ $post->published_at }}</td>
                        <td>
                            <button type="button" data-id="{{$post->id}}" class="btn btn-info editButton" data-bs-toggle="modal" data-bs-target="#postUpdateModal">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </button>

                            <form action="{{route('post.destroy', $post->id)}}" method="post">
                                @csrf @method('delete')
                                <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

</div>
    @include('post.form')
    @include('post.update')


@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.11/dist/sweetalert2.all.min.js
"></script>
    <script>
        let table = new DataTable('#postTable');

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $('#published_at').datetimepicker({
            format: 'YYYY-MM-DD hh:MM A'
        });



        $('#postCreateForm').on('submit', function(e){
            e.preventDefault();
            let title = $('#title').val();
            $.ajax({
                url: '{{ route('post.store') }}',
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    title: title,
                    short_description: $('#short_description').val(),
                    description: $('#description').val(),
                    published_at: $('#published_at').val(),

                },
                success: function(response){
                    if(response.status){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        })
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error Occurred',
                            text: response.message,
                        })
                    }
                    $('#title').val('');
                    $('#short_description').val('');
                    $('#description').val('');
                    $('#published_at').val('');
                    $('#closePostCreateModal').trigger('click');
                },
                error: function(error){
                    let errors = error.responseJSON.errors;
                    $.each(errors, function(key, value){
                        console.log(key);
                        $('#' + key + 'Error').html(value.toString());
                    });
                }

            });

       })

        $(document).on('click', '.editButton', function(e){
            let id = $(this).attr('data-id');

            let editRoute = '{{route('post.edit', ':id')}}';
            editRoute = editRoute.replace(':id', id);

            let updateRoute = '{{route('post.update', ':id')}}';
            updateRoute = updateRoute.replace(':id', id);
            $('#postUpdateForm').attr('action', updateRoute);

            $.ajax({
                url: editRoute,
                type: 'get',
                success: function(res){
                    if(res.status){
                        let post = res.post;
                        console.log(post);
                        $('#update_title').val(post.title);
                        $('#update_short_description').val(post.short_description);
                        $('#update_description').val(post.description);
                        $('#update_published_at').val(post.published_at);
                    }
                },
                error: function(err){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error occurred while fetching data',
                    })
                }
            });
        })

        $('#postUpdateForm').on('submit', function(e){
            e.preventDefault();
            let updateRoute = $('#postUpdateForm').attr('action');
            let title = $('#update_title').val();
            $.ajax({
                url: updateRoute,
                type: 'put',
                data: {
                    _token: '{{ csrf_token() }}',
                    title: title,
                    short_description: $('#update_short_description').val(),
                    description: $('#update_description').val(),
                    published_at: $('#update_published_at').val(),

                },
                success: function(response){
                    if(response.status){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message,
                        })
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error Occurred',
                            text: response.message,
                        })
                    }
                    $('#update_title').val('');
                    $('#update_short_description').val('');
                    $('#update_description').val('');
                    $('#update_published_at').val('');
                    $('#postUpdateForm').attr('action', '');
                    $('#closePostUpdateModal').trigger('click');
                },
                error: function(error){
                    let errors = error.responseJSON.errors;
                    $.each(errors, function(key, value){
                        $('#update_' + key + 'Error').html(value.toString());
                    });
                }

            });


        })

    </script>
@endsection
