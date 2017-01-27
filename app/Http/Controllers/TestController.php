<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{	
 	public function index($nome){

 		return view('gustavo/index', ['nome' => $nome]);
 	}

 	public function notas(){

        $notas = [0=>'nota 1',1=>'nota 2',2=>'nota 3',3=>'nota 4',4=>'nota 5'];

 	    return view('gustavo/notas' , ['notas' => $notas]);
    }
}
