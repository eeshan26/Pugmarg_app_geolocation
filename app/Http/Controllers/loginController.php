<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\user_model;
use DB;

class loginController extends Controller
{
    public function displayform()
    {
        return view('loginform');
    }

    public function check(Request $req)
    {
        $req->validate([
            'contact'=>'required | numeric | digits:10',
        ]);
        $user= User_model::where("contact",$req->input('contact'))->get();
        // $pword_check=Hash::check($req->input('password'),'$user->password');
        $hashed=Hash::make("123456");
        if(Hash::check($req->input('password'), /*$user[0]->password*/$hashed))
            {
                if($user[0]->role_id==2)
                {
                    Session::put('check_user',$user);
                    // Session::put('check_company_id',$user[0]->company_id);
                    return redirect('dashboard')->with('success','Valid login');
                }
            }
        else
            return 0;
    }

    public function viewdata()
    {
        return view('display_user_data');
    }

    public function index()
    {
        $var=1;
        $check_user=Session::get('check_user');
        $check_company_id=$check_user[0]->company_id;
        $user= DB::select('select * from users where role_id != ? && company_id = ?', [$var,$check_company_id]);
        return view('display_user_data',['user'=>$user]);
    }

    public function edit_function($id)
    {
        $user= DB::select('select * from users where id = ?', [$id]);
        return view('login_edit',['user'=>$user]);
    }

    public function update_function(Request $req, $id)
    {
        $name= $req->input('name');   
        $contact= $req->input('contact');   
        $company_id= $req->input('company_id');   
        $company_name= $req->input('company_name');   
        $role_id= $req->input('role_id');   
        $showUser= $req->input('showUser');    
        DB::update('update users set name = ?, contact = ?, company_id = ?, company_name = ?,  role_id = ?, showUser = ? where id = ?'
        , [$name,$contact,$company_id,$company_name,$role_id,$showUser, $id]);
        return redirect('display_user_data')->with('success','User Data Updated');
    }

}
