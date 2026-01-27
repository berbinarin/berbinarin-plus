<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;

class TestingController
{

    public function others()
    {
        return view('landing.others.index');
    }

}
