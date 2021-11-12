<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computers', function (Blueprint $table) {
            $table->id();
            $table->string('processor', 255)->nullable();
            $table->integer('memory_size')->nullable();
            $table->string('video', 255)->nullable();
            $table->integer('video_size')->nullable();
            $table->integer('hard_disk_size')->nullable();
            $table->integer('ssd_size')->nullable();
            $table->string('network_cable_mac', 255)->nullable();
            $table->string('network_wireless_mac', 255)->nullable();
            $table->string('manufacturer_name', 255)->nullable();
            $table->boolean('is_notebook', 255)->nullable();
            $table->string('comments', 255)->nullable();
            $table->string('model', 255)->nullable();
            $table->string('serial_number', 255)->unique();
            $table->string('hostname', 255)->unique();

        });

        DB::table('computers')->insert(array(
            'processor'=>'Intel(R) Core(TM) i7-2617M CPU @ 1.50GHz   1.50 GHz',
            'memory_size'=>12,
            'video'=>'NVIDIA GeForce GTX 1060 3GB',
            'video_size'=>3,
            'hard_disk_size'=>1000,
            'ssd_size'=>null,
            'network_cable_mac'=>'00-00-00-00-00-00',
            'network_wireless_mac'=>null,
            'manufacturer_name'=>'DELL',
            'is_notebook'=>false,
            'comments'=>'Micro de teste',
            'model'=>'modelo 1',
            'serial_number'=>'a1',
            'hostname' => 'hostname01'
        ));

        DB::table('computers')->insert(array(
            'processor'=>'AMD Ryzen 5 3600X, 3.8GHz',
            'memory_size'=>4,
            'video'=>null,
            'video_size'=>null,
            'hard_disk_size'=>500,
            'ssd_size'=>null,
            'network_cable_mac'=>'00-00-00-00-00-00',
            'network_wireless_mac'=>null,
            'manufacturer_name'=>'HP',
            'is_notebook'=>false,
            'comments'=>'Micro de teste 2',
            'model'=>'modelo 1',
            'serial_number'=>'a2',
            'hostname' => 'hostname02'
        ));

        DB::table('computers')->insert(array(
            'processor'=>'Intel(R) Core(TM) i5-2617M CPU @ 4.0GHz',
            'memory_size'=>8,
            'video'=>null,
            'video_size'=>null,
            'hard_disk_size'=>500,
            'ssd_size'=>null,
            'network_cable_mac'=>'00-00-00-00-00-00',
            'network_wireless_mac'=>null,
            'manufacturer_name'=>'HP',
            'is_notebook'=>false,
            'comments'=>'Micro de teste 2',
            'model'=>'modelo 1',
            'serial_number'=>'a3',
            'hostname' => 'hostname03'
        ));

        DB::table('computers')->insert(array(
            'processor'=>'Intel(R) Core(TM) i7-8700 CPU @ 4.0GHz',
            'memory_size'=>16,
            'video'=>null,
            'video_size'=>null,
            'hard_disk_size'=>500,
            'ssd_size'=>null,
            'network_cable_mac'=>'00-00-00-00-00-00',
            'network_wireless_mac'=>null,
            'manufacturer_name'=>'HP',
            'is_notebook'=>false,
            'comments'=>'Micro de teste 2',
            'model'=>'modelo 1',
            'serial_number'=>'a115s74d5',
            'hostname' => 'hostname04'
        ));

        DB::table('computers')->insert(array(
            'processor'=>'Core i5 Family',
            'memory_size'=>8,
            'video'=>null,
            'video_size'=>null,
            'hard_disk_size'=>500,
            'ssd_size'=>250,
            'network_cable_mac'=>'00-00-00-00-00-00',
            'network_wireless_mac'=>null,
            'manufacturer_name'=>'Aceruim',
            'is_notebook'=>true,
            'comments'=>'Notebook de teste 2',
            'model' => 'AAA1.B222',
            'serial_number'=>'4710886096887',
            'hostname' => 'hostname05'
        ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computers');
    }
}
