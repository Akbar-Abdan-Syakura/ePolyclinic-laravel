<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->nullable()
                ->index('fk_transaction_to_appointment');
            $table->string('transaction_code');
            $table->string('fee_doctor')->nullable();
            $table->string('fee_poli')->nullable();
            $table->string('fee_clinic')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('ppn')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
