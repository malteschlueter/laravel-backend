<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mschlueter\Backend\Models\Role;

class CreateBackendRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('backend_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();
            $table->timestamps();
        });

        Role::create([
            'key' => Role::SUPER_ADMIN,
        ]);

        Role::create([
            'key' => Role::ADMIN,
        ]);

        Role::create([
            'key' => Role::USER,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backend_roles');
    }
}
