<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book_data;
use App\Models\Book_request;
use App\Models\Approve;
use App\Models\Weekly_count;
use App\Models\Map_location;
use App\Models\Stuff_notification;
use App\Models\User_notification;
use App\Models\Admin_notif;
use App\Models\Group_approve;
use App\Models\Reset_analytic;
use App\Models\Stuff_alert;
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
            if ($req->input('sendto') == "all_stuffs")
            {
              
                $sender = User::where('id', session('LoggedUser'))->first();

                $stuff_notif = new Stuff_alert;
                $stuff_notif->sender = $sender->location;
                $stuff_notif->message = $req->input('message');
                $stuff_notif->type = $req->input('type');
                $stuff_notif->time =  date('g:i:a');
                $stuff_notif->date =  date('F j, Y');
                $stuff_notif->status = "unread";
                $stuff_notif->sendto = $req->input('sendto');
                $stuff_notif->save();

                $stuff_notif = new Admin_notif;
                $stuff_notif->sender = $sender->location;
                $stuff_notif->message = $req->input('message');
                $stuff_notif->type = $req->input('type');
                $stuff_notif->time =  date('g:i:a');
                $stuff_notif->date =  date('F j, Y');
                $stuff_notif->status = "unread";
                $stuff_notif->sendto = $req->input('sendto');
                $stuff_notif->save();


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

                $stuff_notif = new Stuff_alert;
                $stuff_notif->sender = $sender->location;
                $stuff_notif->message = $req->input('message');
                $stuff_notif->type = $req->input('type');
                $stuff_notif->time =  date('g:i:a');
                $stuff_notif->date =  date('F j, Y');
                $stuff_notif->status = "unread";
                $stuff_notif->sendto = $req->input('sendto');
                $stuff_notif->save();

                $stuff_notif = new Admin_notif;
                $stuff_notif->sender = $sender->location;
                $stuff_notif->message = $req->input('message');
                $stuff_notif->type = $req->input('type');
                $stuff_notif->time =  date('g:i:a');
                $stuff_notif->date =  date('F j, Y');
                $stuff_notif->status = "unread";
                $stuff_notif->sendto = $req->input('sendto');
                $stuff_notif->save();



                return response()->json([
                    'status'=>200,
                    'success'=>'Notification sent',
                ]);
            }
            else
            {
                $sender = User::where('id', session('LoggedUser'))->first();

                $stuff_notif = new Stuff_alert;
                $stuff_notif->sender = $sender->location;
                $stuff_notif->message = $req->input('message');
                $stuff_notif->type = $req->input('type');
                $stuff_notif->time =  date('g:i:a');
                $stuff_notif->date =  date('F j, Y');
                $stuff_notif->status = "unread";
                $stuff_notif->sendto = $req->input('sendto');
                $stuff_notif->save();

                $stuff_notif = new Admin_notif;
                $stuff_notif->sender = $sender->location;
                $stuff_notif->message = $req->input('message');
                $stuff_notif->type = $req->input('type');
                $stuff_notif->time =  date('g:i:a');
                $stuff_notif->date =  date('F j, Y');
                $stuff_notif->status = "unread";
                $stuff_notif->sendto = $req->input('sendto');
                $stuff_notif->save();


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
        $data['stuff'] = Map_location::get(['name']);
        
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
        $data['stuff'] = Map_location::get(['name']);

        
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
        $data = Map_location::get(['id','name', 'latitude','longitude']);

        return response()->json([
            'locations' => $data,
        ]); 
    }

    function add_location (Request $req)
    {

        // validator
        $validate = \Validator::make($req->all(), [
            'name' => 'required|max:255',
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
            $add_location = new Map_location;
            $add_location->name = $req->input('name');
            $add_location->latitude = $req->input('latitude');
            $add_location->longitude = $req->input('longitude');
            $add_location->save();
            

            return response()->json([
                'status'=>200,
                'success'=>'Location added successfully',
            ]);
        }

      
    }


    function delete_location (Request $req)
    {
        $delete = Map_location::where('id','=', $req->id)->delete();
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('admin.add_map_location', $data);
    }
}
