<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luot_bao_cao', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("mon_hoc_id");
            $table->string("email_gv");
            $table->string("ten_lop");
            $table->string("file_10b");
            $table->integer("hinh_thuc_thi");
            $table->date("ngay_thi");
            $table->integer("ca_thi");
            $table->integer("so_sv_thi");
            $table->integer("so_sv_vang_mat");
            $table->string("ma_sv_vang_mat")->nullable();
            $table->integer("so_sv_vi_pham");
            $table->string("ct_to_chuc");
            $table->string("tinh_trang_de_thi");
            $table->text("de_xuat_khac_phuc")->nullable();
            $table->integer('trang_thai')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('luot_bao_cao');
    }
};
