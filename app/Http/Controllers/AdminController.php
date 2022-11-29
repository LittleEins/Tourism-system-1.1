<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book_data;
use App\Models\Book_request;
use App\Models\Approve;
use App\Models\Approves_manual;
use App\Models\Weekly_count;
use App\Models\Map_location;
use App\Models\staff_notification;
use App\Models\User_notification;
use App\Models\Admin_notification;
use App\Models\Group_approve;
use App\Models\Group_manual_approve;
use App\Models\Reset_analytic;
use App\Models\staff_alert;
use App\Models\Daily_reset;
use App\Models\Admin_notif;
use Illuminate\Support\Facades\Hash;
use App\Exports\ReportExport;
use App\Exports\GroupExport;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; // udr if you deleting on public 
use Illuminate\Support\Facades\Storage; // use this if you make delete on storage

class AdminController extends Controller
{
    function get_notif_list ()
    {
        $notif = Admin_notif::get();

        return response()->json([
            'list' => $notif,
        ]);
    }
    
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

                $admin = new Admin_notif;
                $admin->sender = $sender->location;
                $admin->message = $req->input('message');
                $admin->type = $req->input('type');
                $admin->time =  date('g:i:a');
                $admin->date =  date('F j, Y');
                $admin->status = "unread";
                $admin->sendto = $req->input('sendto');
                $admin->save();


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

                $admin_notif = new Admin_notif;
                $admin_notif->sender = $sender->location;
                $admin_notif->message = $req->input('message');
                $admin_notif->type = $req->input('type');
                $admin_notif->time =  date('g:i:a');
                $admin_notif->date =  date('F j, Y');
                $admin_notif->status = "unread";
                $admin_notif->sendto = $req->input('sendto');
                $admin_notif->save();



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

                $admin_notif = new Admin_notif;
                $admin_notif->sender = $sender->location;
                $admin_notif->message = $req->input('message');
                $admin_notif->type = $req->input('type');
                $admin_notif->time =  date('g:i:a');
                $admin_notif->date =  date('F j, Y');
                $admin_notif->status = "unread";
                $admin_notif->sendto = $req->input('sendto');
                $admin_notif->save();


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

        $dd = Daily_reset::where('user_id', session('LoggedUser'))->count();

