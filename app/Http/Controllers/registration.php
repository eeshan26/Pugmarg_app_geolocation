<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\register_model;
use DB;

class registration extends Controller
{
    //

    public function displayform()
    {
        return view('registrationform');
    }

    public function save(Request $req)
    {
        $req->validate([
            'email'=>'required | email',
            'mobile'=>'required | numeric | digits:10',
        ]);
        // $user= new register_model;
        $firstName= $req->input('firstName');   
        $lastName= $req->input('lastName');   
        $department= $req->input('department');   
        $designation= $req->input('designation');   
        $company_id= $req->input('company_id');   
        $company_name= $req->input('company_name');   
        $supervisor_id= $req->input('supervisor_id');   
        $supervisor_name= $req->input('supervisor_name');   
        $mobile= $req->input('mobile');   
        $email= $req->input('email');   
        $role_id= $req->input('role_id');   
        $registrationFlag= $req->input('registrationFlag');   
        $otp= $req->input('otp'); 
        DB::insert('insert into registrationdata (firstName,lastName,department,designation,company_id,company_name,supervisor_id,supervisor_name,mobile,email,role_id,registrationFlag,otp) values (?,?,?,?,?,?,?,?,?,?,?,?,?)',
        [$firstName,$lastName,$department,$designation,$company_id,$company_name,$supervisor_id,$supervisor_name,$mobile,$email,$role_id,$registrationFlag,$otp]);
        return redirect('register')->with('success','Data Saved');
    }

    public function viewdata()
    {
        return view('displaydata');
    }

    public function index()
    {
        // $check_company_id=Session::get('check_company_id');
        $check_user=Session::get('check_user');
        $check_company_id=$check_user[0]->company_id;
        $user= DB::select('select * from registrationdata where company_id = ?',[$check_company_id]);
        return view('displaydata',['user'=>$user]);
    }

    public function edit_function($id)
    {
        $user= DB::select('select * from registrationdata where id = ?', [$id]);
        return view('registrationedit',['user'=>$user]);
    }

    public function update_function(Request $req, $id)
    {
        $req->validate([
            'email'=>'required | email',
            'mobile'=>'required | numeric | digits:10',
        ]);
        $firstName= $req->input('firstName');   
        $lastName= $req->input('lastName');   
        $department= $req->input('department');   
        $designation= $req->input('designation');   
        $company_id= $req->input('company_id');   
        $company_name= $req->input('company_name');   
        $supervisor_id= $req->input('supervisor_id');   
        $supervisor_name= $req->input('supervisor_name');   
        $mobile= $req->input('mobile');   
        $email= $req->input('email');   
        $role_id= $req->input('role_id');   
        $registrationFlag= $req->input('registrationFlag');   
        $otp= $req->input('otp'); 
        DB::update('update registrationdata set firstName = ?, lastName = ?, department = ?, designation = ?, company_id = ?, company_name = ?, supervisor_id = ?, supervisor_name = ?, mobile = ?, email = ?, role_id = ?, registrationFlag = ?, otp = ? where id = ?'
        , [$firstName,$lastName,$department,$designation,$company_id,$company_name,$supervisor_id,$supervisor_name,$mobile,$email,$role_id,$registrationFlag,$otp,$id]);
        return redirect('displaydata')->with('success','Data Updated');
    }

}
