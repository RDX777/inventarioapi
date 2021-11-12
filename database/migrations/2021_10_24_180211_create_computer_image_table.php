<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputerImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computer_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('computer_id');
            $table->foreign('computer_id')
                ->references('id')
                ->on('computers')
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

        DB::table('computer_image')->insert(array(
            'computer_id' => 1,
            'image_id' => 2,
            'start_date' => '2021-10-12 19:48'

        ));

        DB::table('computer_image')->insert(array(
            'computer_id' => 1,
            'image_id' => 3,
            'start_date' => '2021-10-12 19:48'

        ));

        DB::table('computer_image')->insert(array(
            'computer_id' => 2,
            'image_id' => 3,
            'start_date' => '2021-10-12 19:48'

        ));

        DB::table('computer_image')->insert(array(
            'computer_id' => 3,
            'image_id' => 4,
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
        Schema::dropIfExists('computer_image');
    }
}
