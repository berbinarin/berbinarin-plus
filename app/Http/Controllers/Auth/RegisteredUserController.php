<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class RegisteredUserController
{
    public function berbinarPlusRegister (){
        return view('auth.register.register');
    }
}
