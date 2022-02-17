<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        echo "#{$post->id}<h3>Titulo : {$post->title}</h3>";
        echo "<p>Subtitulo: {$post->subtitle} </p>";
        echo "<p>Conteúdo: {$post->description} </p>";
        // formatação vinda de Post.php, da função getCreatedFormatAttribute()
        echo "<p>Data de criação: {$post->createdFormat} </p>"; 
        echo "<hr>";

        // $post->title = 'Título de Opção Secundária !';
        // $post->save();

        $postAuthor = $post->author()->get()->first();

        if ($postAuthor) {
            echo "<h1>Dados do Usuário</h1><br>";
            echo "<p>Nome do usuario : {$postAuthor->name}</p>";
            echo "<p>Email do usuario : {$postAuthor->email}</p>";
        }

        $postCategories = $post->categories()->get();

        if($postCategories){
            echo "<h1>Categorias</h1>";
            foreach ($postCategories as $postCategory) {
                echo "<h2>Categoria : {$postCategory->name} (id:{$postCategory->id})</h2>";
            }
        }

        //$post->categories()->attach([3]);
        //$post->categories()->detach([3]);
        //$post->categories()->sync([5,10]);
        //$post->categories()->syncWithoutDetaching([5,6,7]);
        
        // $post->comments()->create([
        //     'content' => 'Comentario uhull'
        // ]);

        $comments = $post->comments()->get();
        if($comments){
            echo "<h1>Comentários</h1>";
            foreach ($comments as $comment) {
                echo "Comentario: {$comment->content}";
                echo "<hr>";
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
