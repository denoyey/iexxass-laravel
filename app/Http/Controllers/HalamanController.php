<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function dashboard(){
        return view('index', ['title' => 'I’Exxass | ICT Solutions, Web Development & IT Consultancy']) ;
    }
}