        if ($dd == 0)
        {
            $reset = new Daily_reset;
            $reset->user_id = session('LoggedUser');
            $reset->today = date("Y-m-d", strtotime("today"));
            $reset->tomorrow = date("Y-m-d", strtotime("tomorrow"));
            $reset->save();

            $check_date = Daily_reset::where('user_id',session('LoggedUser'))->first();

            if (($check_date->today == date("Y-m-d", strtotime("today"))) && ($check_date->tomorrow == date("Y-m-d", strtotime("tomorrow"))))
            {
                $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

                $data['location'] = Map_location::where('type','=',"1")->get();
                $data['count'] = Map_location::where('type','=',"1")->get(['name','visit_count'])->count();;

                // analytics resets
                $dateTime = new DateTime('now');
                $monday = clone $dateTime->modify(('Sunday' == $dateTime->format('l')) ? 'Monday last week' : 'Monday this week');
                $sunday = clone $dateTime->modify('Sunday this week');
                $now = date('Y-m-d');
                $start = $monday->format('Y-m-d');
                $end = $sunday->format('Y-m-d');
                // for modification date
                // $end = strtotime("2022-11-01");

                $check_date = Reset_analytic::where('staff', session('LoggedUser'))->first();

                if ($check_date != null)
                {
                    if (strtotime($check_date->start) == strtotime($start))
                    {
                        if (strtotime($now) > strtotime($check_date->end))
                        {
                            //reset analytics
                            DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                            return view('admin.dashboard', $data);
                        }
                        else
                        {
                            return view('admin.dashboard', $data);
                        }
                    }
                    else 
                    {
                        //update start end date
                        $up_date = Reset_analytic::where('staff', session('LoggedUser'))->first();
                        $up_date->start = $start;
                        $up_date->end = $end;
                        $up_date->save();

                        //reset analytics
                        DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                        return view('admin.dashboard', $data);
                    }
                }
                else
                {
                    $td_start_end = new Reset_analytic;
                    $td_start_end->staff = session('LoggedUser');
                    $td_start_end->start = $start;
                    $td_start_end->end = $end;
                    $td_start_end->save();

                    $check_date = Reset_analytic::where('staff', session('LoggedUser'))->first();
                
                    if (strtotime($check_date->start) == $start)
                    {
                        if (strtotime($now) > strtotime($check_date->end))
                        {
                            //reset analytics
                            DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                            return view('admin.dashboard', $data);
                        }
                        else
                        {
                            return view('admin.dashboard', $data);
                        }
                    }
                    else 
                    {
                        //update start end date
                        $up_date = Reset_analytic::where('staff', session('LoggedUser'))->first();
                        $up_date->start = $start;
                        $up_date->end = $end;
                        $up_date->save();

                        //reset analytics
                        DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                        return view('admin.dashboard', $data);
                    }
                }

            }
            else 
            {
                $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
                // resetting count
                DB::table('map_locations')->update(['visit_count'=>'0','total_visit'=>'0']);
                DB::table('book_requests')->delete();
    
                $reset = Daily_reset::where('user_id',session('LoggedUser'))->first();
                $reset->today = date("Y-m-d", strtotime("today"));
                $reset->tomorrow = date("Y-m-d", strtotime("tomorrow"));
                $reset->save();

                $data['location'] = Map_location::where('type','=',"1")->get();
                $data['count'] = Map_location::where('type','=',"1")->get(['name','visit_count'])->count();;

                return $data['location'];
                // analytics resets
                $dateTime = new DateTime('now');
                $monday = clone $dateTime->modify(('Sunday' == $dateTime->format('l')) ? 'Monday last week' : 'Monday this week');
                $sunday = clone $dateTime->modify('Sunday this week');
                $now = date('Y-m-d');
                $start = $monday->format('Y-m-d');
                $end = $sunday->format('Y-m-d');
                // for modification date
                // $end = strtotime("2022-11-01");

                $check_date = Reset_analytic::where('staff', session('LoggedUser'))->first();

                if ($check_date != null)
                {
                    if (strtotime($check_date->start) == strtotime($start))
                    {
                        if (strtotime($now) > strtotime($check_date->end))
                        {
                            //reset analytics
                            DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                            return view('admin.dashboard', $data);
                        }
                        else
                        {
                            return view('admin.dashboard', $data);
                        }
                    }
                    else 
                    {
                        //update start end date
                        $up_date = Reset_analytic::where('staff', session('LoggedUser'))->first();
                        $up_date->start = $start;
                        $up_date->end = $end;
                        $up_date->save();

                        //reset analytics
                        DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                        return view('admin.dashboard', $data);
                    }
                }
                else
                {
                    $td_start_end = new Reset_analytic;
                    $td_start_end->staff = session('LoggedUser');
                    $td_start_end->start = $start;
                    $td_start_end->end = $end;
                    $td_start_end->save();

                    $check_date = Reset_analytic::where('staff', session('LoggedUser'))->first();
                
                    if (strtotime($check_date->start) == $start)
                    {
                        if (strtotime($now) > strtotime($check_date->end))
                        {
                            //reset analytics
                            DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                            return view('admin.dashboard', $data);
                        }
                        else
                        {
                            return view('admin.dashboard', $data);
                        }
                    }
                    else 
                    {
                        //update start end date
                        $up_date = Reset_analytic::where('staff', session('LoggedUser'))->first();
                        $up_date->start = $start;
                        $up_date->end = $end;
                        $up_date->save();

                        //reset analytics
                        DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                        return view('admin.dashboard', $data);
                    }
                }
            }
        }
        else 
        {
            
            $check_date = Daily_reset::where('user_id',session('LoggedUser'))->first();

            if (($check_date->today == date("Y-m-d", strtotime("today"))) && ($check_date->tomorrow == date("Y-m-d", strtotime("tomorrow"))))
            {
                $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

                $data['location'] = Map_location::where('type','=',"1")->get();
                $data['count'] = Map_location::where('type','=',"1")->get(['name','visit_count'])->count();;

                // analytics resets
                $dateTime = new DateTime('now');
                $monday = clone $dateTime->modify(('Sunday' == $dateTime->format('l')) ? 'Monday last week' : 'Monday this week');
                $sunday = clone $dateTime->modify('Sunday this week');
                $now = date('Y-m-d');
                $start = $monday->format('Y-m-d');
                $end = $sunday->format('Y-m-d');
                // for modification date
                // $end = strtotime("2022-11-01");

                $check_date = Reset_analytic::where('staff', session('LoggedUser'))->first();

                if ($check_date != null)
                {
                    if (strtotime($check_date->start) == strtotime($start))
                    {
                        if (strtotime($now) > strtotime($check_date->end))
                        {
                            //reset analytics
                            DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                            return view('admin.dashboard', $data);
                        }
                        else
                        {
                            return view('admin.dashboard', $data);
                        }
                    }
                    else 
                    {
                        //update start end date
                        $up_date = Reset_analytic::where('staff', session('LoggedUser'))->first();
                        $up_date->start = $start;
                        $up_date->end = $end;
                        $up_date->save();

                        //reset analytics
                        DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                        return view('admin.dashboard', $data);
                    }
                }
                else
                {
                    $td_start_end = new Reset_analytic;
                    $td_start_end->staff = session('LoggedUser');
                    $td_start_end->start = $start;
                    $td_start_end->end = $end;
                    $td_start_end->save();

                    $check_date = Reset_analytic::where('staff', session('LoggedUser'))->first();
                
                    if (strtotime($check_date->start) == $start)
                    {
                        if (strtotime($now) > strtotime($check_date->end))
                        {
                            //reset analytics
                            DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                            return view('admin.dashboard', $data);
                        }
                        else
                        {
                            return view('admin.dashboard', $data);
                        }
                    }
                    else 
                    {
                        //update start end date
                        $up_date = Reset_analytic::where('staff', session('LoggedUser'))->first();
                        $up_date->start = $start;
                        $up_date->end = $end;
                        $up_date->save();

                        //reset analytics
                        DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                        return view('admin.dashboard', $data);
                    }
                }

            }
            else 
            {
                $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
                // resetting count
                DB::table('map_locations')->update(['visit_count'=>'0','total_visit'=>'0']);
                DB::table('book_requests')->delete();
    
                $reset = Daily_reset::where('user_id',session('LoggedUser'))->first();
                $reset->today = date("Y-m-d", strtotime("today"));
                $reset->tomorrow = date("Y-m-d", strtotime("tomorrow"));
                $reset->save();

                $data['location'] = Map_location::where('type','=',"1")->get();
                $data['count'] = Map_location::where('type','=',"1")->get(['name','visit_count'])->count();

                // analytics resets
                $dateTime = new DateTime('now');
                $monday = clone $dateTime->modify(('Sunday' == $dateTime->format('l')) ? 'Monday last week' : 'Monday this week');
                $sunday = clone $dateTime->modify('Sunday this week');
                $now = date('Y-m-d');
                $start = $monday->format('Y-m-d');
                $end = $sunday->format('Y-m-d');
                // for modification date
                // $end = strtotime("2022-11-01");

                $check_date = Reset_analytic::where('staff', session('LoggedUser'))->first();

                if ($check_date != null)
                {
                    if (strtotime($check_date->start) == strtotime($start))
                    {
                        if (strtotime($now) > strtotime($check_date->end))
                        {
                            //reset analytics
                            DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                            return view('admin.dashboard', $data);
                        }
                        else
                        {
                            return view('admin.dashboard', $data);
                        }
                    }
                    else 
                    {
                        //update start end date
                        $up_date = Reset_analytic::where('staff', session('LoggedUser'))->first();
                        $up_date->start = $start;
                        $up_date->end = $end;
                        $up_date->save();

                        //reset analytics
                        DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                        return view('admin.dashboard', $data);
                    }
                }
                else
                {
                    $td_start_end = new Reset_analytic;
                    $td_start_end->staff = session('LoggedUser');
                    $td_start_end->start = $start;
                    $td_start_end->end = $end;
                    $td_start_end->save();

                    $check_date = Reset_analytic::where('staff', session('LoggedUser'))->first();
                
                    if (strtotime($check_date->start) == $start)
                    {
                        if (strtotime($now) > strtotime($check_date->end))
                        {
                            //reset analytics
                            DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                            return view('admin.dashboard', $data);
                        }
                        else
                        {
                            return view('admin.dashboard', $data);
                        }
                    }
                    else 
                    {
                        //update start end date
                        $up_date = Reset_analytic::where('staff', session('LoggedUser'))->first();
                        $up_date->start = $start;
                        $up_date->end = $end;
                        $up_date->save();

                        //reset analytics
                        DB::table('weekly_counts')->update(['Monday'=>null,'Tuesday'=>null,'Wednesday'=>null,'Thursday'=>null,'Friday'=>null,'Saturday'=>null,'Sunday'=>null]);
                            
                        return view('admin.dashboard', $data);
                    }
                }

            }
        }
    }

    function alert ()
    {
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['staff'] = Map_location::where('type',1)->get(['name']);

        
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
        $list = Map_location::where('link', null)->where('type',1)->get();


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
         //get all data
         $ap = Approve::get();
         $m_ap = Approves_manual::get();

         // merging object
         $data['lists'] = $ap->merge($m_ap);

        $data['locations'] = Map_location::where('type',1)->get();

        return view('admin.reports', $data);
    }

    // download report
    public function export(Request $req) 
    {
        $location = $req->location;
        $start = $req->start;
        $end = $req->end;


        if (($req->start === null) && ($req->end == null) && ($location == null) || ($location == "all"))
        {
            dd("all or null");
            return Excel::download(new GroupExport(), 'reports.xlsx');
        }
        else 
        {
            dd("with range ");
            return Excel::download(new GroupExport($location,$start,$end), 'reports.xlsx');
        }
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

        if ((strtolower($req->locations) == "all") && ($req->from === null) && ($req->end === null))
        {
            $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
            $data['locations'] = Map_location::where('type',1)->get();

            $startDate = $req->from;
            $endDate = $req->end;
            $location = strtolower($req->locations);
    
                //get all data
            $ap = Approve::get();
            $m_ap = Approves_manual::get();

            // merging object
            $data['lists'] = $ap->merge($m_ap);

            Session::flash('start', $startDate);
            Session::flash('end', $endDate);
            Session::flash('location', $location);
    
            return view('admin.reports', $data);
        }
        else if ((strtolower($req->locations) == "all") && ($req->from != null) && ($req->end != null))
        {
            $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
            $data['locations'] = Map_location::where('type',1)->get();

            $startDate = $req->from;
            $endDate = $req->end;
            $location = strtolower($req->locations);
    
                //get all data
            $ap = Approve::whereBetween('ap_date',[$startDate,$endDate])->get();
            $m_ap = Approves_manual::whereBetween('ap_date',[$startDate,$endDate])->get();

            // merging object
            $data['lists'] = $ap->merge($m_ap);

            Session::flash('start', $startDate);
            Session::flash('end', $endDate);
            Session::flash('location', $location);
    
            return view('admin.reports', $data);
        }
       else
       {
            if (($req->from === null) && ($req->end === null))
            {
                $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()]; 
                $data['locations'] = Map_location::where('type',1)->get();
    
                $startDate = $req->from;
                $endDate = $req->end;
                $location = strtolower($req->locations);
    
                //get all data
                $ap = Approve::where('destination',ucfirst($location))->get();
                $m_ap = Approves_manual::where('destination',ucfirst($location))->get();
    
                // merging object
                $data['lists'] = $ap->merge($m_ap);
               
           
                $data['date_range'] = ['start'=>$startDate,'end'=>$endDate];
    
                Session::flash('start', $startDate);
                Session::flash('end', $endDate);
                Session::flash('location', $location);
    
                return view('admin.reports', $data)->with('success','Book Successfully.');
            }
            else 
            {
                $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()]; 
                $data['locations'] = Map_location::where('type',1)->get();
    
                $startDate = $req->from;
                $endDate = $req->end;
                $location = strtolower($req->locations);
    
                //get all data
                $ap = Approve::where('destination',ucfirst($location))->whereBetween('ap_date',[$startDate,$endDate])->get();
                $m_ap = Approves_manual::where('destination',ucfirst($location))->whereBetween('ap_date',[$startDate,$endDate])->get();
    
                // merging object
                $data['lists'] = $ap->merge($m_ap);
               
           
                $data['date_range'] = ['start'=>$startDate,'end'=>$endDate];
    
                Session::flash('start', $startDate);
                Session::flash('end', $endDate);
                Session::flash('location', $location);
    
                return view('admin.reports', $data)->with('success','Book Successfully.');
            }
        }
    }

}
