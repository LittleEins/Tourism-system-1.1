<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Map_location;

class AdminController extends Controller
{
    function dashboard ()
    {
        $data = ['user_data'=>User::where('id','=', session('LoggedUser'))->first()];

        return view('admin.dashboard', $data);
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
