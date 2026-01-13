<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;

class TestingController
{


    public function others()
    {
        return view('landing.others.index');
    }


    // Pretest
    




    // Posttest
    public function posttest()
    {
        return view('landing.posttest.index');
    }

    public function posttestQuestion()
    {
        return view('landing.posttest.test');
    }

    public function posttestQuestion2()
    {
        return view('landing.posttest.test2');
    }

    public function posttestFinished()
    {
        return view('landing.posttest.index-finished');
    }


    // Materials and Certificates
    

    public function certificates()
    {
        return view('landing.certificates.index');
    }
}
