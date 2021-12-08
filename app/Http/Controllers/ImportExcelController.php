<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\input_file_model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ImportExcelController extends Controller 
{
    function index()
    {
        $data =DB::table('tbl_fileinput')->orderBy('Id','ASC')->get();
        return view('import_excel',compact('data'));
    }

    function import(Request $request)
    {
        $this->validate($request, [
            'select_file' => 'required|mimes:xlsx, xls',
        ]);
        
        $path = $request->file('select_file')->getRealPath();

        $data= Excel::load($path)->get();

        if($data->count() > 0)
        {
            foreach($data->toArray() as $key => $value)
            {
                // dd($key, $value);
                // foreach($value as $row)
                // {
                    
                //     print_r($row);
                //     $insert_data[]= array(
                //         'name' => $row['name'],
                //         'mobile_no' => $row['mobile_no'],
                //     );
                // }
                $duplicateUser=input_file_model::where('mobile_no',$value['mobile_no'])->first();
                if($duplicateUser)
                {
                    return back()->with('duplicate','Excel Data cannot be inserted because of mobile number duplication.');
                }
                DB::table('tbl_fileinput')->insert(['name'=> $value["name"], 'mobile_no'=> $value["mobile_no"]]);
            }
            // if(!empty($insert_data))
            // {
            //     DB::table('tbl_fileinput')->insert($insert_data);
            // }
        }
        return back()->with('success','Excel Data Imported succesfully.');
    }
}
