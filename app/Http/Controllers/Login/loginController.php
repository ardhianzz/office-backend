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
        $input = [
            'nik' => $request->username,
            'password' => $request->password
        ];


        $user = User::where('nik', $input['nik'])->get();
        if ($user->count() == 0) return $this->failure('User tidak ditemukan');
        
        /*
        * JIKA USER ID DITEMUKAN, CEK PASSWORD
        */
        if(auth()->attempt($input)){
            $data = $user;
            /*
            *  MEMBUAT TOKEN AKSES 
            */


            /*
            * RETURN RESPON BERHASIL
            */
            return $this->success("Proses Berhasil", $data);
        }

        return $this->failure('Password yang anda masukkan salah');
    }
    


}
