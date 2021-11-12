<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsbDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usb_devices', function (Blueprint $table) {
            $table->id();
            $table->string('description', 255)->nullable();
            $table->string('manufacturer_name', 255)->nullable();
            $table->string('model', 255)->nullable();
            $table->string('serial_number', 255)->nullable();

        });

        DB::table('usb_devices')->insert(array(
            'description'=>'ASIX AX88179 USB 3.0 para Adaptador Gigabit Ethernet',
            'manufacturer_name'=>'ASIX',
            'model'=>null,
            'serial_number'=>null

        ));

        DB::table('usb_devices')->insert(array(
            'description'=>'Teclado',
            'manufacturer_name'=>'Marca 1',
            'model'=>null,
            'serial_number'=>null

        ));

        DB::table('usb_devices')->insert(array(
            'description'=>'Mouse',
            'manufacturer_name'=>'Marca 1',
            'model'=>null,
            'serial_number'=>null

        ));

        DB::table('usb_devices')->insert(array(
            'description'=>'Teclado',
            'manufacturer_name'=>'Marca 2',
            'model'=>null,
            'serial_number'=>null

        ));

        DB::table('usb_devices')->insert(array(
            'description'=>'Mouse',
            'manufacturer_name'=>'Marca 2',
            'model'=>null,
            'serial_number'=>null

        ));

        DB::table('usb_devices')->insert(array(
            'description'=>'Headset',
            'manufacturer_name'=>'Marca 2',
            'model'=>null,
            'serial_number'=>null

        ));

        DB::table('usb_devices')->insert(array(
            'description'=>'Headphone',
            'manufacturer_name'=>'Marca 2',
            'model'=>null,
            'serial_number'=>null

        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usb_devices');
    }
}
