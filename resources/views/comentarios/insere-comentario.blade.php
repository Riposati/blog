@extends('template-usuario')

@section('content')

    <h1>Admin Blog</h1><br>
    <h2>Novo comentário para -  <i>{{$post->title}}</i></h2>

    {!! Form::open(['route' => 'blog/insereComentario' ,'method'=>'post']) !!}

    <div class="form-group">
        {!! Form::hidden('post_id',$post->id) !!}

    </div>

    @include('comentarios._formulario_insere_comentario')

    <div class="form-group">

        {!! Form::submit('Enviar',['class' => 'btn btn-primary']) !!}

    </div>

    {!! Form::close() !!}

    <br><a href="/blog"><h3>Voltar</h3></a><br>
@stop