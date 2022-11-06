<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book_data;
use App\Models\Book_request;
use App\Models\Approve;
use App\Models\Weekly_count;
use DateTime;
use Illuminate\Support\Facades\DB;
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
        // get data and goto dasboard view
        $falls = Approve::where('destination','=', 'falls')->get();
        $fallsGroup = Book_data::where('destination','=', 'falls')->get();
        $tundol = Approve::where('destination','=', 'tundol')->get();
        $tundolGroup = Book_data::where('destination','=', 'tundol')->get();

        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
        $data['falls'] = $falls->count() + $fallsGroup->count();
        $data['tundol'] = $tundol->count() + $tundolGroup->count();

        return view('stuff.dashboard', $data);
    }

    function dashboard_fetch ()
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

    function graph_data ()
    {

        date_default_timezone_set('Asia/Manila');
        $end = "18";
        $now = date('19');

        $acc = User::where('id','=', session('LoggedUser'))->first();

        $current_count = Approve::where('day','=', date('l'))->where('destination','=', $acc->location )->get()->count();
        $day = date('l');

        $final = Weekly_count::where('user_id','=', session('LoggedUser'))->first();

    
        if ($final == null)
        {
            $insert = new Weekly_count;
            $insert->user_id = session('LoggedUser');
            $insert->save();

            $update = Weekly_count::where('user_id','=', session('LoggedUser'))->first();
            $update->$day = $current_count;
            $update->save();

            $data = Weekly_count::where('user_id','=', session('LoggedUser'))->first();


            return response()->json([
                'visit_count'=>$data,
            ]);
        }
        else
        {
            $final->$day = $current_count;
            $final->save();
    
            $data = Weekly_count::where('user_id','=', session('LoggedUser'))->first();
    
            return response()->json([
                'visit_count'=>$data,
            ]);
        }
  
    }


    function check_point ()
    {
        $acc_data = User::where('id','=', session('LoggedUser'))->first();
        // passing multiple variable to view
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['book_list'] =  DB::table('book_requests')->where('destination', '=', $acc_data->location )->get();
        
        return view('stuff.check-point', $data);

    }

    function fetch_checkpoint ()
    {
        $acc_data = User::where('id','=', session('LoggedUser'))->first();

        $checkpoint_list = DB::table('book_requests')->where('destination', '=', $acc_data->location )->get();

        return response()->json([
            'book_list'=>$checkpoint_list,
        ]);
    }

    // viewe delete confirm book request
    function br_view (Request $req)
    {
        //getting all data with booker
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['groups'] = DB::table('book_datas')->where('book_number', '=', $req->id)->get();

        if ($data['groups'])
        {
            return view('stuff.groups-view', $data);
        }
        else
        {
            return back();
        }

    }

    function br_delete (Request $req)
    {
        $delete = DB::table('book_datas')->where('booker_id',$req->id)->delete();
        $delete = DB::table('book_requests')->where('id',$req->id)->delete();

        return back();
    }

    function br_confirm (Request $req)
    {
        date_default_timezone_set('Asia/Manila');
        $time_date  = date('F j, Y g:i:a  ');

        $datetime = DateTime::createFromFormat('YmdHi', '201308131830');

        $confirm = Book_request::where('id','=', $req->id)->first();
        $group = DB::table('book_datas')->where('booker_id', '=', $req->id)->get();
        $groupCount = $group->count();

        // approving request
        $approve = new Approve;
        $approve->booker_id = $confirm->id;
        $approve->user_id = $confirm->user_id;
        $approve->stuff_id = session('LoggedUser');
        $approve->first_name = $confirm->first_name;
        $approve->last_name = $confirm->last_name;
        $approve->destination = $confirm->destination;
        $approve->gender = $confirm->gender;
        $approve->phone = $confirm->phone;
        $approve->email = $confirm->email;
        $approve->address = $confirm->address;
        $approve->book_number = $confirm->book_number;
        $approve->groups = $groupCount;
        $approve->day = date('l');
        $approve->approve_td = $time_date;
        $approve->save();

        $data = User::where('id','=', session('LoggedUser'))->first();

        $visit_count = Approve::where('book_number','=', $confirm->book_number)->where('day','=', $data->location )->get();
        $visit_group = Book_data::where('book_number','=', $confirm->book_number)->where('day','=', $data->location )->get();
        $total = $visit_count->count() + $visit_group->count();

        $insert_count = Map_location ;
        $insert_count->visit_count = $total;
        $insert_count->save();

        // delete the request after approve
        DB::table('book_requests')->where('id',$req->id)->delete();

        return back()->with('success','Approve Successfully');
    }

    //reports generation
    function reports ()
    {
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['approve_list'] = DB::table('book_datas')->where('stuff_id', '=', session('LoggedUser'))->get();
        
        return view('stuff.reports', $data);
    }

}
