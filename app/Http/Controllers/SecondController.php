<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecondController extends Controller
{
    //
    public function __invoke()
    {
    	// $this-.
	    return view('second');
    }
    // function

}
