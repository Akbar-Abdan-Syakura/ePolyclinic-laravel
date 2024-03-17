<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctor', function (Blueprint $table) {
            $table->foreign('poli_id', 'fk_doctor_to_poli')
                ->references('id')->on('poli')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id', 'fk_doctor_to_users')
                ->references('id')->on('users')
                ->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor', function (Blueprint $table) {
            $table->dropForeign('fk_doctor_to_poli');
            $table->dropForeign('fk_doctor_to_users');
        });
    }
}
