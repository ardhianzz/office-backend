<?php

namespace App\Http\Controllers\Login;

use App\Helpers\APIResponderHelper;
use App\Http\Controllers\Controller;
use App\Models\Master\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class loginController extends Controller
{
    use APIResponderHelper;

    public function login(Request $request)
    {
        $input = [
            'nik' => $request->username,
            'password' => $request->password
        ];
        $user = User::where('nik', $input['nik'])->first();

        if (is_null($user)) return $this->failure('User tidak ditemukan');
        try {
            if ($user['access_token'] = JWTAuth::attempt($input)) {
                $user->save();
                return $this->success("Proses Berhasil", $user['access_token']);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return $this->failure('Password yang anda masukkan salah');
    }
}
