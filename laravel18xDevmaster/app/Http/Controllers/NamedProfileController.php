<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NamedProfileController extends Controller
{
    public function display()
    {
        return "<h1> named route controller ";
    }
    public function show()
    {
        return redirect()->route('display.profile');
    }
}
