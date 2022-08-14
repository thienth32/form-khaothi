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
        Schema::table('luot_bao_cao', function (Blueprint $table) {
            $table->dropColumn('nguoi_gui');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('luot_bao_cao', function (Blueprint $table) {
            $table->string('nguoi_gui');
        });
    }
};
