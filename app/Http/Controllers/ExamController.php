<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rules;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = DB::table('exam')
            ->join('exam_type', 'type_id', '=', 'exam.exam_type_id')
            ->join('exam_result', 'result_id', '=', 'exam.exam_result')
            ->join('register', 'reg_id', '=', 'exam.register_reg_id')
            ->get();
        return view('exam.index',['result'=>$result]);
    }

    public function create()
    {
        $result = DB::table('exam_type')->get();
        $result2 = DB::table('register')->get();
        $result3 = DB::table('exam_result')->get();
        return view('exam.create',['result'=>$result,'result2'=>$result2,'result3'=>$result3]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'register_reg_id' => 'required',
            'exam_type_id' => 'required',
            'exam_name' => 'required',
            'exam_result' => 'required',
            'exam_date' => 'required',
        ],
        [
            'register_reg_id.required'=>'กรุณาระบุชื่อ สกุลผู้ลงทะเบียน',
            'exam_type_id.required'=>'กรุณาระบุประเภทการตรวจ',
            'exam_name.required'=>'กรุณาระบุชื่อผู้ตรวจ',
            'exam_result.required'=>'กรุณาระบุผลการตรวจ',
            'exam_date.required'=>'กรุณาระบุวันที่ตรวจ',
        ]
    );

    DB::table('exam')->insert(
        [
            'register_reg_id' => $request->register_reg_id,
            'exam_type_id' => $request->exam_type_id,
            'exam_name' => $request->exam_name,
            'exam_result' => $request->exam_result,
            'exam_date' => $request->exam_date,
        ]
        );

        return redirect()->route('exam.index')->with('success','บันทึกสำเร็จ'.$request->a_name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = DB::table('register')->get();
        $result2 = DB::table('exam_type')->get();
        $result3 = DB::table('exam_result')->get();
        $data = DB::table('exam')
        ->join('register', 'reg_id', '=', 'exam.register_reg_id')
        ->join('activity', 'a_id', '=', 'register.activity_a_id')
        ->where('register_reg_id',$id)
        ->first();
        return view('exam.show',['data'=>$data, 'result'=>$result, 'result2'=>$result2, 'result3'=>$result3]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'register_reg_id' => 'required',
            'exam_type_id' => 'required',
            'exam_name' => 'required',
            'exam_result' => 'required',
            'exam_date' => 'required',
        ],
        [
            'register_reg_id.required'=>'กรุณาระบุชื่อ สกุลผู้ลงทะเบียน',
            'exam_type_id.required'=>'กรุณาระบุประเภทการตรวจ',
            'exam_name.required'=>'กรุณาระบุชื่อผู้ตรวจ',
            'exam_result.required'=>'กรุณาระบุผลการตรวจ',
            'exam_date.required'=>'กรุณาระบุวันที่ตรวจ',
        ]
    );

    DB::table('exam')->where('reg_id',$id)->update(
        [
            'register_reg_id' => $request->register_reg_id,
            'exam_type_id' => $request->exam_type_id,
            'exam_name' => $request->exam_name,
            'exam_result' => $request->exam_result,
            // 'reg_qr' => $request->reg_qr,
            'exam_date' => $request->exam_date,
        ]
        );

        return redirect()->route('exam.index')->with('success','แก้ไขสำเร็จ'.$request->a_name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('exam')->where('reg_id',$id)->delete();
        return back()->with('success','ลบข้อมูลสำเร็จ');
    }
}
