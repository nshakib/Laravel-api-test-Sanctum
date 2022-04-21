<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyController extends Controller
{
    public function getData()
    {
        return ['name' => 'shakib', 'email'=>'nshakib.dev@gmail.com','address'=>'Dhaka, Bangladesh'];
    }
}
