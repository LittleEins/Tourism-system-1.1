<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import User Model
use App\Models\User;
// Import Hash class
use Illuminate\Support\Facades\Hash;
// Import this is you are using mailer
use Illuminate\Support\Facades\Mail;
// Import Mail class
use App\Mail\MailNotification;
use App\Mail\ResetPassNotification;

class MainController extends Controller
{

    // View Routes
    function home()
    {
        return view('home.index');
    }

    function login ()
    {
        return view('login_signup.login');
    }

    function signup ()
    {
        return view('login_signup.signup');
    }

    function map ()
    {
        return view('user.map');
    }


    // ------- LOGIN -------

    // Login Process
    function login_check (Request $req) 
    {
        

        // login Validation
        $req->validate([
            'email' => 'required | email',
            'password' => 'required | min:8'
        ]);

        // Getting User Info
        $userInfo = User::where('email','=',$req->email)->first();

        // Credential Check if Match
        if (!$userInfo) 
        {
            return back()->with('fails','We dont recognize your account!');
        } 
        else 
        {
            // checking password if match
            if (hash::check($req->password, $userInfo->password))
            {
                // Storing ID to Session
                $req->session()->put('LoggedUser', $userInfo->id);
                if ($userInfo->role == '0')
                {
                    return redirect()->route('dashboard.view');
                }
                else if ($userInfo->role == '1')
                {
                    return redirect()->route('dashboardStuff.view');
                }
                else if ($userInfo->role == '2')
                {
                    return redirect()->route('admin.dashboard');
                }
                
            }
            else
            {
                return back()->with('fails','Incorrect Password!');
            }
        }
    }

    // ------- LOGOUT -------

    // Logout Process
    function logout ()
    {
        if (session()->has('LoggedUser'))
        {
            // Removing Logged Account to Session
            session()->pull('LoggedUser');

            return redirect()->route('login')->with('success','Logout successfully');
        }
    }

    // ------- REGISTRATION -------

    // Register Process
    function register_store (Request $req)
    {

        // signup Validation
        $req->validate([
            'first_name' => 'required | min: 2',
            'last_name' => 'required | min: 2',
            'phone' => 'required | min: 11',
            'email' => 'required | email | unique:users',
            'password' => 'required | confirmed | min:8 ',
        ]);

        // Random 6digit numiric generator
        $otp = random_int(100000, 999999);

        // Insert Data to DB
        $data = new User;
        $data->first_name = $req->first_name;
        $data->last_name = $req->last_name;
        $data->email = $req->email;
        $data->phone = $req->phone;
        $data->img_name = "default-profile.png";
        $data->otp = $otp;
        $data->password = hash::make($req->password);
        $data->verification_code = sha1(time());
        $data->role = '0';
        $data->save();

        // getting user data
        $user_data = User::where('email','=',$req->email)->first();

        // If account is created send mail
        if ($user_data)
        {
            // array data included some user data
            $data = [
                'id' => $user_data->id,
                'name' => $user_data->first_name,
                'otp' => $user_data->otp, 
                'verification_code' => $data->verification_code,
            ];
    

            $user_id = $user_data->id;
            // mailer send the email
            Mail::to($req->email)->send(new MailNotification($data));
            return redirect()->route('verificationUser.view')->with(['success'=>'Email verification has been sent.','id'=>$user_id]);
        }
        else
        {
            return redirect()->back()->with('fails','something wrong..');
        }
        
    }

    // ------- EMAIL VERIFICATION -------

    // return to view page
    function verify ()
    {
        return view('verification.verify');
    }

    // verify check
    function verify_user ()
    {
        // getting code from url you pass
        $verification_code = \Illuminate\Support\Facades\Request::get('code');

        $user = User::where(['verification_code' => $verification_code])->first();

        if ($user != null)
        {
            $user->is_verified = 1;
            $user->save();

            return redirect()->route('login')->with('success','Account activated!. Thank you.');
        }
        else
        {
            return redirect()->route('login')->with('fails','Something wrong.');
        }
    }

