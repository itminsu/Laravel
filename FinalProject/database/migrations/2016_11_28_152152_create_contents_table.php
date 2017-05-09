<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('alias');
            $table->longText('description')->nullable();
            $table->integer('page_order');
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->timestamps();

            //set foreign key
            $table->foreign('created_by')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')
                ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contents', function(Blueprint $table)
        {
            $table->dropForeign('contents_created_by_foreign');
            $table->dropForeign('contents_updated_by_foreign');
        });
    }
}
