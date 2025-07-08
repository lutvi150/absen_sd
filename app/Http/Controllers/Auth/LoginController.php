<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'email'    => 'required',
            'password' => 'required',
        ];
        $message = [
            'email.required'    => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            $respon = [
                'status'  => 'validationerror',
                'msg'     => 'Validation Error',
                'erors'   => $validator->errors(),
                'content' => null,
            ];
            return response()->json($respon, 200);
        } else {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = User::join('skpds', 'users.id_skpd', '=', 'skpds.id')->where('email', $request->email)->select('users.name', 'users.email', 'users.id', 'users.role', 'users.status_account', 'skpds.skpd_name', 'users.id_skpd')->first();
                Session::put(['data' => $user, 'id_field' => 1]);
                $respon = [
                    'status'  => 'success',
                    'msg'     => 'success',
                    'erors'   => null,
                    'data'    => Session::get('data'),
                    'content' => null,
                ];
                return response()->json($respon, 200);
            } else {
                $respon = [
                    'status'  => 'failed',
                    'msg'     => 'failed',
                    'erors'   => null,
                    'content' => null,
                ];
                return response()->json($respon, 200);
            }
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
