<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->text('description');           
        });

        DB::table('roles')->insert(array(
            'name' => 'Administrador',
            'description' => 'Administrador de sistema, usado para manutenções, testes etc.'
        ));

        DB::table('roles')->insert(array(
            'name' => 'Computadores',
            'description' => 'Realiza o cadastro de computadores'
        ));

        DB::table('roles')->insert(array(
            'name' => 'Monitores',
            'description' => 'Realiza o cadastro de monitores'
        ));

        DB::table('roles')->insert(array(
            'name' => 'Locais',
            'description' => 'Realiza o cadastro de locais'
        ));

        DB::table('roles')->insert(array(
            'name' => 'Dispositivos USB',
            'description' => 'Realiza o cadastro de dispositivos usb'
        ));

        DB::table('roles')->insert(array(
            'name' => 'Controlador de Acessos',
            'description' => 'Realiza o controle de usuarios a pagina.'
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
