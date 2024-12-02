<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $Request): string
    {
        //echo $Request->input('name')," FUN";
        $name = $Request->input('name');
        $lastname = $Request->input('lastname');
        return "Hello ".$name." ".$lastname;
    }

    public function helloFirst(Request $request): string
    {
        $firstname  =   $request->input('name.first');
        return "Hello ".$firstname;
    }

    public function helloInput(Request $request): string
    {
       $input = $request->input();
       
       return json_encode($input);
    }

    public function arrayInput(Request $request): string
    {
        // * adalah mengambil semua data array yang berkaitan contonya "name"
        $name = $request->input('products.*.price');
        return json_encode($name);
    }
}
