<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rules;
use Hash;

class UserController extends Controller
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
        $result = DB::table('users')
            ->get();
        return view('user.index',['result'=>$result]);
    }

    public function create()
    {
        $result = DB::table('user')->get();
        return view('user.create',['result'=>$result]);
    }


     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],
        [
            'name.required'=>'กรุณาระบุชื่อผู้ใช้(ภาษาอังกฤษ)',
            'email.required'=>'กรุณาระบุอีเมล์',            
        ]
    );

    DB::table('users')->insert(
        [
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('user.index')->with('success','บันทึกสำเร็จ'.$request->a_name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $result = DB::table('users')->get();
        $data = DB::table('users')
        ->where('id',$id)
        ->first();
        return view('user.show',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],
        [
            'name.required'=>'กรุณาระบุชื่อผู้ใช้(ภาษาอังกฤษ)',
            'email.required'=>'กรุณาระบุอีเมล์', 
        ]
    );

    DB::table('users')->where('id',$id)->update(
        [
            'name' => $request->name,
            'email' => $request->email,
        ]
        );

        return redirect()->route('user.index')->with('success','แก้ไขสำเร็จ'.$request->a_name);
    }

   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('users')->where('id',$id)->delete();
        return back()->with('success','ลบข้อมูลสำเร็จ');
    }

    public function reset(Request $request)
    {
        $request->user()->update([
            'password' => Hash::make('123456'),
        ]);

        return back()->with('success', 'รหัสผ่านใหม่คือ 123456 เมื่อ Login แล้วให้เปลี่ยนใหม่');
    }
}
