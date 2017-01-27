<?php

namespace App\Http\Controllers;
use App\Http\Requests\ComentarioRequest;

use App\Comment;
use App\Post;

class ComentarioController extends Controller
{
    public function index($id){
        $post = Post::find($id);
        return view('comentarios/insere-comentario' , ['post' => $post]);
}

    public function create(ComentarioRequest $request){
        Comment::create($request->all());
        $posts = Post::all();
        return redirect()->route('ver-todos-posts-usuarios',['posts' => $posts]);
    }

    public function deletaComment($id){

        $comment = Comment::find($id);

        if($comment != null) { // se existir remove
            $comment->delete(); // delete from posts where....
            $v = redirect()->route('blog-admin/ver-todos-posts')->with('status', 'Comentário deletado com sucesso!');
        }else{
            $v = redirect()->route('blog-admin/ver-todos-posts')->with('status', 'Não existe esse registro!');
        }
        return $v;
    }
}
