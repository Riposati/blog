<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@extends('template')

@section('content')

    <h1>Admin do Blog</h1>
    <hr>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <a class="btn btn-warning" href="/blog-admin/form-insere">Novo Post</a>

    @if($errors->any())

        <ul class="alert">

            @foreach($errors->all() as $erro)

                <li>{{ $erro }}</li>

            @endforeach

        </ul>

    @endif

    @foreach($posts as $post)
        <div>
            <h2 style="color:orange">{{$post->title}}</h2>
            <h3 style="color:brown">{{$post->content}}</h3>
            <a class="btn btn-primary" href="/blog-admin/ver-post/{{$post->id}}">Ver Post</a>
            <a class="btn btn-danger" href="/blog-admin/deleta-post/{{$post->id}}">Deletar</a>
            <a class="btn btn-info" href="/blog-admin/update/{{$post->id}}">Alterar</a>

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

                        <a class="btn btn-danger" href="/blog-admin/deleta-comment/{{$comment->id}}">Deletar</a>

                    </div>
                @endforeach
        </div>

        @else
            <h3>Ainda estou sem comentários!</h3>
        @endif

        <br>
        <hr>
    @endforeach

    {!! $posts->render() !!}

@stop

<script>
    $(document).ready(function () {
        $(".btn-danger").click(function () {
            if (!confirm("Realmente quer remover ?")) {
                return false;
            }
        });
    });
</script>
