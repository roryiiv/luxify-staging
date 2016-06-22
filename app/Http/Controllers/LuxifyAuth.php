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
                    $user= User::select('salt')
                    ->where('email', $email)
                    ->first();
                    // validate the user can be found by email
                    if ($user) {
                      echo json_encode((object) ['result'=> 1, 'salt' => $user->salt]);
                    } else {
                      echo json_encode((object) ['result' => 0, 'message'=> 'Email not exists.']);
                    }
                    exit();
                break;
                case 'login':
                    // var_dump($_POST); exit();
                    $email = $_POST['email'];
                    $salt = $_POST['salt'];
                    $password = $_POST['hashed'];

                    $auth = User::where('email', '=', $email)->where('hashedPassword', '=', $password)->where('salt', '=', $salt)->first();

                    if($auth) {
                        // Authentication passed...
                        Auth::login($auth);
                        $role = Auth::user()->role;
                        // var_dump(Auth::user()); var_dump(Auth::user()->role); exit();
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
    public function register() {
      $email = $_POST['email'];      
      $fullname = $_POST['fullname'];      
      $hashed = $_POST['hashed'];
      $salt= $_POST['salt'];
      $password = $_POST['password'];
      $password_confirmation = $_POST['password_confirmation'];
      if ($password ===  $password_confirmation) {
        $newUser = new User;
        $newUser->hashedPassword = $hashed;
        $newUser->salt = $salt;
        $newUser->fullName = $fullname;
        $newUser->email = $email;
        $newUser->save();
        if ($newUser->id ) {
          return redirect()->intended('/dashboard/profile');
        } else {
          return redirect()->intended('/login');
        }
      } else {
        //return redirect()->intended('/register'); 
        return view('auth.register');
      }
      
    
    }

    public function logout() {
        Auth::logout();
        return redirect()->intended('/login');
    }
}
