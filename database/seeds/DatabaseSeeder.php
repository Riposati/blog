<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User')->create(

            [
                'name' => "Gustavo",
                'email' => 'guriposa@gmail.com',
                'password' => bcrypt('123456'),
                'remember_token' => str_random(10),
            ]
        ); // pra criar um user fake

        // $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class); // executa nossa seeder


    }
}
