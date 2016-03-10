<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFieldToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('vina_id')->default(0);
            $table->string('code', 50)->nullable();
            $table->integer('price')->default(0);
            $table->integer('number')->default(0);
            $table->string('currency', 10)->default('VND');
            $table->integer('unit')->default(0);
            $table->integer('weight')->default(0);
            $table->integer('views')->default(0);
            $table->string('weight_unit', 10)->default('g');
            $table->integer('vina_cat_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign');
            $table->dropIndex('posts_user_id_foreign');
            $table->dropColumn([
                'user_id',
                'vina_id',
                'code',
                'price',
                'number',
                'currency',
                'unit',
                'weight',
                'views',
                'weight_unit',
                'vina_cat_id'
            ]);
        });
    }
}
