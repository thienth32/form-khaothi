<?php

namespace App\Http\Controllers;

use App\Events\GetDataDotThiProcessed;
use App\Models\DotThi;
use Illuminate\Http\Request;

class DotThiController extends Controller
{
    public function index(){

    }

    public function addForm(){
        return view('admin.dotthi.add-form');
    }

    public function saveAdd(Request $request){

        $request->validate(
            [
                'name' => "required|unique:dot_thi",
                'sheet_id' => [
                    'required',
                    'unique:dot_thi',
                    function($attribute, $value, $fail){
                        try {
                            $client = getGooogleClient();
                            $service = new \Google_Service_Sheets($client);
                            $range = 'KH thi Block 1!A2:D';
                            $spreadsheetId = $value;
                            $service->spreadsheets_values->get($spreadsheetId, $range);
                        }catch(\Google_Exception $ex){
                            $fail('Google Sheet Id không tồn tại, vui lòng kiểm tra lại');
                        }
                    }
                ]
            ],
            [
                'name.required' => "Hãy nhập tên đợt thi",
                'name.unique' => "Trùng tên đợt thi",
                'sheet_id.required' => "Hãy nhập google sheet id",
                'sheet_id.unique' => "Trùng sheet id của đợt thi khác",
            ]
        );
        $model = new DotThi();
        $model->name = $request->name;
        $model->sheet_id = $request->sheet_id;
        $model->save();
        GetDataDotThiProcessed::dispatch($model);
        return view('admin.dotthi.index')->with('msg', 'Tạo đợt thi thành công, hệ thống đang đồng bộ dữ liệu từ google sheet');
    }
}
