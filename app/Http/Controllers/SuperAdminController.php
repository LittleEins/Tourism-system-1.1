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
use App\Models\Admin_notification;
use App\Models\Group_approve;
use App\Models\Reset_analytic;
use App\Models\staff_alert;
use App\Models\Daily_reset;
use Illuminate\Support\Facades\Hash;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; // udr if you deleting on public 
use Illuminate\Support\Facades\Storage; // use this if you make delete on storage

class SuperAdminController extends Controller
{
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

                $data['location'] = Map_location::where('type','=',"1")->get(['name','visit_count']);
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
                            
                            return view('super_admin.dashboard', $data);
                        }
                        else
                        {
                            return view('super_admin.dashboard', $data);
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
                            
                        return view('super_admin.dashboard', $data);
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
                            
                            return view('super_admin.dashboard', $data);
                        }
                        else
                        {
                            return view('super_admin.dashboard', $data);
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
                            
                        return view('super_admin.dashboard', $data);
                    }
        }

            }
            else 
            {
                $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
                // resetting count
                DB::table('map_locations')->update(['visit_count'=>'0']);
                DB::table('book_requests')->delete();
    
                $reset = Daily_reset::where('user_id',session('LoggedUser'))->first();
                $reset->today = date("Y-m-d", strtotime("today"));
                $reset->tomorrow = date("Y-m-d", strtotime("tomorrow"));
                $reset->save();

                $data['location'] = Map_location::where('type','=',"1")->get(['name','visit_count']);
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
                            
                            return view('super_admin.dashboard', $data);
                        }
                        else
                        {
                            return view('super_admin.dashboard', $data);
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
                            
                        return view('super_admin.dashboard', $data);
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
                            
                            return view('super_admin.dashboard', $data);
                        }
                        else
                        {
                            return view('super_admin.dashboard', $data);
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
                            
                        return view('super_admin.dashboard', $data);
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

                $data['location'] = Map_location::where('type','=',"1")->get(['name','visit_count']);
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
                            
                            return view('super_admin.dashboard', $data);
                        }
                        else
                        {
                            return view('super_admin.dashboard', $data);
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
                            
                        return view('super_admin.dashboard', $data);
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
                            
                            return view('super_admin.dashboard', $data);
                        }
                        else
                        {
                            return view('super_admin.dashboard', $data);
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
                            
                        return view('super_admin.dashboard', $data);
                    }
        }

            }
            else 
            {
                $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
                // resetting count
                DB::table('map_locations')->update(['visit_count'=>'0']);
                DB::table('book_requests')->delete();
    
                $reset = Daily_reset::where('user_id',session('LoggedUser'))->first();
                $reset->today = date("Y-m-d", strtotime("today"));
                $reset->tomorrow = date("Y-m-d", strtotime("tomorrow"));
                $reset->save();

                $data['location'] = Map_location::where('type','=',"1")->get(['name','visit_count']);
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
                            
                            return view('super_admin.dashboard', $data);
                        }
                        else
                        {
                            return view('super_admin.dashboard', $data);
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
                            
                        return view('super_admin.dashboard', $data);
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
                            
                            return view('super_admin.dashboard', $data);
                        }
                        else
                        {
                            return view('super_admin.dashboard', $data);
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
                            
                        return view('super_admin.dashboard', $data);
                    }
        }

            }
        }
    }

    function add_map_location ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
        
        $data['map_data'] = Map_location::get(['id','name', 'latitude','longitude']);

        return view('super_admin.add_map_location', $data);
    }

    function create_staff ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
        $data['locations'] = Map_location::where('link', null)->where('type',1)->get();

        return view('super_admin.create_staff', $data);
    }

    function delete_location (Request $req)
    {
        $delete = Map_location::where('id','=', $req->id)->delete();
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('super_admin.add_map_location', $data);
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

    function fetch_account ()
    {
        $accounts = User::where('role','=','1')->get();

        return response()->json([
            'accounts' => $accounts,
        ]);
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
            $res = $data->save();

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
                'success'=>$res,
            ]);

        }
    }

    function edit_staff_account (Request $req)
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
        $data['info'] = User::where('id',$req->id)->first();

        return view('super_admin.change_pass', $data);
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


    function acc_manage ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
        $data['accounts'] = User::query()->where('role','!=','3')->get();

        return view('super_admin.account_mange', $data);
    }

    function manage_del_acc (Request $req)
    {

        $info = User::where('id',$req->id)->first();

        if ($info->role = '1')
        {
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

            $data['accounts'] = User::query()->where('role','!=','3')->get();
    
            $user = User::where('id',$req->id)->delete();
    
            $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
    
             return view('super_admin.account_mange', $data);
    
        }
        else if ($info->role = '0')
        {
            $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
            $data['accounts'] = User::query()->where('role','!=','3')->get();

            $user = User::where('id',$req->id)->delete();

            return view('super_admin.account_mange', $data);
        }
        else if ($info->role = '2')
        {
            $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
            $data['accounts'] = User::query()->where('role','!=','3')->get();

            $user = User::where('id',$req->id)->delete();

            return view('super_admin.account_mange', $data);

        }
    }
}
