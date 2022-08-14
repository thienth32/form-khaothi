<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuotBaoCaoThi extends Model
{
    use HasFactory;
    protected $table = 'luot_bao_cao';
    protected $fillable = [ 'mon_hoc_id', 'ten_lop', 'hinh_thuc_thi', 'ca_thi',
                            'so_sv_thi', 'so_sv_vang_mat', 'ma_sv_vang_mat', 'so_sv_vi_pham', 'ct_to_chuc', 'tinh_trang_de_thi',
                            'de_xuat_khac_phuc'];

    public function monhoc(){
        return $this->belongsTo(Monhoc::class, 'mon_hoc_id');
    }
}
