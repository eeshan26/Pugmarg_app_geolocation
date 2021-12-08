<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\department_model;
use DB;

class departmentController extends Controller
{
    public function viewdata()
    {
        return view('display_department_data');
    }

    public function index()
    {
        $check_user=Session::get('check_user');
        $check_company_id=$check_user[0]->company_id;
        $user= DB::select('select * from departments');
        return view('display_department_data',['user'=>$user]);
    }

    public function edit_function($id)
    {
        $user= DB::select('select * from departments where id = ?', [$id]);
        return view('department_edit',['user'=>$user]);
    }

    public function update_function(Request $req, $id)
    {
        $name= $req->input('name');   
        $showInReport= $req->input('showInReport');      
        DB::update('update departments set name = ?, showInReport = ? where id = ?'
        ,[$name,$showInReport,$id]);
        return redirect('display_department_data')->with('success','Department Data Updated');
    }
}
