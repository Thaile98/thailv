<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function jobs()
    {
    	return $this->belongsToMany(Job::class,'job_location');
    }
}
