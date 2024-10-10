<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rules;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//     public function __construct()
// {
//        $this->middleware('auth');
//    }


    public function create($id)
    {
        $result = DB::table('activity')->where('a_hashurl',$id)->first();
        return view('frontend.create',['result'=>$result]);
    }

     public function store(Request $request,$id)
    {
        $request->validate([
            'reg_date' => 'required',
            'reg_visitor' => 'required',
            'reg_position' => 'required',
            'reg_agency' => 'required',
            'reg_phone' => 'required'
      
        ],
        [
            'reg_date.required'=>'กรุณาระบุวันที่ลงทะเบียน',
            'reg_visitor.required'=>'กรุณาระบุชื่อ สกุล ผู้ลงทะเบียน',
            'reg_position.required'=>'กรุณาระบุตำแหน่ง',
            'reg_agency.required'=>'กรุณาระบุสถานที่ทำงาน',
            'reg_phone.required'=>'กรุณาระบุเบอร์โทร',
            
        ]
    );

    DB::table('register')->insert(
        [
            'reg_date' => $request->reg_date,
            'reg_visitor' => $request->reg_visitor,
            'reg_position' => $request->reg_position,
            'reg_agency' => $request->reg_agency,
            'reg_phone' => $request->reg_phone,
            'activity_a_id' => $id,
            'reg_status'=>'ยังไม่พิมพ์'
        ]
        );

        $aid = DB::table('activity')->where('a_id',$id)->first() ;
        $visitor = $request->reg_visitor;

        return view('frontend.success',['aid'=>$aid,'visitor'=>$visitor]);
    }

  
}
