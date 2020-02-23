@extends('layouts.layout')

@section('meta-title', $post->title)

@section('meta-description', $post->excerpt)

@section('content')
    <article class="post container">
        @include($post->viewType())
        <div class="content-post">
            @include('posts.header')
            <h1>{{ $post->title }}</h1>
            <div class="divider"></div>
            <div class="image-w-text">
                {!! $post->body !!}
            </div>

            <footer class="container-flex space-between">
               @include('posts.tags')
            </footer>
            <div class="comments">
                <div class="divider"></div>
                <div id="disqus_thread"></div>
            </div>
        </div>
    </article>

        <div class="col-md-10 m-auto pb-3">
            <div class="card card-primary card-outline text-center">
                <div class="card-header with-border">
                    <h1>Comentarios</h1>
                    <button class="btn btn-primary" id="comments">Crear comentario</button>
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.comments.store', $post->slug) }}" method="post" id="create_comments">
                        @csrf
                        <div class="form-group col-md-6 m-auto pb-4">
                            <label for="name_user" class="float-left">Nombre:</label>
                            <input type="text" name="name_user" id="name_user" class="form-control ">
                        </div>
                        <div class="form-group col-md-6 m-auto pb-2">
                            <label for="comment" class="float-left">Comentario:</label>
                            <textarea class="form-control" rows="3" name="comment"
                                      id="comment" placeholder="Inserte su comentario."></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary ">Crear</button>
                        </div>
                    </form>
                    @forelse($post->comments as $comment)
                        <div class="card card-primary card-outline with-border">
                            <div class="card-header pt-2">
                                <strong>{{ $comment->name_user }}</strong>
                                <small>{{ $comment->created_at }}</small>
                                <form action="{{ route('posts.comments.destroy', $comment) }}" method="post" class="d-inline float-right">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-xs btn-danger" onclick="return confirm('¿Seguro que quieres eliminar este usuario?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                            </div>
                            <div class="card-body">
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </div>
                    @empty
                        <p>El post no tiene ningún comentario.</p>
                    @endforelse
                </div>
            </div>
        </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $('#carousel').carousel()
        $('#create_comments').hide();
        $('#comments').click(function() {
            $('#create_comments').toggle();
        })
    </script>
@endpush
