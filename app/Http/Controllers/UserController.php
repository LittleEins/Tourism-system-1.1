<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import User Model
use App\Models\Approve;
use App\Models\User;
use App\Models\Book_request;
use App\Models\Book_data;
use App\Models\Map_location;
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
        date_default_timezone_set('Asia/Manila');
        $end = "18";
        $now = date('H');
        $day = date('l');
        $date  = date('F j, Y');

        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
        $location = Map_location::get(['name','visit_count','date']);
        $count = Map_location::get(['name','visit_count'])->count();

    
        // resetting count 
        for ($i = 0; $i < $count; $i++)
        {
            if ((strtolower($date) != strtolower($location[$i]->date)) && (strtolower($location[$i]->date != null)))
            {   
                DB::table('map_locations')->update(['visit_count'=>'0']);

            }   
        }

        $data['location'] = Map_location::get(['name','visit_count']);
        $data['count'] = Map_location::get(['name','visit_count'])->count();
        
        return view('user.dashboard', $data);
    }

    function dashboard_fetch ()
    {
    
        $data = Map_location::get(['name','visit_count']);
        $count = Map_location::get(['name','visit_count'])->count();

        return response()->json([
            'data' => $data,
            'count' => $count,
        ]);

    }

    function map ()
    {
 
        $falls = Approve::where('destination','=', 'falls')->where('day','=', date('l'))->get();
        $fallsGroup = Book_data::where('destination','=', 'falls')->where('day','=', date('l'))->get();
        $tundol = Approve::where('destination','=', 'tundol')->where('day','=', date('l'))->get();
        $tundolGroup = Book_data::where('destination','=', 'tundol')->where('day','=', date('l'))->get();

        $totalfalls = $falls->count() + $fallsGroup->count();
        $totaltundol = $tundol->count(); + $tundolGroup->count();

        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
        $data['falls_count'] = $totalfalls;
        $data['tundol_count'] = $totaltundol;

        return view('user.map', $data);
    }

    function map_locations ()
    {
        $locations = Map_location::get(['id','name', 'latitude','longitude','visit_count']);

        return response()->json([
            'locations' => $locations,
        ]);
    }

    function fetch_visit ()
    {
       
        $falls = Approve::where('destination','=', 'falls')->get();
        $fallsGroup = Book_data::where('destination','=', 'falls')->get();
        $tundol = Approve::where('destination','=', 'tundol')->get();
        $tundolGroup = Book_data::where('destination','=', 'tundol')->get();

        return response()->json([
            'falls' => $falls->count() + $fallsGroup->count(),
            'tundol' =>$tundol->count() + $tundolGroup->count(),
            'patar' =>$tundol->count() + $tundolGroup->count(),
        ]);
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
            $book_exist = Book_request::where('user_id','=', session('LoggedUser'))->first();

            if ($book_exist != null)
            {
                return back()->with('fails','You have already booked');
            } 
            else 
            {
                $falls = Approve::where('destination','=', 'falls')->get();
                $fallsGroup = Book_data::where('destination','=', 'falls')->get();
                $tundol = Approve::where('destination','=', 'tundol')->get();
                $tundolGroup = Book_data::where('destination','=', 'tundol')->get();
        
                $totalfalls = $falls->count() + $fallsGroup->count();
                $totaltundol = $tundol->count(); + $tundolGroup->count();
        
                $data['falls_count'] = $totalfalls;
                $data['tundol_count'] = $totaltundol;

                return view('user.booking2', $data);
            }

        }
    }

    function book2_count ()
    {
        $falls = Approve::where('destination','=', 'falls')->get();
        $fallsGroup = Book_data::where('destination','=', 'falls')->get();
        $tundol = Approve::where('destination','=', 'tundol')->get();
        $tundolGroup = Book_data::where('destination','=', 'tundol')->get();

        return response()->json([
            'falls'=> $falls->count() + $fallsGroup->count(),
            'tundol'=> $tundol->count() + $tundolGroup->count(),
        ]);
    }

    // insert booker data
    function book_data (Request $req)
    {
                  
        date_default_timezone_set('Asia/Manila');
        $time_date  = date('F j, Y g:i:a  ');

        if ($req->group_book != null)
        {
            $book_number = random_int(100000, 999999);

            $req->session()->put('book_number', $book_number);

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


            if ($req->phone == null)
                {
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
                        'destination' =>$destination,
                        'address' =>$address[$i],
                        'book_number'=>$book_number,
                        'time_date' =>$time_date,
                    ];

                    DB::table('book_datas')->insert($datasave);
            
                }

                $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
                $group = DB::table('book_datas')->where('book_number', '=', $book_number)->get();
                $groupCount = $group->count();
                $data['book_number'] = $book_number;
            
                DB::table('book_requests')->where('book_number', $book_number)->update(['groups' => $groupCount]);

                return view('user.book_result', $data)->with('success','Book Successfully.');
            }
            else 
            {
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
                        'destination' =>$destination,
                        'phone' =>$phone[$i],
                        'address' =>$address[$i],
                        'time_date' =>$time_date,
                    ];

                    DB::table('book_datas')->insert($datasave);
            
                }

                $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
                $group = DB::table('book_datas')->where('book_number', '=', $book_number)->get();
                $groupCount = $group->count();
            
                DB::table('book_requests')->where('book_number', $book_number)->update(['groups' => $groupCount]);

                return view('user.book_result', $data,['book'=>$book_number])->with('success','Book Successfully.');
            }

            
        }
        else
        {
            $book_number = random_int(100000, 999999);

            $req->session()->put('book_number', $book_number);

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
            $insert_request->groups = 'solo';
            $insert_request->save();

            $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
            return view('user.book_result', $data,['book_number'=>$book_number])->with('success','Book Successfully.');
        }

    }

    function book_log ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
        $data['list'] = Book_request::where('user_id','=', session('LoggedUser'))->first();

        return view('user.book_log', $data);
        
    }

    // log
    function log_view (Request $req)
    {
        //getting all data with booker
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['groups'] = DB::table('book_datas')->where('book_number', '=', $req->id)->get();

        if ($data['groups']->isNotEmpty())
        {
            return view('user.groups-view', $data);
        }
        else
        {
            return back();
        }

    }

    function log_delete (Request $req)
    {
        $delete = DB::table('book_datas')->where('booker_id',$req->id)->delete();
        $delete = DB::table('book_requests')->where('id',$req->id)->delete();

        return back();
    }

    function records ()
    {
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['lists'] = DB::table('approves')->where('user_id', '=', session('LoggedUser'))->get();

        return view('user.history', $data);
    }

    function records_group_view (Request $req)
    {
        //getting all data with booker
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['groups'] = DB::table('book_datas')->where('book_number', '=', $req->id)->get();

        if ($data['groups']->isNotEmpty())
        {
            return view('user.log-view', $data);
        }
        else
        {
            return back();
        }

    }

}
