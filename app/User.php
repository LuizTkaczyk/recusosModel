<?php

namespace App;

use App\Post;
use App\Comment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function addressDelivery(){
        //ATENÇÃO PARA A ORDEM!
        //Procura na model Address a chave estrangeira dentro desse modelo (user),
        // e em seguida verifica com qual ela tem relacionamento (id) deste modelo (User)
        return $this->hasOne(Address::class,'user', 'id');
        //pode ser declarado assim tambem
        //return $this->hasOne('App\Address');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'author', 'id');
    }

    public function commentsOnMyPosts(){
        return $this->hasManyThrough(Comment::class,Post::class,'author','post','id','id');
    }
}
