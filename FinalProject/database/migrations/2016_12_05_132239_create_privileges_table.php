<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivilegesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_privileges', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('user_has_user_privilege', function(Blueprint $table)
        {
            $table->integer('user_id')->unsigned()->index();
            $table->integer('privilege_id')->unsigned()->index();

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('privilege_id')->references('id')
                ->on('user_privileges')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_has_user_privilege', function(Blueprint $table)
        {
            $table->dropForeign('user_has_user_privilege_user_id_foreign');
            $table->dropForeign('user_has_user_privilege_privilege_id_foreign');
        });
        Schema::drop('user_privileges');

    }

}

