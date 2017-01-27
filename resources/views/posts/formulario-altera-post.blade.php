@extends('template')

@section('content')

    <h1>Admin Blog</h1><br>
    <h2>Alteração de novo post</h2>

    {!! Form::model($post, ['route' => ['posts/edit' , $post->id],'method'=>'put']) !!}

    @include('posts/_formulario')

    <div class="form-group">

        {!! Form::label('tags', 'Tags:') !!}
        {!! Form::textarea('tags',$post->tagList,['class' => 'form-control']) !!}

    </div>

    <div class="form-group">

        {!! Form::submit('Atualizar Postagem',['class' => 'btn btn-primary']) !!}

    </div>

    {!! Form::close() !!}

    <br><a href="/blog-admin"><h3>Voltar</h3></a><br>
@stop
