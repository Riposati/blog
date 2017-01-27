<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [ // Serve pra criar o objeto passando todos os
                            // parametros de uma so vez
            'title', // titulo da postagem
            'content' // conteudo da postagem
    ];

    public function comments(){

        return $this->hasMany('App\Comment');
    }

    public function tag(){

        return $this->belongsToMany('App\Tags','posts_tags');
    }

    public function getTagListAttribute(){

        $tags = $this->tag()->pluck('name')->all(); // não é lists mais é pluck
        return implode(', ', $tags);
    }
}
