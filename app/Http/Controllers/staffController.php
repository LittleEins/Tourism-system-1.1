<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book_data;
use App\Models\Book_request;
use App\Models\Approve;
use App\Models\Approves_manual;
use App\Models\Counting_approves_manual;
use App\Models\Counting_group_approve;
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
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; // udr if you deleting on public 
use Illuminate\Support\Facades\Storage; // use this if you make delete on storage

class staffController extends Controller
{
    function get_notif ()
    {
        $get_notif = staff_alert::where('status','=', 'unread')->paginate(3);
        $all = staff_alert::where('status','=', 'unread')->get();

        return response()->json([
            'get_notif' => $get_notif,
            'unread' => $all,
        ]);
    }

    function view_notif (Request $req)
    {
        DB::table('staff_alerts')->where('id', $req->id)->update(['status' => 'seen']);
        $data = ['message'=> User::where('id','=', $req->id)->first()];

        return back()->with('staff_click',$req->id);
    }

    function staff_notif_view(Request $req)
    {
        DB::table('staff_alerts')->where('id', $req->id)->update(['status' => 'seen']);
        $data = ['message'=> User::where('id','=', $req->id)->first()];

        return back()->with('staff_click',$req->id);
    }

    function staff_notif_log ()
    {
        $acc = User::where('id','=', session('LoggedUser'))->first();
        //getting data by new insert
        $data = staff_alert::orderBy('created_at','desc')->get();

        return response()->json([
            'notification'=>$data,
        ]);
    }

    function staff_delete_notif (Request $req)
    {
        DB::table('staff_alerts')->where('id',$req->id)->delete();
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();

        
        return view('staff.notif', $data);
    }

