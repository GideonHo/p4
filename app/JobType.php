<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{

	public function jobs() {
        # Define a one-to-many relationship.
        return $this->hasMany('\App\Job');
    }

    public static function jobtypesForDropdown() {
        $jobtypes = \App\JobType::get();
        $jobtypes_for_dropdown = [];
        $jobtypes_for_dropdown[0] = 'Choose a job type...';
        foreach($jobtypes as $jobtype) {
            $jobtypes_for_dropdown[$jobtype->id] = $jobtype->name;
        }
        return $jobtypes_for_dropdown;
    }
}
