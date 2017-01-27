<?php

use App\Tags;
use Illuminate\Database\Seeder;

class Tags_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tags::truncate(); // remove todos os registros
        //factory('App\Tags' , 20)->create(); // cria 20 registros fakes pra teste
    }
}
