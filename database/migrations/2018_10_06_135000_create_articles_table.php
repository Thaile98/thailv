<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('art_cate_id');
            $table->string('art_name');
            $table->string('art_meta_title');
            $table->string('art_meta_keyword');
            $table->string('art_meta_description');
            $table->string('art_avatar');
            $table->unsignedInteger('art_author_id');
            $table->unsignedInteger('art_inspec_id');
            $table->unsignedInteger('art_edited_id');
            $table->integer('art_status');
            $table->integer('art_hit_view');
            $table->integer('art_hit_share');
            $table->integer('art_hit_comment');
            $table->dateTime('art_published_at');
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
        Schema::dropIfExists('articles');
    }
}
