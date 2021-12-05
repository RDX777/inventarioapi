<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->id();
            $table->biginteger('permission_id')->unsigned();
            $table->biginteger('role_id')->unsigned();

            $table->foreign('permission_id')->
                references('id')->
                on('permissions')->
                onDelete('cascade');

            $table->foreign('role_id')->
                references('id')->
                on('roles')->
                onDelete('cascade');
        });

        DB::table('permission_role')->insert(array(
            'permission_id' => 1,
            'role_id' => 2
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 2,
            'role_id' => 2
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 3,
            'role_id' => 2
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 4,
            'role_id' => 2
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 5,
            'role_id' => 3
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 6,
            'role_id' => 3
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 7,
            'role_id' => 3
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 8,
            'role_id' => 3
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 9,
            'role_id' => 4
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 10,
            'role_id' => 4
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 11,
            'role_id' => 4
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 12,
            'role_id' => 4
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 13,
            'role_id' => 5
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 14,
            'role_id' => 5
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 15,
            'role_id' => 5
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 16,
            'role_id' => 5
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 17,
            'role_id' => 6
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 18,
            'role_id' => 6
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 19,
            'role_id' => 6
        ));

        DB::table('permission_role')->insert(array(
            'permission_id' => 20,
            'role_id' => 6
        ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions_role');
    }
}
