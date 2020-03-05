@extends('admin.layouts.layouts')

@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">POSTS <small> Editar un post</small></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Posts</a></li>
                <li class="breadcrumb-item active">Editar post</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">
                Editar un post nuevo
            </h3>
        </div>
        <div class="card-body">
            @if($post->photos->count() > 0)
                <div class="row">
                    @foreach($post->photos as $photo)
                        <div class="col-md-2">
                            <form action="{{ route('admin.photos.destroy', $photo) }}" method="post" class="form-inline">
                                @csrf
                                @method('delete')
                                    <button class="btn btn-danger btn-xs" style="position: absolute">
                                        <i class="fa fa-times-circle"></i>
                                    </button>
                                    <img src="{{ Storage::url($photo->url) }}" class="img-responsive img-thumbnail">
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('admin.posts.update', $post) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-outline card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Título del post</label>
                                    <input type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                           placeholder="Describe el título del post" value="{{ old('title', $post->title) }}">
                                    {!! $errors->first('title', '<span class="form-text text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                Contenido del post
                                            </h3>
                                            <!-- tools box -->
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                                        data-toggle="tooltip"
                                                        title="Collapse">
                                                    <i class="fas fa-minus"></i></button>
                                                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove"
                                                        data-toggle="tooltip"
                                                        title="Remove">
                                                    <i class="fas fa-times"></i></button>
                                            </div>
                                            <!-- /. tools -->
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body pad">
                                            <div class="mb-3">
                                                <textarea class="form-control textarea {{ $errors->has('body') ? 'is-invalid' : '' }}"
                                                          placeholder="Escribe el texto del post" name="body"
                                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('body', $post->body) }}</textarea>
                                                {!! $errors->first('body', '<span class="form-text text-danger">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Audio o video embebido del post</label>
                                            <textarea name="iframe" rows="4" placeholder="Añade el iframe del video o del audio"
                                                      class="form-control {{ $errors->has('iframe') ? 'is-invalid' : '' }}"
                                            >{{ old('iframe', $post->iframe) }}</textarea>
                                            {!! $errors->first('iframe', '<span class="form-text text-danger">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-outline card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Fecha de publicación:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="published_at"
                                               name="published_at" value="{{ old('published_at', $post->published_at ?
                                                $post->published_at->format('m/d/Y') : null) }}">
                                    </div>
                                </div>
                                {{ Form::bsSelect('category_id', false ,$categories->pluck('name'), $post->category_id) }}
                                {{ Form::bsSelect('tags', true ,$tags->pluck('name'), $post->tags) }}
                                <div class="form-group">
                                    <label for="excerpt">Extracto del post</label>
                                    <textarea name="excerpt" id="excerpt" placeholder="Escribe un extracto del post"
                                              class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}"
                                    >{{ old('excerpt', $post->excerpt) }}</textarea>
                                    {!! $errors->first('excerpt', '<span class="form-text text-danger">:message</span>') !!}
                                </div>
                                <div class="form-group">
                                    <div class="dropzone">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Actualizar post</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="/adminlte/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/adminlte/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endpush

@push('scripts')
    <script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>
    <script src="/adminlte/plugins/moment/moment.min.js"></script>
    <script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        $(function () {
            $('#published_at').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2020,
                maxYear: parseInt(moment().format('YYYY'), 10)+1
            });
            $('#published_at').val('{{ old('published_at', $post->published_at ?
                                                $post->published_at->format('m/d/Y') : null) }}')
            $('.select2').select2({
                tags: true
            });
            $('.textarea').summernote();

            var photos = new Dropzone('.dropzone', {
                url: '{{ route('admin.posts.photos.store', $post->slug) }}',
                acceptedFiles: 'image/*',
                paramName: 'photo',
                maxFilesize: 2,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                dictDefaultMessage: 'Arrastra aqui las fotos'
            });
            photos.on('error', function (file, res)  {
                var msg = res.errors.photo[0];
                $('.dz-error-message:last > span').text(msg);
            });

        });

    </script>
@endpush
