@extends('layouts.layout')

@section('content')
@if(isset($title))
    <h1 class="card-title text-center">{{ $title }}</h1>
@endif

<section class="posts container">
    @foreach($posts as $post)
        <article class="post">
            @include($post->viewType('-preview'))
            <div class="content-post">
               @include('posts.header')
                <h1>{{ $post->title }}</h1>
                <div class="divider"></div>
                <p>{{ $post->excerpt }}</p>
                <footer class="container-flex space-between">
                    <div class="read-more">
                        <a href="{{ route('posts.show', [$post->slug]) }}" class="text-uppercase c-green">Leer más <i class="fa fa-chevron-circle-right"></i></a>
                    </div>
                    <div>Numero de visitas: {{ $post->visits }}</div>
                    @include('posts.tags')
                </footer>
            </div>
        </article>
    @endforeach

</section>

{{ $posts->links() }}

@endsection
