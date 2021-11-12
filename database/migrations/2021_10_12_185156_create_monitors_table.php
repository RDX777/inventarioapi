<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitors', function (Blueprint $table) {
            $table->id();
            $table->string('manufacturer_name', 255)->nullable();
            $table->float('iches')->nullable();
            $table->string('model', 255)->nullable();
            $table->string('serial_number', 255)->nullable();
        });

        DB::table('monitors')->insert(array(
            'manufacturer_name'=>'Samsung',
            'iches'=>15.5,
            'model'=>'TA550',
            'serial_number'=>null
        ));

        DB::table('monitors')->insert(array(
            'manufacturer_name'=>'Marca 1',
            'iches'=>15.5,
            'model'=>'TA551',
            'serial_number'=>null
        ));

        DB::table('monitors')->insert(array(
            'manufacturer_name'=>'Marca 2',
            'iches'=>14,
            'model'=>'TA552',
            'serial_number'=>'ASD585S5S'
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitors');
    }
}
