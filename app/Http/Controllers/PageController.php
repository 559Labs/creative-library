<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $r)
    {
        $data = [];
        return view("public.home", $data);
    }

}
