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
            // 'reg_position' => 'required',
            // 'reg_agency' => 'required',
            'reg_phone' => 'required',
            'reg_cid' => 'required',
            'reg_prefix' => 'required',
            'reg_dob' => 'required',
            'reg_age' => 'required',
            'no' => 'required',
            'moo' => 'required',
            'district' => 'required',
            'sub_district' => 'required',
            'province' => 'required',
            'zipcode' => 'required',
      
        ],
        [
            'reg_date.required'=>'กรุณาระบุวันที่ลงทะเบียน',
            'reg_cid.required'=>'กรุณาระบุหมายเลข 13 หลัก',
            'reg_prefix.required'=>'กรุณาระบุคำนำหน้า',
            'reg_dob.required'=>'กรุณาระบุวันเกิด',
            'reg_age.required'=>'กรุณาระบุอายุ',
            // 'reg_visitor.required'=>'กรุณาระบุชื่อ สกุล ผู้ลงทะเบียน',
            // 'reg_position.required'=>'กรุณาระบุตำแหน่ง',
            'reg_agency.required'=>'กรุณาระบุสถานที่ทำงาน',
            'reg_phone.required'=>'กรุณาระบุเบอร์โทร',
            'no.required'=>'กรุณาระบุบ้านเลขที่',
            'moo.required'=>'กรุณาระบุหมู่ที่',
            'sub_district.required'=>'กรุณาระบุตำบล',
            'district.required'=>'กรุณาระบุอำเภอ',
            'province.required'=>'กรุณาระบุจังหวัด',
            'zipcode.required'=>'กรุณาระบุรหัสไปรษณีย์',
            
        ]
    );
    $address = $request->no.",".$request->moo.",".$request->sub_district.",".$request->district.",".$request->province.",".$request->zipcode;
    DB::table('register')->insert(
        [
            'reg_date' => $request->reg_date,
            'reg_visitor' => $request->reg_visitor,
            // 'reg_position' => $request->reg_position,
            // 'reg_agency' => $request->reg_agency,
            'reg_phone' => $request->reg_phone,
            'reg_dob' => $request->reg_dob,
            'activity_a_id' => $id,
            'reg_status'=>'ยังไม่พิมพ์',
            'reg_cid' => $request->reg_cid,
            'reg_prefix' => $request->reg_prefix,
            'reg_age' => $request->reg_age,
            'reg_address' => $address,
        ]
        );

        $aid = DB::table('activity')->where('a_id',$id)->first() ;
        $visitor = $request->reg_visitor;

        return view('frontend.success',['aid'=>$aid,'visitor'=>$visitor]);
    }

  
}