    function notifications ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('staff.notif', $data);
    }

    function view_data (Request $req)
    {
        $data = staff_alert::where('id','=', $req->input('view'))->first();

        return response()->json([
            'staff_view_data' => $data,
        ]);
    }



    function profile ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('staff.profile', $data);
        
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

            return redirect()->route('profilestaff.view')->with('success','Update Successfully');
 
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

                    return redirect()->route('profilestaff.view')->with('success','Update Successfully');
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

                return redirect()->route('profilestaff.view')->with('success','Update Successfully');
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

                return redirect()->route('profilestaff.view')->with('success','Profile Updated');
            }
            else
            {
                $profile_delete->img_name = 'default-profile.png';
                $profile_delete->save();

                return redirect()->route('profilestaff.view')->with('success','Profile Updated');
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

        $dd = Daily_reset::where('user_id', session('LoggedUser'))->count();

        $m_ap = Counting_approves_manual::get();
        $m_ap_count = Counting_approves_manual::count();
        $m_group_ap = Counting_group_approve::get();
        $m_group_ap_count = Counting_group_approve::count();

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
                // check if leave is not due
                $timenow = (int) $now;
                $desti = DB::table('counting_approves_manuals')->where('time_leave','>=',$timenow)->get(['destination']);
                $desti2 = DB::table('counting_group_approves')->where('time_leave','>=',$timenow)->get(['destination']);
                
                $count1 = DB::table('counting_approves_manuals')->where('time_leave','>=',$timenow)->count();
                $count2 = DB::table('counting_group_approves')->where('time_leave','>=',$timenow)->count();

                // storing destination on array    
                $des1 =[];

                $descount = count($des1);
                
                for ($z = 0; $z < $count1; $z++ )
                {
                    
                    // checking if destination is already on array
                    if (stripos(json_encode($des1),$desti[$z]->destination) !== false)
                    {
                        continue;
                    }
                    else
                    {
                        array_push($des1,$desti[$z]->destination);
                    }
                
                }

                $total = $count1 + $count2;
            
                
                if ($total != 0)
                {
                    
                    $data = User::where('id','=', session('LoggedUser'))->first();

                    $data2 = Map_location::get(['name']);
                    $count = $data2->count();

                    $des2count = count($des1);

                    for ($u = 0; $u <= $des2count-1; $u++)
                    {
                        $map_count = Map_location::where('name','=', strtolower($des1[$u]))->first();
                        $count =(int)$map_count->visit_count - $total ;
                        $map_count->visit_count = $count ;
                        $map_count->save();
                        
                        DB::table('counting_approves_manuals')->where('time_leave','>=',$timenow)->delete();
                        DB::table('counting_group_approves')->where('time_leave','>=',$timenow)->delete();

        
                    }
                }


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
                            
                            return view('staff.dashboard', $data);
                        }
                        else
                        {
                            return view('staff.dashboard', $data);
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
                            
                        return view('staff.dashboard', $data);
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
                            
                            return view('staff.dashboard', $data);
                        }
                        else
                        {
                            return view('staff.dashboard', $data);
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
                            
                        return view('staff.dashboard', $data);
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
                            
                            return view('staff.dashboard', $data);
                        }
                        else
                        {
                            return view('staff.dashboard', $data);
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
                            
                        return view('staff.dashboard', $data);
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
                            
                            return view('staff.dashboard', $data);
                        }
                        else
                        {
                            return view('staff.dashboard', $data);
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
                            
                        return view('staff.dashboard', $data);
                    }
                }
            }
        }
        else 
        {
          
            $check_date = Daily_reset::where('user_id',session('LoggedUser'))->first();

            if (($check_date->today == date("Y-m-d", strtotime("today"))) && ($check_date->tomorrow == date("Y-m-d", strtotime("tomorrow"))))
            {
                   // check if leave is not due
                $timenow = (int) $now;
                $desti = DB::table('counting_approves_manuals')->where('time_leave','>=',$timenow)->get(['destination']);
                $desti2 = DB::table('counting_group_approves')->where('time_leave','>=',$timenow)->get(['destination']);
                
                $count1 = DB::table('counting_approves_manuals')->where('time_leave','>=',$timenow)->count();
                $count2 = DB::table('counting_group_approves')->where('time_leave','>=',$timenow)->count();

                // storing destination on array    
                $des1 =[];

                $descount = count($des1);
                
                for ($z = 0; $z < $count1; $z++ )
                {
                    
                    // checking if destination is already on array
                    if (stripos(json_encode($des1),$desti[$z]->destination) !== false)
                    {
                        continue;
                    }
                    else
                    {
                        array_push($des1,$desti[$z]->destination);
                    }
                
                }

                $total = $count1 + $count2;
           
                
                if ($total != 0)
                {
                   
                    $data = User::where('id','=', session('LoggedUser'))->first();

                    $data2 = Map_location::get(['name']);
                    $count = $data2->count();

                    $des2count = count($des1);

                    for ($u = 0; $u <= $des2count-1; $u++)
                    {
                        $map_count = Map_location::where('name','=', strtolower($des1[$u]))->first();
                        $count =(int)$map_count->visit_count - $total ;
                        $map_count->visit_count = $count ;
                        $map_count->save();
                        
                        DB::table('counting_approves_manuals')->where('time_leave','>=',$timenow)->delete();
                        DB::table('counting_group_approves')->where('time_leave','>=',$timenow)->delete();

        
                    }
                }


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
                            
                            return view('staff.dashboard', $data);
                        }
                        else
                        {
                            return view('staff.dashboard', $data);
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
                            
                        return view('staff.dashboard', $data);
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
                            
                            return view('staff.dashboard', $data);
                        }
                        else
                        {
                            return view('staff.dashboard', $data);
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
                            
                        return view('staff.dashboard', $data);
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
                            
                            return view('staff.dashboard', $data);
                        }
                        else
                        {
                            return view('staff.dashboard', $data);
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
                            
                        return view('staff.dashboard', $data);
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
                            
                            return view('staff.dashboard', $data);
                        }
                        else
                        {
                            return view('staff.dashboard', $data);
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
                            
                        return view('staff.dashboard', $data);
                    }
        }

            }
        }
    }

    function dashboard_fetch ()
    {
    
        $data['location'] = Map_location::where('type','=',"1")->get(['name','visit_count']);
        $data['count'] = Map_location::where('type','=',"1")->get(['name','visit_count'])->count();;

        return response()->json([
            'data' => $data,
            'count' => $count,
        ]);

    }
    
    function graph_data ()
    {

        date_default_timezone_set('Asia/Manila');
        $end = "18";
        $now = date('H');

        $acc = User::where('id','=', session('LoggedUser'))->first();

        $day = date('l');

        $data = Weekly_count::where('user_id','=', session('LoggedUser'))->where('location','=', $acc->location)->first();

        return response()->json([
            'visit_count'=>$data,
        ]);
 
  
    }

    function alert ()
    {
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();

        
        return view('staff.alert', $data);
    }

    function notif_log ()
    {
        $acc = User::where('id','=', session('LoggedUser'))->first();
        $data = staff_notification::where('creator_id','=', $acc->location)->get();

        return response()->json([
            'notification'=>$data,
        ]);
    }

    function delete_notif (Request $req)
    {
        DB::table('staff_notifications')->where('id',$req->id)->delete();
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();

        
        return view('staff.alert', $data);
    }

    function send_notification (Request $req)
    {
        // validator
        $validate = \Validator::make($req->all(), [
            'type' => 'required',
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
            date_default_timezone_set('Asia/Manila');

            $sender = User::where('id','=', session('LoggedUser'))->first();

            
            $user_notification = new User_notification;
            $user_notification->creator_id = $sender->location;
            $user_notification->message = $req->input('message');
            $user_notification->type = $req->input('type');
            $user_notification->time =  date('g:i:a');
            $user_notification->date =  date('F j, Y');
            $user_notification->status = "unread";
            $user_notification->save();


            $notification = new staff_notification;
            $notification->creator_id = $sender->location;
            $notification->message = $req->input('message');
            $notification->type = $req->input('type');
            $notification->time =  date('g:i:a');
            $notification->date =  date('F j, Y');
            $notification->status = "unread";
            $notification->save();
            

            return response()->json([
                'status'=>200,
                'success'=>'Notification sent',
            ]);
        }

      
    }

    function book2 (Request $req)
    {
        // get data and goto book2 view
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        $data['locations'] = Map_location::get();

        return view('staff.booking2', $data);
       
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

             
             if ($req->phone == null)
            {
                $user_id = User::where('id','=', session('LoggedUser'))->first();

                 $first_name = $req->first_name;
                 $last_name = $req->last_name;
                 $gender = $req->gender;
                 $destination = $req->destination;
                 $phone = $req->contact;
                 $address = $req->address;
 
                 for ($i=0; $i < count($first_name); $i++)
                 {
                     $datasave = [
                         'booker_id'   =>$user_id->id,
                         'first_name' =>$first_name[$i],
                         'last_name' =>$last_name[$i],
                         'gender' =>$gender[$i],
                         'destination' =>$destination,
                         'address' =>$address[$i],
                         'book_number'=>$book_number,
                         'time_date' =>$time_date,
                         'time_leave'=>date('H'),
                         'ap_date' => date("Y-m-d"),
                     ];
 
                     DB::table('group_manual_approves')->insert($datasave);
                     DB::table('counting_group_approves')->insert($datasave);
             
                }

            $count_groups = Group_manual_approve::where('book_number',$book_number)->count();
 
            $insert_request = new Approves_manual;
            $insert_request->booker_id = $user_id->id;//
            $insert_request->staff_id = $user_id->id;///
            $insert_request->user_id = $user_id->id;//
            $insert_request->first_name = $req->first_nameUser;//
            $insert_request->last_name = $req->last_nameUser;//
            $insert_request->phone = $req->phoneUser;//
            $insert_request->email = $req->emailUser;//
            $insert_request->gender = $req->genderUser;//
            $insert_request->address = $req->addressUser;//
            $insert_request->destination = $req->destination;
            $insert_request->book_number = $book_number;//
            $insert_request->groups = $count_groups;
            $insert_request->book_number = $book_number;//
            $insert_request->day = strtolower(date('l'));
            $insert_request->approve_td = $time_date;
            $insert_request->ap_date = date("Y-m-d");
            $insert_request->ap_type = "manual";//
            $insert_request->time_leave = date('H');
            $insert_request->save();

            $counting_ap = new Counting_approves_manual;
            $counting_ap->booker_id = $user_id->id;//
            $counting_ap->staff_id = $user_id->id;///
            $counting_ap->user_id = $user_id->id;//
            $counting_ap->first_name = $req->first_nameUser;//
            $counting_ap->last_name = $req->last_nameUser;//
            $counting_ap->phone = $req->phoneUser;//
            $counting_ap->email = $req->emailUser;//
            $counting_ap->gender = $req->genderUser;//
            $counting_ap->address = $req->addressUser;//
            $counting_ap->destination = $req->destination;
            $counting_ap->book_number = $book_number;//
            $counting_ap->groups = $count_groups;
            $counting_ap->book_number = $book_number;//
            $counting_ap->day = strtolower(date('l'));
            $counting_ap->approve_td = $time_date;
            $counting_ap->ap_date = date("Y-m-d");
            $counting_ap->ap_type = "manual";//
            $counting_ap->time_leave = date('H');
            $counting_ap->save();

            $data = User::where('id','=', session('LoggedUser'))->first();

            $visit_count = Approves_manual::where('book_number','=', $book_number)->where('destination','=', strtolower($data->location))->get();
            $visit_group = Group_manual_approve::where('book_number','=', $book_number)->where('destination','=', strtolower($data->location))->get();
            $total = $visit_count->count() + $visit_group->count();
    
            $data2 = Map_location::get(['name']);
            $count = $data2->count();
            $date  = date('F j, Y');
            $end = "18";
            $day = date('l');
    
    
            for($i = 0; $i < $count; $i++){
                if (strtolower($data->location) == strtolower($data2[$i]->name))
                {
    
                    $map_count = Map_location::where('name','=', strtolower($data2[$i]->name))->first();
                    $count = $total + (int)$map_count->visit_count;
                    
                    $result = DB::table('map_locations')->where('name','=', strtolower($data2[$i]->name))->update(['visit_count'=>$count,'total_visit'=>$count]);
                   
                    break;
                }
            }
 
            
                $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
                return view('staff.book_result', $data,['book_number'=>$book_number])->with('success','Book Successfully.');
             }
            else 
            {
                  
                 $first_name = $req->first_name;
                 $last_name = $req->last_name;
                 $gender = $req->gender;
                 $destination = $req->destination;
                 $phone = $req->contact;
                 $address = $req->address;

                 $user_id = User::where('id','=', session('LoggedUser'))->first();
 
                 for ($i=0; $i < count($first_name); $i++)
                 {
                     $datasave = [
                         'booker_id'   =>$user_id->id,
                         'first_name' =>$first_name[$i],
                         'last_name' =>$last_name[$i],
                         'gender' =>$gender[$i],
                         'destination' =>$destination,
                         'phone' =>$phone[$i],
                         'address' =>$address[$i],
                         'book_number'=>$book_number,
                         'time_date' =>$time_date,
                     ];
 
                     DB::table('group_manual_approves')->insert($datasave);
             
                 }

                 
            $count_groups = Group_manual_approve::where('book_number',$book_number)->count();
 
            $time_date  = date('F j, Y g:i:a  ');

            $insert_request = new Approves_manual;
            $insert_request->booker_id = $user_id->id;//
            $insert_request->staff_id = $user_id->id;///
            $insert_request->user_id = $user_id->id;//
            $insert_request->first_name = $req->first_nameUser;//
            $insert_request->last_name = $req->last_nameUser;//
            $insert_request->phone = $req->phoneUser;//
            $insert_request->email = $req->emailUser;//
            $insert_request->gender = $req->genderUser;//
            $insert_request->address = $req->addressUser;//
            $insert_request->destination = $req->destination;//
            $insert_request->book_number = $book_number;//
            $insert_request->groups = $count_groups;
            $insert_request->book_number = $book_number;//
            $insert_request->day = strtolower(date('l'));
            $insert_request->approve_td = $time_date;
            $insert_request->ap_date = date("Y-m-d");
            $insert_request->time_leave = $req->time_leave;
            $insert_request->ap_type = "manual";//
            $insert_request->save();

            $data = User::where('id','=', session('LoggedUser'))->first();

            $visit_count = Approves_manual::where('book_number','=', $book_number)->where('destination','=', strtolower($data->location))->get();
            $visit_group = Group_manual_approve::where('book_number','=', $book_number)->where('destination','=', strtolower($data->location))->get();
            $total = $visit_count->count() + $visit_group->count();
    
            $data2 = Map_location::get(['name']);
            $count = $data2->count();
            $date  = date('F j, Y');
            $end = "18";
            $day = date('l');
    
    
            for($i = 0; $i < $count; $i++){
                if (strtolower($data->location) == strtolower($data2[$i]->name))
                {
    
                    $map_count = Map_location::where('name','=', strtolower($data2[$i]->name))->first();
                    $count = $total + (int)$map_count->visit_count;
                    
                    $result = DB::table('map_locations')->where('name','=', strtolower($data2[$i]->name))->update(['visit_count'=>$count,'total_visit'=>$count]);
                   
                    break;
                }
            }
 
             $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
             return view('staff.book_result', $data,['book_number'=>$book_number])->with('success','Book Successfully.');
             }
 
             
         }
         else
         {
             $book_number = random_int(100000, 999999);
 
             $req->session()->put('book_number', $book_number);
             
            $count_groups = Group_manual_approve::where('book_number',$book_number)->count();
 
            $time_date  = date('F j, Y g:i:a  ');

             $data = User::where('id','=', session('LoggedUser'))->first();
             $insert_request = new Approves_manual;
             $insert_request->booker_id = $data->id;//
             $insert_request->staff_id = $data->id;///
             $insert_request->user_id = $data->id;//
             $insert_request->first_name = $req->first_nameUser;//
             $insert_request->last_name = $req->last_nameUser;//
             $insert_request->phone = $req->phoneUser;//
             $insert_request->email = $req->emailUser;//
             $insert_request->gender = $req->genderUser;//
             $insert_request->address = $req->addressUser;//
             $insert_request->destination = $req->destination;//
             $insert_request->book_number = $book_number;//
             $insert_request->groups = 'solo';
             $insert_request->book_number = $book_number;//
             $insert_request->day = strtolower(date('l'));
             $insert_request->approve_td = $time_date;
             $insert_request->ap_date = date("Y-m-d");
             $insert_request->time_leave = $req->time_leave;
             $insert_request->ap_type = "manual";//
             $insert_request->save();

             $data = User::where('id','=', session('LoggedUser'))->first();

             $visit_count = Approves_manual::where('book_number','=', $book_number)->where('destination','=', strtolower($data->location))->get();
             $visit_group = Group_manual_approve::where('book_number','=', $book_number)->where('destination','=', strtolower($data->location))->get();
             $total = $visit_count->count() + $visit_group->count();
     
             $data2 = Map_location::get(['name']);
             $count = $data2->count();
             $date  = date('F j, Y');
             $end = "18";
             $day = date('l');
     
     
             for($i = 0; $i < $count; $i++){
                 if (strtolower($data->location) == strtolower($data2[$i]->name))
                 {
     
                     $map_count = Map_location::where('name','=', strtolower($data2[$i]->name))->first();
                     $count = $total + (int)$map_count->visit_count;
                     
                     $result = DB::table('map_locations')->where('name','=', strtolower($data2[$i]->name))->update(['visit_count'=>$count,'total_visit'=>$count]);
                    
                     break;
                 }
             }

             $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];
             return view('staff.book_result', $data,['book_number'=>$book_number])->with('success','Book Successfully.');
         }
 
     }
 


    function check_point ()
    {
        $acc_data = User::where('id','=', session('LoggedUser'))->first();
        // passing multiple variable to view
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['book_list'] =  DB::table('book_requests')->where('destination', '=', $acc_data->location )->where('status','=','pending')->get();
        
        return view('staff.check-point', $data);

    }

    function fetch_checkpoint ()
    {
        $acc_data = User::where('id','=', session('LoggedUser'))->first();

        $checkpoint_list = DB::table('book_requests')->where('destination', '=', $acc_data->location )->where('status','=','pending')->get()->get();

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
            return view('staff.groups-view', $data);
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
        $approve->staff_id = session('LoggedUser');
        $approve->first_name = $confirm->first_name;
        $approve->last_name = $confirm->last_name;
        $approve->destination = $confirm->destination;
        $approve->gender = $confirm->gender;
        $approve->phone = $confirm->phone;
        $approve->email = $confirm->email;
        $approve->address = $confirm->address;
        $approve->book_number = $confirm->book_number;
        $approve->groups = $groupCount;
        $approve->day = strtolower(date('l'));
        $approve->approve_td = $time_date;
        $approve->ap_date = date("Y-m-d");
        $approve->save();

        DB::table('group_approves')->where('book_number',$confirm->book_number)->update(['ap_date'=>date("Y-m-d")]);

        $data = User::where('id','=', session('LoggedUser'))->first();

        $visit_count = Approve::where('book_number','=', $confirm->book_number)->where('destination','=', strtolower($data->location))->get();
        $visit_group = Book_data::where('book_number','=', $confirm->book_number)->where('destination','=', strtolower($data->location))->get();
        $total = $visit_count->count() + $visit_group->count();

        $data2 = Map_location::get(['name']);
        $count = $data2->count();
        $date  = date('F j, Y');
        $end = "18";
        $day = date('l');


        for($i = 0; $i < $count; $i++){
            if (strtolower($data->location) == strtolower($data2[$i]->name))
            {

                $map_count = Map_location::where('name','=', strtolower($data2[$i]->name))->first();
                $count = $total + (int)$map_count->visit_count;
                
                $result = DB::table('map_locations')->where('name','=', strtolower($data2[$i]->name))->update(['visit_count'=>$count,'total_visit'=>$count]);
               
                break;
            }
        }
        
        $acc = User::where('id','=', session('LoggedUser'))->first();


        $final = Weekly_count::where('user_id','=', session('LoggedUser'))->first();



        if ($final == null)
        {
        
            $insert = new Weekly_count;
            $insert->user_id = session('LoggedUser');
            $insert->location = $acc->location;
            $insert->save();

            $update = Weekly_count::where('user_id','=', session('LoggedUser'))->first();
            $update->$day = $total + (int)$update->$day;
            $update->save();

            
            $status_update = Book_request::where('id',$req->id)->first();
            $status_update->status = "approve";
            $status_update->save();

            return redirect('/staff/check/point')->with('success','Approve Successfully');

        }
        else
        {
            $update = Weekly_count::where('user_id','=', session('LoggedUser'))->first();
            $final->$day = $total + (int)$update->$day;
            $final->location = $acc->location;
            $final->save();

            $status_update = Book_request::where('id',$req->id)->first();
            $status_update->status = "approve";
            $status_update->save();

            return redirect('/staff/check/point')->with('success','Approve Successfully');
    
        }
    }

    //reports generation
    function logs ()
    {
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['lists'] = Approve::where('staff_id',session('LoggedUser'))->paginate(10);

        return view('staff.history', $data);
    }

    function records_group_view (Request $req)
    {
        //getting all data with booker
        $data['user_data'] = User::where('id','=', session('LoggedUser'))->first();
        $data['groups'] = Group_approve::where('book_number', '=', $req->id)->paginate(10);

        if ($data['groups']->isNotEmpty())
        {
            return view('staff.log-view', $data);
        }
        else
        {
            return back();
        }

    }

}
