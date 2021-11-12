<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputerSoftwareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computer_software', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('computer_id');
            $table->foreign('computer_id')
                ->references('id')
                ->on('computers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('software_id');
            $table->foreign('software_id')
                ->references('id')
                ->on('softwares')               
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            
        });

        DB::table('computer_software')->insert(array(
            'computer_id' => 1,
            'software_id' => 1,
            'start_date' => '2021-10-12 19:48'

        ));

        DB::table('computer_software')->insert(array(
            'computer_id' => 2,
            'software_id' => 4,
            'start_date' => '2021-09-12 19:48'

        ));

        DB::table('computer_software')->insert(array(
            'computer_id' => 3,
            'software_id' => 5,
            'start_date' => '2021-09-11 19:48'

        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('computer_software');
    }
}
