<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\geofence_model;
use DB;

class geofenceController extends Controller
{
    public function viewdata()
    {
        return view('display_geofence_data');
    }

    public function index()
    {
        // $check_company_id=Session::get('check_company_id');
        $check_user=Session::get('check_user');
        $check_company_id=$check_user[0]->company_id;
        $user= DB::select('select * from site_geofences where company_id = ?',[$check_company_id]);
        return view('display_geofence_data',['user'=>$user]);
    }

    public function edit_function($id)
    {
        $user= DB::select('select * from site_geofences where id = ?', [$id]);
        return view('geofence_edit',['user'=>$user]);
    }

    public function update_on_map_function($id)
    {
        $user= DB::table('site_geofences')->where('id',$id)->first();
        $lat= $user->center;
        $latlng= json_decode($lat);
        return view('geofence_update_on_map')->with('lat',$latlng->lat)->with('lng',$latlng->lng)->with('radius',$user->radius)->with('user',$user);
    }

    public function update_function(Request $req, $id)
    {
        $name= $req->input('name');   
        $center= $req->input('center');   
        $radius= $req->input('radius');    
        DB::update('update site_geofences set name = ?, center = ?, radius = ? where id = ?'
        ,[$name,$center,$radius, $id]);
        return redirect('display_geofence_data')->with('success','Geofence Data Updated');
    }

    public function showmap($id)
    {
        $user= DB::table('site_geofences')->where('id',$id)->first();
        $lat= $user->center;
        $latlng= json_decode($lat);
        return view('mapview')->with('lat',$latlng->lat)->with('lng',$latlng->lng)->with('radius',$user->radius);
    }

    public function show_add_geofence_map()
    {
        return view('add_geofence');
    }

    public function add_new_geofence(Request $req)
    {
        $req->validate([
            'title'=>'required',
            'site_id'=>'required',
            'client_id'=>'required',
        ]);

        $check_user=Session::get('check_user');
        $check_company_id=$check_user[0]->company_id;
        $name= $req->input('title');   
        $center= $req->input('center');   
        $radius= $req->input('radius');   
        $site_id= $req->input('site_id');  
        $client_id= $req->input('client_id'); 
        // $company_id= $req->input('company_id'); 
        DB::insert('insert into site_geofences (name,center,radius,site_id,client_id,company_id) values (?,?,?,?,?,?)',
        [$name,$center,$radius,$site_id,$client_id,$check_company_id]);
        return redirect('display_geofence_data')->with('success','Geofence added'); 
    }
    public function update_geofence_on_map(Request $req, $id)
    {
        $center= $req->input('center');   
        $radius= $req->input('radius'); 
        DB::update('update site_geofences set  center = ?, radius = ? where id = ?'
        ,[$center,$radius, $id]);
        return redirect('display_geofence_data')->with('success','Geofence updated');
    }
}   
