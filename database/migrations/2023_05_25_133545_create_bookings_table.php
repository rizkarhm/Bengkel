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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            // $table->string('booking_id');
            $table->bigInteger('user_id')->unsigned(); //pic dan cust
            $table->bigInteger('kendaraan_id')->unsigned();
            $table->bigInteger('pic_id')->unsigned()->nullable();
            $table->string('model');
            $table->string('nopol');
            $table->date('tgl_masuk');
            $table->date('tgl_selesai')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('bookings');
    }
};
