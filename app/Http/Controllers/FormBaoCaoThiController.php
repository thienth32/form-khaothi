<?php

namespace App\Http\Controllers;

use App\Models\BoMon;
use App\Models\DotThi;
use App\Models\LuotBaoCaoThi;
use App\Models\Monhoc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FormBaoCaoThiController extends Controller
{
    public function index(){
        $bomon = BoMon::all();
        $dotthi = DotThi::where('status', 1)->first();
        $monhoc = Monhoc::where('status', 1)->get();
        return view('form.baocaothi', compact('bomon', 'monhoc', 'dotthi'));
    }

    public function postBaoCaoThi(Request $request){

        $bomon = BoMon::find($request->bo_mon);
        $monhoc = Monhoc::find($request->mon_hoc_id);
        $dotthi = DotThi::where('status', 1)->first();
        $ngaythi = Carbon::createFromFormat('d/m/Y', $request->ngay_thi)->format('Y-m-d');
        $model = LuotBaoCaoThi::where('mon_hoc_id', $request->mon_hoc_id)
                                ->where('ngay_thi', $ngaythi)
                                ->where('ca_thi', $request->ca_thi)
                                ->where('ten_lop', mb_strtoupper(trim($request->ten_lop)))
                                ->first();

        $dirName = 'file-thi-10b/' . $dotthi->name . '/' . $bomon->name . '/' . $monhoc->name . '/' . mb_strtoupper(trim($request->ten_lop));
        $dirName .= str_replace('-', '_', $ngaythi) . ".ca-" . $request->ca_thi;
        $googleDisk = Storage::disk('google');
        $filePath = $googleDisk->put($dirName , $request->file('file_excel'));

        if($model){
            $googleDisk->delete($model->file_10b);
        }else{
            $model = new LuotBaoCaoThi();
        }
        $model->fill($request->all());
        $model->file_10b = $filePath;
        $model->nguoi_gui = Auth::user()->email;
        $model->ngay_thi = $ngaythi;
        $model->save();
        return redirect(route('form.thanhcong'));
    }

    public function thanhCong(){
        return view('form.baocaothi-thanhcong');
    }
}
