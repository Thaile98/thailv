<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_infos', function (Blueprint $table) {
            $table->integer('cdi_candidate_id');
            $table->string('cdi_full_name');
            $table->dateTime('cdi_date_of_birth');
            $table->text('cdi_address');
            $table->tinyInteger('cdi_gender');
            $table->tinyInteger('cdi_marriage_status');
            $table->tinyInteger('cdi_experience');
            $table->text('cdi_skill');
            $table->tinyInteger('cdi_education_level');
            $table->tinyInteger('cdi_language_level');
            $table->tinyInteger('cdi_job_career');
            $table->tinyInteger('cdi_job_title');
            $table->tinyInteger('cdi_job_time_type');
            $table->tinyInteger('cdi_job_salary');
            $table->tinyInteger('cdi_job_location');
            $table->text('cdi_self_description');
            $table->text('cdi_job_description');
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
        Schema::dropIfExists('candidate_infos');
    }
}
