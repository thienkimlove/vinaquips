<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug', env('CATEGORY_SLUG_URL_LENGTH'))->unique();
            $table->string('image')->nullable();
            $table->text('desc')->nullable();
            $table->string('keywords')->nullable();
            $table->string('type')->default('products');
            $table->integer('vina_id')->nullable();
            $table->timestamps();
        });

        Schema::create('group_post', function(Blueprint $tale)
        {
            $tale->integer('group_id')->unsigned()->index();
            $tale->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $tale->integer('post_id')->unsigned()->index();
            $tale->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('groups');
        Schema::drop('group_post');
    }
}
