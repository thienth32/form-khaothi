<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DotThi extends Model
{
    use HasFactory;
    protected $table = 'dot_thi';

    public function dong_bo_dot_thi(){
        return $this->hasMany( DongBoDotThi::class, 'dot_thi_id');
    }

    public function luot_bao_cao(){
        return $this->hasMany(LuotBaoCaoThi::class, 'dot_thi_id');
    }
}
