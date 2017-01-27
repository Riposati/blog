<?php

use Illuminate\Database\Seeder;
use \App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::truncate();
        factory('App\Comment',20)->create(); // cria 20 registros fakes pra teste
    }
}
