<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('file_name', 255);
            $table->string('file_extension');
        });

        DB::statement("ALTER TABLE images ADD data LONGBLOB");

        DB::table('images')->insert(array(
            'file_name' => 'no_image',
            'file_extension' => 'jpg',
            'data' => file_get_contents(public_path() . '/no_image.jpg')

        ));

        DB::table('images')->insert(array(
            'file_name' => 'micro1',
            'file_extension' => 'jpg',
            'data' => file_get_contents(public_path() . '/micro1.jpg')

        ));

        DB::table('images')->insert(array(
            'file_name' => 'micro2',
            'file_extension' => 'jpg',
            'data' => file_get_contents(public_path() . '/micro2.jpg')

        ));

        DB::table('images')->insert(array(
            'file_name' => 'micro3',
            'file_extension' => 'jpg',
            'data' => file_get_contents(public_path() . '/micro3.jpg')

        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
