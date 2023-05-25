<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Models\Master\User;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(Request $request){
        $response = User::where("nik", $request->username)->get();
        return $response;
    }
}
