<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitorLocalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitor_local', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('monitor_id');
            $table->foreign('monitor_id')
                ->references('id')
                ->on('monitors')
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

        DB::table('monitor_local')->insert(array(
            'monitor_id' => 1,
            'local_id' => 1,
            'start_date' => '2021-10-12 19:48'

        ));

        DB::table('monitor_local')->insert(array(
            'monitor_id' => 2,
            'local_id' => 2,
            'start_date' => '2021-10-12 19:48'

        ));

        DB::table('monitor_local')->insert(array(
            'monitor_id' => 3,
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
        Schema::dropIfExists('monitor_local');
    }
}
