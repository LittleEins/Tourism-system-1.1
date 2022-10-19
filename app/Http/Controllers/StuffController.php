<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book_data;
use App\Models\Book_request;
use Illuminate\Support\Facades\File; // udr if you deleting on public 
use Illuminate\Support\Facades\Storage; // use this if you make delete on storage

class StuffController extends Controller
{
    function profile ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('stuff.profile', $data);
        
    }

    function profile_update (Request $req)
    {

        $profile_update = User::where('id','=', session('LoggedUser'))->first();

        if ($profile_update->email != $req->email) {

            $req->validate([
                'first_name' => 'required | min: 2',
                'last_name' => 'required | min: 2',
                'phone' => 'required | min: 11',
                'email' => 'required | email | unique:users',
                'profile' => 'image|mimes:jpg,png',
            ]);

            // profile info and file storation
            $size = $req->file('profile')->getSize();
            $name = $req->file('profile')->getClientOriginalName();
            $req->file('profile')->storeAs('public/img/', $name);

            $profile_update->first_name = $req->first_name;
            $profile_update->last_name = $req->last_name;
            $profile_update->email = $req->email;
            $profile_update->phone = $req->phone;
            $profile_update->address = $req->address;
            $profile_update->img_name = $name;
            $profile_update->img_size = $size;
            $profile_update->save();

            return redirect()->route('profileStuff.view')->with('success','Update Successfully');
 
        }
        else 
        {
            $req->validate([
                'first_name' => 'required | min: 2',
                'last_name' => 'required | min: 2',
                'phone' => 'required | min: 11',
                'profile' => 'image|mimes:jpg,png',
            ]);


            // profile info and file storation
            $size = $req->file('profile')->getSize();
            $name = $req->file('profile')->getClientOriginalName();
            $req->file('profile')->storeAs('public/img/', $name);

            if ($profile_update->img_name != 'default-profile.png')
            {
                // delete profile
                if (Storage::exists('public/img/'.$profile_update->img_name))
                {
                    Storage::delete('public/img/'.$profile_update->img_name);
                    $profile_update->first_name = $req->first_name;
                    $profile_update->last_name = $req->last_name;
                    $profile_update->email = $req->email;
                    $profile_update->phone = $req->phone;
                    $profile_update->address = $req->address;
                    $profile_update->img_name = $name;
                    $profile_update->img_size = $size;
                    $profile_update->save();

                    return redirect()->route('profileStuff.view')->with('success','Update Successfully');
                }
                else
                {
                    return back();
                }
            }
            else
            {
                $profile_update->first_name = $req->first_name;
                $profile_update->last_name = $req->last_name;
                $profile_update->email = $req->email;
                $profile_update->phone = $req->phone;
                $profile_update->address = $req->address;
                $profile_update->img_name = $name;
                $profile_update->img_size = $size;
                $profile_update->save();

                return redirect()->route('profileStuff.view')->with('success','Update Successfully');
            }
        }
    }

    function delete_profile ()
    {
        $profile_delete = User::where('id','=', session('LoggedUser'))->first();
        
        if ($profile_delete->img_name != 'default-profile.png')
        {
            // delete profile
            if (Storage::exists('public/img/'.$profile_delete->img_name))
            {
                Storage::delete('public/img/'.$profile_delete->img_name);
                $profile_delete->img_name = 'default-profile.png';
                $profile_delete->save();

                return redirect()->route('profileStuff.view')->with('success','Profile Updated');
            }
            else
            {
                $profile_delete->img_name = 'default-profile.png';
                $profile_delete->save();

                return redirect()->route('profileStuff.view')->with('success','Profile Updated');
            }
        }
        else
        {
            return back();
        }
    }

    function dashboard ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('stuff.dashboard', $data);
    }

    function check_point ()
    {
        // passing multiple variable to view
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['book_list'] = Book_request::all();
        
        return view('stuff.check-point', $data);

    }

}
