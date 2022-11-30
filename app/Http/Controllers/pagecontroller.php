<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagecontroller extends Controller
{
    //
    public function dashbord()
    {
        # code...
        return view('dashbord');
    }
}
