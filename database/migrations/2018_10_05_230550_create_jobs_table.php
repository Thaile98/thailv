<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_root_id');
            $table->integer('job_root_type');
            $table->string('job_title');
            $table->integer('job_status');
            $table->date('job_expiry_date');
            $table->string('job_salary');
            $table->text('job_address');
            $table->integer('job_experience');
            $table->integer('job_career');
            $table->integer('job_type');
            $table->string('job_num');
            $table->integer('job_level');
            $table->string('job_diploma');
            $table->string('job_gender');
            $table->string('job_age');
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
        Schema::dropIfExists('jobs');
    }
}
