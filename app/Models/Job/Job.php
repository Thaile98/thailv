<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $timestamp = true;
	
    public function job_detail()
    {
    	return $this->hasOne(JobDetail::class,'jd_job_id');
    }

    public function career()
    {
    	return $this->belongsTo(Career::class,'job_career_id');
    }

    public function job_type()
    {
    	return $this->belongsTo(JobType::class,'job_type_id');
    }

    public function job_level()
    {
    	return $this->belongsTo(JobLevel::class,'job_level_id');
    }

    public function location()
    {
        return $this->belongsToMany(Location::class,'job_location');
    }

    public function job_web_root()
    {
        return $this->belongsTo(JobWebRoot::class,'job_root_id');
    }
    
}
