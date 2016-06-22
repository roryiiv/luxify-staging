<?php

namespace App\Http\Controllers;

use DB;

use App\User;

use Auth;

class LuxifyAuth extends Controller
{

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {
        if(isset($_POST['action'])){
            $action = $_POST['action'];
            switch($action){
                case 'get_email':
                    $email = $_POST['email'];
                    $salt = User::select('salt')
                    ->where('email', $email)
                    ->first();
                    echo json_encode($salt->salt);
                    exit();
                break;
                case 'login':
                    // var_dump($_POST); exit();
                    $email = $_POST['email'];
                    $salt = $_POST['salt'];
                    $password = $_POST['hashed'];

                    $auth = User::where('email', '=', $email)->where('hashedPassword', '=', $password)->where('salt', '=', $salt)->first();

                    if($auth){
                        // Authentication passed...
                        Auth::login($auth);
                        // var_dump(Auth::user()); var_dump(Auth::user()->role); exit();
                        $role = Auth::user()->role;
                        switch($role){
                            case 'admin':
                            return redirect()->intended('/panel');
                            break;
                            case 'seller':
                            return redirect()->intended('/dashboard');
                            break;
                            case 'user':
                            return redirect()->intended('/dashboard/profile');
                            break;
                        }
                    }else{
                        return redirect()->intended('/login');
                    }
                break;
            }

        }

    }

    public function logout() {
        Auth::logout();
        return redirect()->intended('/login');
    }
}
