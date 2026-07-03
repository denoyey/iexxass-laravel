<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class HalamanController extends Controller
{
    public function dashboard()
    {
        return view('pages.public.home.index', ['title' => 'I\'Exxass | ICT Solutions, Web Development & IT Consultancy']);
    }
}
