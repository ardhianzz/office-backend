<?php

namespace App\Http\Controllers\Login;

use App\Helpers\APIResponderHelper;
use App\Http\Controllers\Controller;
use App\Models\Master\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Master\JabatanUnitUser;

class loginController extends Controller
{
    use APIResponderHelper;

    public function login(Request $request)
    {
        
       
        if ($request->token) return $this->loginToken($request->token);
        
        $input = [
            'nik' => $request->username,
            'password' => $request->password
        ];

        $user = User::where('nik', $input['nik'])->first();
        
        if (is_null($user)) return $this->failure('Data user tidak ditemukan');

        return $this->failure('Password yang anda masukkan salah');
    }
    


}
