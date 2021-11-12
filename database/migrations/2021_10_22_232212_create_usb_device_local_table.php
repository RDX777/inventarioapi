<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsbDeviceLocalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usb_device_local', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usb_device_id');
            $table->foreign('usb_device_id')
                ->references('id')
                ->on('usb_devices')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')
                ->references('id')
                ->on('locals')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
        });

        DB::table('usb_device_local')->insert(array(
            'usb_device_id' => 1,
            'local_id' => 1,
            'start_date' => '2021-10-12 19:48'

        ));

        DB::table('usb_device_local')->insert(array(
            'usb_device_id' => 2,
            'local_id' => 1,
            'start_date' => '2021-10-12 19:48'

        ));

        DB::table('usb_device_local')->insert(array(
            'usb_device_id' => 3,
            'local_id' => 1,
            'start_date' => '2020-10-12 19:48',
            'end_date' => '2020-09-12 19:48'

        ));

        DB::table('usb_device_local')->insert(array(
            'usb_device_id' => 2,
            'local_id' => 2,
            'start_date' => '2021-10-12 19:48'

        ));

        DB::table('usb_device_local')->insert(array(
            'usb_device_id' => 3,
            'local_id' => 3,
            'start_date' => '2021-10-12 19:48'

        ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usb_device_local');
    }
}
