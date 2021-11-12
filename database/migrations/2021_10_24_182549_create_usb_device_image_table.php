<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsbDeviceImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usb_device_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usb_device_id');
            $table->foreign('usb_device_id')
                ->references('id')
                ->on('usb_devices')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('image_id');
            $table->foreign('image_id')
                ->references('id')
                ->on('images')               
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usb_device_image');
    }
}
