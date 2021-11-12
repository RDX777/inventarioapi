<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('softwares', function (Blueprint $table) {
            $table->id();
            $table->string('manufacturer_name', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('version', 255)->nullable();
            $table->text('description', 255)->nullable();
            $table->string('type', 255)->nullable();
        });

        DB::table('softwares')->insert(array(
            'manufacturer_name' => 'Microsoftun',
            'name' => 'Ruindows 7',
            'version' => '10.0.19043.1288',
            'description' => 'Descrição de sistema operacional',
            'type' => 'Sistema Operacional'
        ));

        DB::table('softwares')->insert(array(
            'manufacturer_name' => 'Microsoftun',
            'name' => 'Ruindows 8',
            'version' => '10.0.19043.1288',
            'description' => 'Descrição de sistema operacional',
            'type' => 'Sistema Operacional'
        ));

        DB::table('softwares')->insert(array(
            'manufacturer_name' => 'Microsoftun',
            'name' => 'Ruindows 10',
            'version' => '10.0.19043.1288',
            'description' => 'Descrição de sistema operacional',
            'type' => 'Sistema Operacional'
        ));

        DB::table('softwares')->insert(array(
            'manufacturer_name' => 'Lixux',
            'name' => 'Debilan 9',
            'version' => '9.0.1',
            'description' => 'Descrição de sistema operacional',
            'type' => 'Sistema Operacional'
        ));

        DB::table('softwares')->insert(array(
            'manufacturer_name' => 'Kaspermodo',
            'name' => 'kasper 9',
            'version' => '9.0.1',
            'description' => 'Descrição de antivirus',
            'type' => 'Anti Virus'
        ));

        DB::table('softwares')->insert(array(
            'manufacturer_name' => 'Groogre',
            'name' => 'ChromeMemoria',
            'version' => '79.0.1',
            'description' => 'Descrição de browser',
            'type' => 'Browser'
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('softwares');
    }
}
