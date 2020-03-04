@component('mail::message')
# !Hola, {{ $admin->name }}! Se ha creado un nuevo Post.

A continuación mostraremos la información sobre el post.

@component('mail::table')
    | Username | Titulo del Post |
    |:--------|:----------|
    |{{ $user->name }} | {{ $post->title }}
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent
