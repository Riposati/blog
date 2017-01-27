<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Tags;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tag;

class PostsController extends Controller
{
    public function usuarios(){
        $posts = Post::orderBy('id', 'desc')->paginate(5); // select * from posts
        return view('posts/ver-todos-posts-usuarios' , ['posts' => $posts]);
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5); // select * from posts
        return view('posts/ver-todos-posts', ['posts' => $posts]);
    }

    public function verPost($id)
    {
        $post = Post::find($id); // select from posts where....

        return view('posts/ver-post', ['post' => $post]);
    }

    public function deletaPost($id)
    {

        $post = Post::find($id);

        if ($post != null) { // se existir remove
            $post->delete(); // delete from posts where....
            $v = redirect()->route('blog-admin/ver-todos-posts')->with('status', 'Postagem deletada com sucesso!');
        } else {
            $v = redirect()->route('blog-admin/ver-todos-posts')->with('status', 'Não existe esse registro!');
        }
        return $v;
    }

    public function formularioInserePost()
    {
        return view('posts/formulario-insere-post');
    }

    public function create(PostRequest $request)
    {
        $post = Post::create($request->all());
        $post->tag()->sync($this->getTagsIds($request)); // aqui ele salva na tabela pivo as tags e posts

        return redirect()->route('blog-admin/ver-todos-posts');
    }

    public function formularioAlteraPost($id)
    {
        $posts = Post::find($id);

        if ($posts == null) {
            $v = redirect()->route('blog-admin/ver-todos-posts')->with('status', 'Não existe esse registro!');
        } else {
            $v = view('posts/formulario-altera-post', ['post' => $posts]);
        }
        return $v;
    }

    public function alteraPost($id, PostRequest $request)
    {
        $post = Post::find($id);

        if ($post == null) {
            return redirect()->route('blog-admin/ver-todos-posts')->with('status', 'Postagem não encontrada!');
        } else {
            $post->tag()->sync($tags = $this->getTagsIds($request)); // aqui ele salva na tabela pivo as tags e posts

            $post->find($id)->update($request->all());
        }
        return redirect()->route('blog-admin/ver-todos-posts')->with('status', 'Postagem Atualizada com sucesso!');
    }

    private function getTagsIds(Request $request)
    {
        $tags = array_filter(array_map('trim', explode(',', $request->tags)));

        $tagsIds = array();

        foreach ($tags as $tag) {
            $tagsIds[] = Tags::firstOrCreate(['name' => $tag])->id;
        }
        return $tagsIds;
    }
}
