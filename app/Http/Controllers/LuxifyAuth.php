<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

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
                    if(isset($_POST['type']) && $_POST['type'] == 'register'){
                        // var_dump($_POST); exit;
                        $reg_email = $_POST['email'];
                        $user_exist = DB::table('users')->where('email', $reg_email)->get();
                        if(count($user_exist) > 0){
                            echo json_encode((object) ['result' => 2, 'message'=> 'Email is used.']);
                        }else{
                            echo json_encode((object) ['result' => 0, 'message'=> 'Email is good to use.']);
                        }
                        exit();
                    }else{
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
                    }
                break;
                case 'login':
                    // var_dump($_POST); exit();
                    $email = $_POST['email'];
                    $salt = $_POST['salt'];
                    $password = $_POST['hashed'];

                    $auth = User::where('email', '=', $email)->where('hashedPassword', '=', $password)->where('salt', '=', $salt)->where('isSuspended', '=', 0)->first();

                    if($auth) {
                        // Authentication passed...
                        Auth::login($auth);
                        $role = Auth::user()->role;
                        // var_dump(Auth::user()); var_dump(Auth::user()->role); exit();
                        switch($role){
                            case 'admin':
                            return redirect()->intended('/panel');
                            break;
                            case 'editor':
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
                        return redirect()->intended('/login?err=wrong%20password');
                    }
                break;
                case 'login_ajax':
                    // var_dump($_POST); exit();
                    $email = $_POST['email'];
                    $salt = $_POST['salt'];
                    $password = $_POST['hashed'];
                    $_ref = $_POST['_ref'];

                    $auth = User::where('email', '=', $email)->where('hashedPassword', '=', $password)->where('salt', '=', $salt)->first();

                    if($auth) {
                        // Authentication passed...
                        Auth::login($auth);
                        $role = Auth::user()->role;
                        // var_dump(Auth::user()); var_dump(Auth::user()->role); exit();
                        echo json_encode((object) ['result' => 1, 'message'=> 'Login successful.']);
                    }else{
                      echo json_encode((object) ['result' => 0, 'message'=> 'Incorrect Email or Password']);
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
            $newUser->username = $fullname;
            $newUser->email = $email;
            $newUser->role = 'user';
            $newUser->save();
            if ($newUser->id ) {
                $username_to = $fullname;
                $details = array('to' => $email);
                $this_url = url('/');
                Mail::send('emails.luxify-welcome-en-us', ['username_to' => $username_to, 'this_url' => $this_url], function ($message) use ($details){

                    $message->from('technology@luxify.com', 'Luxify Admin');
                    $message->subject('Welcome to Luxify');
                    $message->replyTo('no_reply@luxify.com', $name = null);
                    $message->to($details['to']);

                });

                $auth = User::where('email', '=', $email)->where('hashedPassword', '=', $hashed)->where('salt', '=', $salt)->first();
                if($auth) {
                    // Authentication passed...
                    Auth::login($auth);
                    $role = Auth::user()->role;
                    // var_dump(Auth::user()); var_dump(Auth::user()->role); exit();
                    switch($role){
                        case 'admin':
                        return redirect()->intended('/panel');
                        break;
                        case 'editor':
                        return redirect()->intended('/panel');
                        break;
                        case 'seller':
                        return redirect()->intended('/dashboard');
                        break;
                        case 'user':
                        return redirect()->intended('/dashboard/profile');
                        break;
                    }
                }
            } else {
              return redirect()->intended('/login');
            }
        } else {
          return redirect()->intended('/login');
        }
    }

    public function logout(Request $request) {
        $request->session()->flush();
        Auth::logout();
        return redirect()->intended('/login');
    }
    
    public function forgetPassword(Request $request){
        $email = $request->input('email');

        $checkemail = DB::table('users')
                   ->where('email', $email)
                   ->count();
        if($checkemail < 1){
            return redirect('/forget-password?error=3');
        }else{
        	// Email found!!
        	$token = str_random(32);
        	$date = date("Y-m-d H:m:s");
        	DB::table('reset_password')->insert(['username' => $email, 'token' => $token, 'reset_at' => $date]);
        	

        	$details = array('to' => $email);
        	$this_url = url('/') . '/reset-password/' . $token;
        	// var_dump($this_url); exit;
        	Mail::send('emails.luxify-reset-password-en-us', ['this_url' => $this_url], function ($message) use ($details){

        	    $message->from('technology@luxify.com', 'Luxify Admin');
        	    $message->subject('Reset Password');
        	    $message->replyTo('no_reply@luxify.com', $name = null);
        	    $message->to($details['to']);

        	});
            return redirect('/forget-password?success=1');
        }
        
    }

    public function resetPassword(Request $request){
    	$email = $request->input('email');
    	DB::table('users')
    	->where('email', $email)
    	->update(['hashedPassword' => $request->input('hashed'), 'salt' => $request->input('salt')]);
    	return redirect()->intended('/login');
    }
}
