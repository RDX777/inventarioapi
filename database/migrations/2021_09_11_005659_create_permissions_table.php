<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
        });

        DB::table('permissions')->insert(array(
            'name' => 'computadores_cadastra',
            'description' => 'Realiza o cadastro de um novo computador'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'computadores_edita',
            'description' => 'Edita os dados de um computador'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'computador_deleta',
            'description' => 'Exclui um computador'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'computador_visualiza',
            'description' => 'Apenas visualiza os dados de um computador'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'monitores_cadastra',
            'description' => 'Realiza o cadastro de um novo monitor'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'monitores_edita',
            'description' => 'Edita os dados de um monitor'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'monitores_deleta',
            'description' => 'Exclui um monitor'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'monitores_visualiza',
            'description' => 'Apenas visualiza os dados de um monitor'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'locais_cadastra',
            'description' => 'Realiza o cadastro de um novo local'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'locais_edita',
            'description' => 'Edita os dados de um local'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'locais_deleta',
            'description' => 'Exclui um local'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'locais_visualiza',
            'description' => 'Apenas visualiza os dados de um local'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'dispositivos_usb_cadastra',
            'description' => 'Realiza o cadastro de um novo dispositivo usb'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'dispositivos_usb_edita',
            'description' => 'Edita os dados de um dispositivo usb'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'dispositivos_usb_deleta',
            'description' => 'Exclui um dispositivo usb'
        ));

        DB::table('permissions')->insert(array(
            'name' => 'dispositivos_usb_visualiza',
            'description' => 'Apenas visualiza os dados de um dispositivo usb'
        ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
