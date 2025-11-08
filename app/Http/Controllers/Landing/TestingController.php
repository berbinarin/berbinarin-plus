<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;

class TestingController
{
    public function landing()
    {
        return view('landing.index');
    }

    public function homepage()
    {
        return view('landing.homepage.index');
    }

    public function others()
    {
        return view('landing.others.index');
    }

    public function preview()
    {
        return view('landing.preview.index');
    }

    public function pretest()
    {
        return view('landing.pretest.index');
    }

    public function pretestQuestion()
    {
        return view('landing.pretest.test');
    }

    public function pretestQuestion2()
    {
        return view('landing.pretest.test2');
    }

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

    public function materials()
    {
        return view('landing.materials.index');
    }

    public function certificates()
    {
        return view('landing.certificates.index');
    }
}
