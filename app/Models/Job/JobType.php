<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    public function jobs()
    {
    	return $this->hasMany(Job::class,'job_type_id');
    }
}
