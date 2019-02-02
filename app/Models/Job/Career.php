<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    public function jobs()
    {
    	return $this->hasMany(Job::class,'job_career_id');
    }
}
