<?php

namespace App\Http\Controllers;

use App\link;
use App\URL;
use Illuminate\Http\Request;

class NewController extends Controller
{
    //
    public function app() {
        $links = link::all();
        return view('example.app',compact('links'));
    }
    public function index() {
        $count = link::count();
        if ($count >=10){
            return 'เกินกำหนด';
        }
        return view('example.index');
    }
    public function store(Request $request)
    {
//        $URL = new URL;
//        $URL->longurl=
        $request->validate([
            'FormControllerInput1'=>'required'
        ]);
        $longurl = $request->get('FormControllerInput1');
        $shorturl = $this->randString();
//        dd($longurl);
        link::create([
            'longurl'=>$longurl,
            'shorturl'=>$shorturl
        ]);

        return redirect('/')->with('success','บันทึกข้อมูลเรียบร้อยแล้ว');

    }

        public function randString() {
            $characters = 'abcdefghijklmnopqrstuvwxyz';
            $numbers = '0123456789';

            $charLength = strlen($characters);
            $numlength = strlen($numbers);
            $my_id = 342;
            for($i=0;$i < 3;$i++){
               $my_id.=$characters[rand(0,$charLength-1)];
            }
            for ($i=0;$i < 2;$i++){
                $my_id.=$numbers[rand(0,$numlength-1)];
            }

            return $my_id;
        }

        public function check($code) {
//            dd($code);
            $result = link::Where('shorturl',$code)->first();
//            dd($result);
            if($result){
                return redirect()->away($result->longurl);
            }

            return 'ไม่พบรหัสใน URL นี้';
        }


}
