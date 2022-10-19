<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import User Model
use App\Models\User;
use App\Models\Book_request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; // use this if you make delete on storage

class UserController extends Controller
{

    function profile ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('user.profile', $data);
        
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
                'gender' => 'required'
            ]);

            // profile info and file storation

            if ($req->file('profile') == null )
            {
                
                $profile_update->first_name = $req->first_name;
                $profile_update->last_name = $req->last_name;
                $profile_update->email = $req->email;
                $profile_update->phone = $req->phone;
                $profile_update->address = $req->address;
                $profile_update->gender = $req->gender;
                $profile_update->save();

                return redirect()->route('profileUser.view')->with('success','Update Successfully');
            }
            else
            {
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
                $profile_update->gender = $req->gender;
                $profile_update->save();

                return redirect()->route('profileUser.view')->with('success','Update Successfully');
            }
 
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

            if ($req->file('profile') != null)
            {
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
                        $profile_update->gender = $req->gender;
                        $profile_update->save();

                        return redirect()->route('profileUser.view')->with('success','Update Successfully');
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
                    $profile_update->gender = $req->gender;
                    $profile_update->save();

                    return redirect()->route('profileUser.view')->with('success','Update Successfully');
                }
            }
            else
            {
                $profile_update->first_name = $req->first_name;
                $profile_update->last_name = $req->last_name;
                $profile_update->email = $req->email;
                $profile_update->phone = $req->phone;
                $profile_update->address = $req->address;
                $profile_update->gender = $req->gender;
                $profile_update->save();

                return redirect()->route('profileUser.view')->with('success','Update Successfully');
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

                return redirect()->route('profileUser.view')->with('success','Profile Updated');
            }
            else
            {
                return back();
            }
        }
        else
        {
            return back();
        }
    }


    function dashboard ()
    {

        // get data and goto dasboard view
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('user.dashboard', $data);
    }

    function map ()
    {
        // get data and goto map view
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('user.map', $data);
    }

    function book ()
    {
        // get data and goto book view
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('user.booking', $data);
    }

    function book2 (Request $req)
    {
        // get data and goto book2 view
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        if (($req->gender == null) || ($req->first_name == null) || ($req->last_name == null) || ($req->phone == null) || ($req->email == null) || ($req->address == null))
        {
            return back()->with('fails','You need to complete your profile info.');
        } 
        else 
        {
            return view('user.booking2', $data);
        }
    }

    // insert booker data
    function book_data (Request $req)
    {
                  
        date_default_timezone_set('Asia/Manila');
        $time_date  = date('F j, Y g:i:a  ');

        if ($req->group_book != null)
        {
            $book_number = random_int(100000, 999999);

            $data = User::where('id','=', session('LoggedUser'))->first();
            $insert_request = new Book_request;
            $insert_request->user_id = $data->id;
            $insert_request->first_name = $data->first_name;
            $insert_request->last_name = $data->last_name;
            $insert_request->phone = $data->phone;
            $insert_request->email = $data->email;
            $insert_request->gender = $data->gender;
            $insert_request->address = $data->address;
            $insert_request->destination = $req->destination;
            $insert_request->time_date = $time_date;
            $insert_request->book_number = $book_number;
            $insert_request->save();

            $book_id = Book_request::where('book_number','=', $book_number)->first();

            $booker_id = $book_id->id;
            $first_name = $req->first_name;
            $last_name = $req->last_name;
            $gender = $req->gender;
            $destination = $req->destination;
            $phone = $req->contact;
            $address = $req->address;

            for ($i=0; $i < count($first_name); $i++)
            {
                $datasave = [
                    'booker_id'   =>$booker_id,
                    'first_name' =>$first_name[$i],
                    'last_name' =>$last_name[$i],
                    'gender' =>$gender[$i],
                    'destination' =>$destination[$i],
                    'phone' =>$phone[$i],
                    'address' =>$address[$i],
                    'time_date' =>$time_date[$i],
                ];

                DB::table('book_datas')->insert($datasave);
        
            }

            $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

            return view('user.book_result', $data,['book'=>$book_number])->with('success','Book Successfully.');
        }
        else
        {
            $book_number = random_int(100000, 999999);

            $data = User::where('id','=', session('LoggedUser'))->first();
            $insert_request = new Book_request;
            $insert_request->user_id = $data->id;
            $insert_request->first_name = $data->first_name;
            $insert_request->last_name = $data->last_name;
            $insert_request->phone = $data->phone;
            $insert_request->email = $data->email;
            $insert_request->gender = $data->gender;
            $insert_request->address = $data->address;
            $insert_request->destination = $req->destination;
            $insert_request->time_date = $time_date;
            $insert_request->book_number = $book_number;
            $insert_request->save();

            $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
            return view('user.book_result', $data,['book'=>$book_number])->with('success','Book Successfully.');
        }

    }
}
