<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryMutilplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_mutilples', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cat_parent_id')->default(0);
            $table->string('cat_name');
            $table->string('cat_slug');
            $table->text('cat_meta_title');
            $table->text('cat_meta_description');
            $table->text('cat_meta_keyword');
            $table->string('cat_avatar');
            $table->integer('cat_type');
            $table->integer('cat_status');
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
        Schema::dropIfExists('category_mutilples');
    }
}
