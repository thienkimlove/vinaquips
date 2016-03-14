<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('desc');
            $table->string('path')->nullable();
            $table->string('filesize')->nullable();
            $table->string('extension')->nullable();
            $table->boolean('status')->default(false);
            $table->integer('vina_id')->default(0);
            $table->string('type', 20)->default('products');
            $table->timestamps();
        });

        Schema::create('file_post', function(Blueprint $tale)
        {
            $tale->integer('post_id')->unsigned()->index();
            $tale->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $tale->integer('file_id')->unsigned()->index();
            $tale->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('file_post', function (Blueprint $table) {
            $table->dropForeign('file_post_post_id_foreign');
            $table->dropIndex('file_post_post_id_index');
            $table->dropForeign('file_post_file_id_foreign');
            $table->dropIndex('file_post_file_id_index');
        });
        Schema::drop('files');
        Schema::drop('file_post');
    }
}
