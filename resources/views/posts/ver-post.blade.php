@extends('template')

    @section('content')

            <h1>Admin do Blog</h1><br>

                <div>
                    <h2 style="color:orange" >{{$post->title}}</h2>
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

                    <h3>Comentários desta publicação</h3>

                    @foreach($post->comments as $comment)

                        <div style="background-color:#526d63;color:white;padding:7px;margin:7px;border-radius: 10px">

                            <p>Autor<br>{{$comment->name}}</p>
                            <hr>
                            <p>Comentário<br>{{$comment->comment}}</p>

                        </div>
                    @endforeach
                </div>

            <br><a href="/blog-admin"><h3>Voltar</h3></a><br>
    @stop
