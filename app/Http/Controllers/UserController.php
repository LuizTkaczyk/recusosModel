<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $user = User::find($id);
        echo "<h1>Dados do Usuário</h1><br>";
        echo "<p>Nome do usuario : {$user->name}</p>";
        echo "<p>Email do usuario : {$user->email}</p>";

        $userAddress = $user->addressDelivery()->get()->first();

        if ($userAddress) {
            echo "<h1>Endereço de entrega</h1>";
            echo "<p>Endereço completo : {$userAddress->address} , nº {$userAddress->number} - cep: {$userAddress->zipcode}</p>";
            echo "<p>Cidade: {$userAddress->city} - UF: {$userAddress->state}</p>";
        }

        //adicionando um novo endereço como sendo do user de id 1 - modo 1
        // $addressTest = new Address([
        //     'address' => 'Rua 10 de outubro', 
        //     'number' => '999', 
        //     'complement' => 'Santa helena', 
        //     'zipcode' => '85565-650', 
        //     'city' => 'Pinhão', 
        //     'state' => 'PR'
        // ]);

        //adicionando um novo endereço como sendo do user de id 1 - modo 2
        // $address = new Address();
        // $address->address = 'Rua da travessa';
        // $address->number = '65412';
        // $address->complement = 'Bairro da rua';
        // $address->zipcode = '99999-854';
        // $address->city = 'Marte';
        // $address->state = 'AM';

        //$user->addresDelivery()->save($address);
        //$user->addresDelivery()->saveMany([$addressTest, $address]);

        // $users = User::with('addressDelivery')->get();
        // dd($users);

        $posts = $user->posts()->orderBy('id', 'desc')->get();
        // dd($posts);
        if ($posts) {
            echo "<h1>Artigos</h1>";

            foreach ($posts as $post) {
                echo "#{$post->id}<h3>Titulo : {$post->title}</h3>";
                echo "<p>Subtitulo: {$post->subtitle} </p>";
                echo "<p>Conteúdo: {$post->description} </p>";
                echo "<hr>";
            }
        }


        // $comments = $user->commentsOnMyPosts()->get();
        // echo "<h1>Comentarios nos meus artigos</h1>";

        // foreach ($comments as $comment) {
        //     echo "<span>Usuario {$comment->user} disse no artigo {$comment->post}:</span>";
        //     echo "<p>Comentario: {$comment->content} </p>";
        //     echo "<hr>";
        // }

        $user->comments()->create([
            'content' => 'Comentario do usuario'
        ]);

        $comments = $user->comments()->get();
        if ($comments) {
            echo "<h1>Comentários</h1>";
            foreach ($comments as $comment) {
                echo "Comentario: {$comment->content}";
                echo "<hr>";
            }
        }
        // studens e admin estão vindo de User.php, a palavra scope é abstraida pelo laravel e é declarada aqui com a inicial minuscula
        $students = User::students()->get();
        if ($students) {
            echo "<h1>Alunos</h1>";
            foreach ($students as $student) {
                echo "<h4>Nome do aluno: {$student->name}</h4>";
                echo "<h4>Email: {$student->email}</h4>";
                echo "<hr>";
            }
        }

        $admins = User::admins()->get();
        if ($admins) {
            echo "<h1>Administradores</h1>";
            foreach ($admins as $admin) {
                echo "<h4>Nome do Admin: {$admin->name}</h4>";
                echo "<h4>Email: {$admin->email}</h4>";
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
