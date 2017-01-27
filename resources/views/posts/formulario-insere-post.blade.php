@extends('template')

@section('content')

    <h1>Admin Blog</h1><br>
    <h2>Inserção de novo post</h2>

    {!! Form::open(['route' => 'blog/insere' ,'method'=>'post']) !!}

    @include('posts/_formulario')

    <div class="form-group">

        {!! Form::label('tags', 'Tags:') !!}
        {!! Form::textarea('tags',null,['class' => 'form-control']) !!}

    </div>

    <div class="form-group">

        {!! Form::submit('Inserir Postagem',['class' => 'btn btn-primary']) !!}

    </div>

    {!! Form::close() !!}

    <br><a href="/blog-admin"><h3>Voltar</h3></a><br>

@stop
