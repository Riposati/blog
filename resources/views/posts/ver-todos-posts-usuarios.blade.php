<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@extends('template-usuario')

@section('content')

    <h1>Blog</h1>
    <hr>
    @foreach($posts as $post)
        <div>
            <h2 style="color:orange">{{$post->title}}</h2>
            <h3 style="color:brown">{{$post->content}}</h3>

            <h3>Tags</h3>

            <ul style="border-radius:10px;background-color: #1f648b;color:white">

                @if(count($post->tag) >= 1)

                    @foreach($post->tag as $tag)

                        <div>
                            <li>{{$tag->name}}</li>
                        </div>
                    @endforeach

                @else
                    <li>Sem Tags!</li>
                @endif

            </ul>

            <h2><span>Comentários desta publicação</span></h2>

            @if(count($post->comments) >= 1)

                @foreach($post->comments as $comment)

                    <div style="background-color:#526d63;color:white;padding:7px;margin:7px;border-radius: 10px">

                        <p>Autor<br>{{$comment->name}}</p>
                        <hr>
                        <p>{{$comment->comment}}</p>
                    </div>
                @endforeach
        </div>

        @else
            <h3>Ainda estou sem comentários!</h3>
        @endif

        <a class='btn btn-info' href="/blog/form-comentario/{{$post->id}}">Adicionar comentário</a>

        <br>
        <hr>
    @endforeach

    {!! $posts->render() !!}

@stop

