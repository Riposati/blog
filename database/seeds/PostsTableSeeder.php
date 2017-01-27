<?php

use Illuminate\Database\Seeder;
use \App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::truncate(); // remove todos os registros
        factory('App\Post' , 50)->create(); // cria 20 registros fakes pra teste
    }
}
