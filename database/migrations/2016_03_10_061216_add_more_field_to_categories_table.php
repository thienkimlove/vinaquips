<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFieldToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->integer('vina_id')->default(0);
            $table->string('image')->nullable();
            $table->text('desc')->nullable();
            $table->text('keywords')->nullable();
            $table->string('type', 20)->default('products');
            $table->string('sub_category_ids')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn([
                'vina_id',
                'image',
                'desc',
                'keywords',
                'type',
                'sub_category_ids'
            ]);
        });
    }
}
