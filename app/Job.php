<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function location() {
        return $this->belongsTo('\App\Location');
    }

    public function job_type() {
        return $this->belongsTo('\App\JobType');
    }

    public function recruiter() {
        return $this->belongsTo('\App\Recruiter');
    }

    public function user()
    {
        return $this->belongsTo('\App\User');
    }

	public function tags()
	{
	    return $this->belongsToMany('\App\Tag')->withTimestamps();
	}

    public function users()
    {
        return $this->belongsToMany('\App\User')->withTimestamps();
    }

}
