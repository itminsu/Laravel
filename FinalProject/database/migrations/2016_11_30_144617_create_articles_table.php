<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->longText('html_content');
            $table->integer('page_id')->unsigned();
            $table->integer('content_area_id')->unsigned();
            $table->boolean('is_all_page')->default(false);
            $table->boolean('is_removed')->default(0);
            $table->integer('created_by')->nullable()->unsigned();
            $table->integer('updated_by')->nullable()->unsigned();
            $table->timestamps();

            $table->timestamp('published_at');

            $table->foreign('content_area_id')->references('id')
                ->on('contents');

            $table->foreign('page_id')->references('id')
                ->on('pages');

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
        Schema::drop('articles', function(Blueprint $table)
        {
            $table->dropForeign('articles_content_area_id_foreign');
            $table->dropForeign('articles_page_id_foreign');
            $table->dropForeign('articles_created_by_foreign');
            $table->dropForeign('articles_updated_by_foreign');
        });
    }
}
