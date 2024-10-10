<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rules;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  public function __construct()
    // {
    //    $this->middleware('auth');
    // }
    
    public function index()
    {
        $result = DB::table('register')
            ->join('activity', 'a_id', '=', 'register.activity_a_id')
            ->get();
        return view('register.index',['result'=>$result]);
    }

    public function create()
    {
        $result = DB::table('activity')->get();
        // $result2 = DB::table('exam_type')->get();
        // $result3 = DB::table('exam_result')->get();
        return view('register.create',['result'=>$result]);
    }

    public function exam()
    {
        // $result = DB::table('activity')->get();
        $result2 = DB::table('exam_type')->get();
        $result3 = DB::table('exam_result')->get();
        return view('register.create',['result'=>$result,'result2'=>$result2,'result3'=>$result3]);
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
    {
        $request->validate([
            'reg_date' => 'required',
            'reg_visitor' => 'required',
            'reg_position' => 'required',
            'reg_agency' => 'required',
            'reg_phone' => 'required',
            'activity_a_id' => 'required',
            // 'exam_date' => 'required',
            // 'exam_type_id' => 'required',
            // 'exam_result' => 'required',
            // 'exam_name' => 'required',
        ],
        [
            'reg_date.required'=>'กรุณาระบุวันที่ลงทะเบียน',
            'reg_visitor.required'=>'กรุณาระบุชื่อ สกุล ผู้ลงทะเบียน',
            'reg_position.required'=>'กรุณาระบุตำแหน่ง',
            'reg_agency.required'=>'กรุณาระบุสถานที่ทำงาน',
            'reg_phone.required'=>'กรุณาระบุเบอร์โทร',
            'activity_a_id.required'=>'กรุณาระบุกิจกรรม',
            // 'exam_date.required'=>'กรุณาระบุวันที่ตรวจ',
            // 'exam_type_id.required'=>'กรุณาระบุประเภทการตรวจ',
            // 'exam_result.required'=>'กรุณาระบุผลการตรวจ',
            // 'exam_name.required'=>'กรุณาระบุผู้ตรวจ',
            
        ]
    );

    DB::table('register')->insert(
        [
            'reg_date' => $request->reg_date,
            'reg_visitor' => $request->reg_visitor,
            'reg_position' => $request->reg_position,
            'reg_agency' => $request->reg_agency,
            'reg_phone' => $request->reg_phone,
            'activity_a_id' => $request->activity_a_id,
            // 'exam_date' => $request->exam_date,
            // 'exam_type_id' => $request->exam_type_id,
            // 'exam_result' => $request->exam_result,
            // 'exam_name' => $request->exam_name,
        ]
        );

        return redirect()->route('register.index')->with('success','บันทึกสำเร็จ'.$request->a_name);
    }

    public function storeexam(Request $request)
    {
        $request->validate([
            // 'reg_date' => 'required',
            // 'reg_visitor' => 'required',
            // 'reg_position' => 'required',
            // 'reg_agency' => 'required',
            // 'reg_phone' => 'required',
            // 'activity_a_id' => 'required',
            'exam_date' => 'required',
            'exam_type_id' => 'required',
            'exam_result' => 'required',
            'exam_name' => 'required',
        ],
        [
            // 'reg_date.required'=>'กรุณาระบุวันที่ลงทะเบียน',
            // 'reg_visitor.required'=>'กรุณาระบุชื่อ สกุล ผู้ลงทะเบียน',
            // 'reg_position.required'=>'กรุณาระบุตำแหน่ง',
            // 'reg_agency.required'=>'กรุณาระบุสถานที่ทำงาน',
            // 'reg_phone.required'=>'กรุณาระบุเบอร์โทร',
            // 'activity_a_id.required'=>'กรุณาระบุกิจกรรม',
            'exam_date.required'=>'กรุณาระบุวันที่ตรวจ',
            'exam_type_id.required'=>'กรุณาระบุประเภทการตรวจ',
            'exam_result.required'=>'กรุณาระบุผลการตรวจ',
            'exam_name.required'=>'กรุณาระบุผู้ตรวจ',
            
        ]
    );

    DB::table('register')->insert(
        [
            'reg_date' => $request->reg_date,
            'reg_visitor' => $request->reg_visitor,
            'reg_position' => $request->reg_position,
            'reg_agency' => $request->reg_agency,
            'reg_phone' => $request->reg_phone,
            'activity_a_id' => $request->activity_a_id,
            // 'exam_date' => $request->exam_date,
            // 'exam_type_id' => $request->exam_type_id,
            // 'exam_result' => $request->exam_result,
            // 'exam_name' => $request->exam_name,
        ]
        );

        return redirect()->route('register.index')->with('success','บันทึกสำเร็จ'.$request->a_name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = DB::table('activity')->get();
        $result2 = DB::table('exam_type')->get();
        $result3 = DB::table('exam_result')->get();
        $data = DB::table('register')
        ->where('reg_id',$id)
        ->first();
        return view('register.show',['data'=>$data, 'result'=>$result,'result2'=>$result2,'result3'=>$result3]);
    }

    public function showexam(string $id)
    {
        $result = DB::table('activity')->get();
        $result2 = DB::table('exam_type')->get();
        $result3 = DB::table('exam_result')->get();
        $data = DB::table('register')
        ->where('reg_id',$id)
        ->first();
        return view('register.showexam',['data'=>$data, 'result'=>$result,'result2'=>$result2,'result3'=>$result3]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'reg_date' => 'required',
            'reg_visitor' => 'required',
            'reg_position' => 'required',
            'reg_agency' => 'required',
            'reg_phone' => 'required',
            'activity_a_id' => 'required',
            'exam_date' => 'required',
            'exam_type_id' => 'required',
            'exam_result' => 'required',
            'exam_name' => 'required',
        ],
        [
            'reg_date.required'=>'กรุณาระบุวันที่ลงทะเบียน',
            'reg_visitor.required'=>'กรุณาระบุผู้เข้าร่วมกิจกรรม',
            'reg_position.required'=>'กรุณาระบุตำแหน่ง',
            'reg_agency.required'=>'กรุณาระบุสถานที่ทำงาน',
            'reg_phone.required'=>'กรุณาระบุเบอร์โทร',
            'activity_a_id.required'=>'กรุณาระบุกิจกรรม',
            'exam_date.required'=>'กรุณาระบุวันที่ตรวจ',
            'exam_type_id.required'=>'กรุณาระบุประเภทการตรวจ',
            'exam_result.required'=>'กรุณาระบุผลการตรวจ',
            'exam_name.required'=>'กรุณาระบุผู้ตรวจ',
        ]
    );

    DB::table('register')->where('reg_id',$id)->update(
        [
            'reg_date' => $request->reg_date,
            'reg_visitor' => $request->reg_visitor,
            'reg_position' => $request->reg_position,
            'reg_agency' => $request->reg_agency,
            'reg_phone' => $request->reg_phone,
            'activity_a_id' => $request->activity_a_id,
            'exam_date' => $request->exam_date,
            'exam_type_id' => $request->exam_type_id,
            'exam_result' => $request->exam_result,
            'exam_name' => $request->exam_name,
        ]
        );

        return redirect()->route('register.index')->with('success','แก้ไขสำเร็จ'.$request->a_name);
    }

    public function updateexam(Request $request, string $id)
    {
        $request->validate([
            // 'reg_date' => 'required',
            // 'reg_visitor' => 'required',
            // 'reg_position' => 'required',
            // 'reg_agency' => 'required',
            // 'reg_phone' => 'required',
            // 'activity_a_id' => 'required',
            'exam_date' => 'required',
            'exam_type_id' => 'required',
            'exam_result' => 'required',
            'exam_name' => 'required',
        ],
        [
            // 'reg_date.required'=>'กรุณาระบุวันที่ลงทะเบียน',
            // 'reg_visitor.required'=>'กรุณาระบุผู้เข้าร่วมกิจกรรม',
            // 'reg_position.required'=>'กรุณาระบุตำแหน่ง',
            // 'reg_agency.required'=>'กรุณาระบุสถานที่ทำงาน',
            // 'reg_phone.required'=>'กรุณาระบุเบอร์โทร',
            // 'activity_a_id.required'=>'กรุณาระบุกิจกรรม',
            'exam_date.required'=>'กรุณาระบุวันที่ตรวจ',
            'exam_type_id.required'=>'กรุณาระบุประเภทการตรวจ',
            'exam_result.required'=>'กรุณาระบุผลการตรวจ',
            'exam_name.required'=>'กรุณาระบุผู้ตรวจ',
        ]
    );

    DB::table('register')->where('reg_id',$id)->update(
        [
            // 'reg_date' => $request->reg_date,
            // 'reg_visitor' => $request->reg_visitor,
            // 'reg_position' => $request->reg_position,
            // 'reg_agency' => $request->reg_agency,
            // 'reg_phone' => $request->reg_phone,
            // 'activity_a_id' => $request->activity_a_id,
            'exam_date' => $request->exam_date,
            'exam_type_id' => $request->exam_type_id,
            'exam_result' => $request->exam_result,
            'exam_name' => $request->exam_name,
        ]
        );

        return redirect()->route('register.index')->with('success','แก้ไขสำเร็จ'.$request->a_name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('register')->where('reg_id',$id)->delete();
        return back()->with('success','ลบข้อมูลสำเร็จ');
    }
}
