<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rules;
use Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Picqer\Barcode\BarcodeGeneratorPNG;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $result = DB::table('activity')->get();
        return view('activity.index', ['result' => $result]);
    }

    public function create()
    {
        return view('activity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $baseurl = 'localhost:8000';
        // dd($request->all());
        $request->validate(
            [
                'a_date' => 'required',
                'a_name' => 'required',
                'a_place' => 'required',
                'a_register_date' => 'required',
            ],
            [
                'a_date.required' => 'กรุณาระบุวันที่กิจกรรม',
                'a_name.required' => 'กรุณาระบุชื่อกิจกรรม',
                'a_place.required' => 'กรุณาระบุสถานที่จัดกิจกรรม',
                'a_register_date.required' => 'กรุณาระบุวันที่ลงทะเบียน',
            ]
        );

        $lastinsertid = DB::table('activity')->insertGetId(
            [
                'a_date' => $request->a_date,
                'a_name' => $request->a_name,
                'a_place' => $request->a_place,
                'a_regis_date' => $request->a_register_date,

            ]

        );
        // $hash = Hash::make($lastinsertid);
        $hash = md5($lastinsertid);
        $qrname = time() . '.png';
        DB::table('activity')->where('a_id', $lastinsertid)->update([
            'a_qrcode' => $qrname,
            'a_hashurl' => $hash
        ]);

        return redirect()->route('activity.index')->with('success', 'บันทึกสำเร็จ' . $request->a_name);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $data = DB::table('activity')->where('a_id', $id)->first();
        $url = "https://".$request->server('HTTP_HOST')."/frontend/create/" . $data->a_hashurl;
        $qrCodes = [];
        $qrCodes['simple'] = QrCode::size(300)->generate($url);

        // $host = $request->server('HTTP_HOST');

        // $url = $host."/frontend/create/" . $data->a_hashurl;

        // $img = QrCode::size(300)->generate($url);
        return view('activity.show', ['data' => $data,'url'=>$url],$qrCodes);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dtnow = date('Y-m-d H:i:s');

        $request->validate(
            [
                'a_date' => 'required',
                'a_name' => 'required',
                'a_place' => 'required',
                'a_register_date' => 'required',
            ],
            [
                'a_date.required' => 'กรุณาระบุวันที่กิจกรรม',
                'a_name.required' => 'กรุณาระบุชื่อกิจกรรม',
                'a_place.required' => 'กรุณาระบุสถานที่จัดกิจกรรม',
                'a_register_date.required' => 'กรุณาระบุวันที่ลงทะเบียน',
            ]
        );

        DB::table('activity')->where('a_id', $id)->update(
            [
                'a_date' => $request->a_date,
                'a_name' => $request->a_name,
                'a_place' => $request->a_place,
                'a_regis_date' => $request->a_register_date,
                'updated_at' => $dtnow
            ]
        );

        return redirect()->route('activity.index')->with('success', 'แก้ไขสำเร็จ' . $request->a_name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('activity')->where('a_id', $id)->delete();
        return back()->with('success', 'ลบข้อมูลสำเร็จ');
    }

    public function register(string $id)
    {
        $result = DB::table('activity')
            ->join('register', 'activity_a_id', '=', 'a_id')
            ->where('a_id', $id)
            ->orderBy('reg_qr','asc')
            ->get();
        return view('activity.register', ['result' => $result]);
    }

    public function rprint(string $id)
    {
        $dnow = date('Y-m-d');
        $data = DB::table('register')
            ->where('reg_id', $id)
            ->first();
        
        // $count = DB::table('register')
        //     ->select(DB::raw('count(reg_qr) as que_count'))
        //     ->where('reg_id', $id)
        //     ->where('activity_a_id', $data->activity_a_id)
        //     ->count();

        // DB::table('register')->where('reg_id', $id)->update(
        //     [
        //         'reg_status' => 'พิมพ์แล้ว',
        //         'exam_date' => $dnow,
        //     ]
        // );


        // $img = QrCode::size(300)->generate('https://8785-61-19-145-132.ngrok-free.app/frontend/create/' . $data->a_hashurl);

        $generatorPNG = new \Picqer\Barcode\BarcodeGeneratorPNG();
        $img = $generatorPNG->getBarcode($data->activity_a_id.'-'.$id, $generatorPNG::TYPE_CODE_128);

        return view('activity.rprint', [
            'data' => $data,
            'img'=> $img
        ]);
        // return back()->with('success','พิมพ์ลาเบลแล้ว',['data' => $data]);
    }

    public function queupdate(Request $request){
       
        $arr = explode('-',$request->barcode);
       
        $owner_reg_qr = DB::table('register')
        ->select('reg_qr')
        ->where('activity_a_id',$arr[0])
        ->where('reg_id',$arr[1])
        ->first();

	if($owner_reg_qr != NULL){

		$data = DB::table('register')
        	->where('activity_a_id',$arr[0])
        	->max('reg_qr');

        	if ($data == 0 || $data == NULL){
            		$data = 0;
       		 }

		if($owner_reg_qr->reg_qr == NULL){
			$owner_reg_qr->reg_qr = 1;
			$data = $data + 1;
		}else{
			$sql = "UPDATE register SET reg_qr=reg_qr-1 WHERE activity_a_id=".$arr[0]." AND reg_qr>".$owner_reg_qr->reg_qr;
        		DB::select($sql);
		}
		$sql_owner = "UPDATE register SET reg_qr=".$data." WHERE activity_a_id=".$arr[0]." AND reg_id = ".$arr[1];
        	DB::select($sql_owner);
		return back()->with('success','ยิง Barcode สำเร็จ');
	}else{
		return back()->with('success','ไม่พบ Barcode');
	}
}

}
