<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book_data;
use App\Models\Book_request;
use App\Models\Approve;
use App\Models\Weekly_count;
use App\Models\Map_location;
use App\Models\staff_notification;
use App\Models\User_notification;
use App\Models\Admin_notif;
use App\Models\Group_approve;
use App\Models\Reset_analytic;
use App\Models\staff_alert;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; // udr if you deleting on public 
use Illuminate\Support\Facades\Storage; // use this if you make delete on storage

class AdminController extends Controller
{
    
    function send_notification (Request $req)
    {
        date_default_timezone_set('Asia/Manila');

        // validator
        $validate = \Validator::make($req->all(), [
            'type' => 'required',
            'sendto' => 'required',
            'message' => 'required|max:500',
        ]);

        if ($validate->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validate->messages(),
            ]);
        }
        else
        { 
            if ($req->input('sendto') == "all_staffs")
            {
              
                $sender = User::where('id', session('LoggedUser'))->first();

                $staff_notif = new staff_alert;
                $staff_notif->sender = $sender->location;
                $staff_notif->message = $req->input('message');
                $staff_notif->type = $req->input('type');
                $staff_notif->time =  date('g:i:a');
                $staff_notif->date =  date('F j, Y');
                $staff_notif->status = "unread";
                $staff_notif->sendto = $req->input('sendto');
                $staff_notif->save();

                $staff_notif = new Admin_notif;
                $staff_notif->sender = $sender->location;
                $staff_notif->message = $req->input('message');
                $staff_notif->type = $req->input('type');
                $staff_notif->time =  date('g:i:a');
                $staff_notif->date =  date('F j, Y');
                $staff_notif->status = "unread";
                $staff_notif->sendto = $req->input('sendto');
                $staff_notif->save();


                return response()->json([
                    'status'=>200,
                    'success'=>'Notification sent',
                ]);
            }
            else if ($req->input('sendto') == "all_users")
            {
                $sender = User::where('id', session('LoggedUser'))->first();

                $user_notification = new User_notification;
                $user_notification->creator_id = $sender->location;
                $user_notification->message = $req->input('message');
                $user_notification->type = $req->input('type');
                $user_notification->time =  date('g:i:a');
                $user_notification->date =  date('F j, Y');
                $user_notification->status = "unread";
                $user_notification->save();

                $staff_notif = new staff_alert;
                $staff_notif->sender = $sender->location;
                $staff_notif->message = $req->input('message');
                $staff_notif->type = $req->input('type');
                $staff_notif->time =  date('g:i:a');
                $staff_notif->date =  date('F j, Y');
                $staff_notif->status = "unread";
                $staff_notif->sendto = $req->input('sendto');
                $staff_notif->save();

                $staff_notif = new Admin_notif;
                $staff_notif->sender = $sender->location;
                $staff_notif->message = $req->input('message');
                $staff_notif->type = $req->input('type');
                $staff_notif->time =  date('g:i:a');
                $staff_notif->date =  date('F j, Y');
                $staff_notif->status = "unread";
                $staff_notif->sendto = $req->input('sendto');
                $staff_notif->save();



                return response()->json([
                    'status'=>200,
                    'success'=>'Notification sent',
                ]);
            }
            else
            {
                $sender = User::where('id', session('LoggedUser'))->first();

                $staff_notif = new staff_alert;
                $staff_notif->sender = $sender->location;
                $staff_notif->message = $req->input('message');
                $staff_notif->type = $req->input('type');
                $staff_notif->time =  date('g:i:a');
                $staff_notif->date =  date('F j, Y');
                $staff_notif->status = "unread";
                $staff_notif->sendto = $req->input('sendto');
                $staff_notif->save();

                $staff_notif = new Admin_notif;
                $staff_notif->sender = $sender->location;
                $staff_notif->message = $req->input('message');
                $staff_notif->type = $req->input('type');
                $staff_notif->time =  date('g:i:a');
                $staff_notif->date =  date('F j, Y');
                $staff_notif->status = "unread";
                $staff_notif->sendto = $req->input('sendto');
                $staff_notif->save();


                return response()->json([
                    'status'=>200,
                    'success'=>'Notification sent',
                ]);
            }
        }

      
    }

    function notif_log ()
    {
        $acc = User::where('id','=', session('LoggedUser'))->first();
        $admin   = Admin_notif::get();

        return response()->json([
            'notification'=>$admin,
        ]);
    }

    function notifications ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('user.alert', $data);
    }

    function delete_notif (Request $req)
    {
        DB::table('admin_notifs')->where('id',$req->id)->delete();
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['staff'] = Map_location::get(['name']);
        
        return view('admin.alert', $data);
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

        return view('admin.dashboard', $data);

    }

    function alert ()
    {
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['staff'] = Map_location::get(['name']);

        
        return view('admin.alert', $data);
    }


    function add_map_location ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
        
        $data['map_data'] = Map_location::get(['id','name', 'latitude','longitude']);

        return view('admin.add_map_location', $data);
    }

    function map_location_fetch ()
    {
        $data = Map_location::get(['id','name', 'latitude','longitude','type']);

        return response()->json([
            'locations' => $data,
        ]); 
    }

    function add_location (Request $req)
    {

        // validator
        $validate = \Validator::make($req->all(), [
            'name' => 'required|max:255 | unique:map_locations',
            'latitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],    
            'longitude' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
        ]);

        if ($validate->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validate->messages(),
            ]);
        }
        else
        { 
            if ($req->input('pin_type') == 'true')
            {
                $add_location = new Map_location;
                $add_location->name = ucfirst($req->input('name'));
                $add_location->latitude = $req->input('latitude');
                $add_location->longitude = $req->input('longitude');
                $add_location->visit_count = "0";
                $add_location->link = "1";
                $add_location->type = 0;
                $add_location->save();
                
    
                return response()->json([
                    'status'=>200,
                    'success'=>'Location added successfully',
                ]);
            }
            else
            {
                $add_location = new Map_location;
                $add_location->name = ucfirst($req->input('name'));
                $add_location->latitude = $req->input('latitude');
                $add_location->longitude = $req->input('longitude');
                $add_location->visit_count = "0";
                $add_location->type = 1;
                $add_location->save();
                
    
                return response()->json([
                    'status'=>200,
                    'success'=>'Location added successfully',
                ]);
            }
        }

      
    }


    function delete_location (Request $req)
    {
        $delete = Map_location::where('id','=', $req->id)->delete();
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('admin.add_map_location', $data);
    }

    function fetch_account ()
    {
        $accounts = User::where('role','=','1')->get();

        return response()->json([
            'accounts' => $accounts,
        ]);
    }

    function create_staff ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
        $data['locations'] = Map_location::where('link', null)->where('type',1)->get();

        return view('admin.create_staff', $data);
    }

    function fetch_location_link ()
    {
        // $list = Map_location::where('type',)->get();

        return response()->json([
            'list' => $list,
        ]);
    }

    function create_staff_account (Request $req)
    {
        // validator
        $validate = \Validator::make($req->all(), [
            'admin_type' => 'required',
            'admin_password' => 'required | min: 8',
        ]);

        if ($validate->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validate->messages(),
            ]);
        }
        else
        { 
            // Insert Data to DB
            $data = new User;
            $data->first_name = ucfirst($req->input('admin_type'));
            $data->last_name = "CheckPoint";
            $data->email = strtolower($req->input('admin_type')."@gmail.com");
            $data->phone = "09913183407";
            $data->img_name = "default-profile.png";
            $data->otp = "515151";
            $data->password = hash::make($req->password);
            $data->verification_code = "5555";
            $data->role = '1';
            $data->location = strtolower($req->input('admin_type'));
            $data->save();

            $location = Map_location::get();
            $count = Map_location::get()->count();
            
            for ($i = 0; $i < $count; $i++)
            {
                if (strtolower($req->input('admin_type')) == strtolower($location[$i]['name']))
                {
                    $update = Map_location::where('name','=',$req->input('admin_type'))->first();
                    $update->link = "1";
                    $update->save();

                    break;
                }
            }

            return response()->json([
                'status'=>200,
                'success'=>"Account has been created!",
            ]);

        }
    }

    function edit_staff_account (Request $req)
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
        $data['info'] = User::where('id',$req->id)->first();

        return view('admin.change_pass', $data);
    }

    function delete_staff_account (Request $req)
    {
        $info = User::where('id',$req->id)->first();

        $location = Map_location::get(['name']);
        $count = Map_location::get()->count();
        
        for ($i = 0; $i < $count; $i++)
        {
            if (strtolower($info['location']) == strtolower($location[$i]['name']))
            {
                $update = Map_location::where('name',ucfirst($location[$i]['name']))->first();
                $update->link = null;
                $t = $update->save();

                break;
            }
        }

        $user = User::where('id',$req->id)->delete();

        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return back();
    }

    function staff_update_pass (Request $req)
    {
            // signup Validation
        $req->validate([
            'password' => 'required | min: 8',
        ]);

        $update_pass = User::where('id','=',$req->id)->first();
        $update_pass->password = hash::make($req->password);
        $update_pass->save();

        return back()->with('success',"Update Password Successfully!");
    }

    function report_gen ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
        $data['lists'] = Approve::paginate(10);
        $data['locations'] = Map_location::get();

        return view('admin.reports', $data);
    }

    function records_group_view (Request $req)
    {
        //getting all data with booker
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['groups'] = Group_approve::where('book_number', '=', $req->id)->paginate(10);

        if ($data['groups']->isNotEmpty())
        {
            return view('admin.log-view', $data);
        }
        else
        {
            return back();
        }

    }

    function search_report (Request $req)
    {

        if (strtolower($req->locations) == "all")
        {
            $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
            $data['locations'] = Map_location::get();

            $startDate = $req->from;
            $endDate = $req->end;
    
            //sql raw command query
            $data['lists'] =  DB::select("SELECT * FROM approves
            WHERE ap_date >= ? AND ap_date <= ?",[$startDate,$endDate]);
    
            return view('admin.reports', $data);
        }
       else
       {
            $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
            $data['locations'] = Map_location::get();

            $startDate = $req->from;
            $endDate = $req->end;
            $location = strtolower($req->locations);

            //sql raw command query
            $data['lists'] =  DB::select('SELECT * FROM approves WHERE destination = ? AND ap_date >= ? AND ap_date <= ?',[$location,$startDate,$endDate]);
       
            return view('admin.reports', $data);
        }
    }

}