    // OTP cheking 
    function otp_check (Request $req)
    {
        $req->validate([
            'otp' => 'required | integer | min:6'
        ]);
       
        $user = User::where('otp',"=", $req->otp)->first(); 

        if ($user != null) {

            if ($req->otp == $user->otp) {
            
                $user->is_verified = 1;
                $user->save();
                
                return redirect()->route('login')->with('success','Account activated!. Thank you.');
    
            }
            else {
                return back()->with('fails','Something Wrong.');
            }
            
        }
        else {
            return back()->with('fails','Incorrect OTP.');
        }
    }

    // resend email verification
    function resend_emailverification ()
    {
        // getting data from url
        $email_id = \Illuminate\Support\Facades\Request::get('id');

        // $resend_email = User::where('id',"=", $email_id)->first();
        dd($email_id);
        // If we got dat from that id
        if ($resend_email != null)
        {
            // array data included some user data
            $data = [
                'id' => $resend_email->id,
                'name' => $resend_email->first_name,
                'otp' => $resend_email->otp, 
                'verification_code' => $resend_email->verification_code,
            ];
    

            $user_id = $resend_email->id;
            // mailer send the email
            Mail::to($resend_email->email)->send(new MailNotification($data));
            return redirect()->route('verification.view')->with(['success' => 'Email verification has been sent.', 'id' => $user_id ]);
        }
        else
        {
            return redirect()->back()->with('fails','something wrong..');
        }

        
    }

    // ------- FORGOT PASSWORD -------

    // reset pass to view
    function forgot_password ()
    {
        // go to forgot password view
        return view('password_reset.send_email_reset');
    }

    // resend pass reset view
    function resend ()
    {
        return view('password_reset.resend_reset_mail');
    }

    // reset process
    function reset_process (Request $req)
    {
        // email validation
        $req->validate([
            'email' => 'required | email ',
        ]);

        // Getting user data
        $reset = User::where('email',"=", $req->email)->first();

        //If reset have data
        if ($reset != null)
        {
            // array data included some user data
            $data = [
                'id' => $reset->id,
                'name' => $reset->first_name,
                'verification_code' => $reset->verification_code,
            ];
    

            $user_id = $reset->id;
            // mailer send the email
            Mail::to($req->email)->send(new ResetPassNotification($data));
            return redirect()->route('reset.view')->with(['success' => 'Email reset password has been sent.','id' => $user_id]);
        }
        else
        {
            return redirect()->back()->with('fails','We dont recognize your email.');
        }

    }

    function reset_check ()
    {
        // getting code from url you pass
        $verification_code = \Illuminate\Support\Facades\Request::get('code');

        $reset = User::where(['verification_code' => $verification_code])->first();


        if ($reset != null)
        {
            $reset_id = $reset->id;
            return view('password_reset.change_password',['user_id' => $reset_id]);
        }
        else
        {
            return redirect()->route('reset.view')->with(['fails' => 'Invalid Verification.','id' => $user_id]);
        }
    }

    function update_password (Request $req)
    {   
        $req->validate([
            'password' => 'required | confirmed | min:8 '  
        ]);

        

        $password_update = User::where('id',"=", $req->id)->first();
        $password_update->password = hash::make($req->password);
        $password_update->save();

        if ($password_update)
        {
            return redirect()->route('login')->with('success','Password updated');
        }
        else
        {
            return redirect()->route('login')->with('fails','Something Wrong');
        }
    }

    // resend email reset password
    function resend_resetpass (Request $req)
    {
        $resend = User::where('id',"=", $req->reset_id)->first();

        //If reset have data
        if ($resend != null)
        {
            // array data included some user data
            $data = [
                'id' => $resend->id,
                'name' => $resend->first_name,
                'verification_code' => $resend->verification_code,
            ];
    

            $user_id = $resend->id;
            // mailer send the email
            Mail::to($resend->email)->send(new ResetPassNotification($data));
            return redirect()->route('reset.view')->with(['success' => 'Email reset password has been sent.','id' => $user_id]);
        }
        else
        {
            return redirect()->back()->with('fails','something wrong..');
        }

    }

}
