<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    public function jobs() {
        # Define a one-to-many relationship.
        return $this->hasMany('\App\Job');
    }

    public static function recruitersForDropdown() {
        $recruiters = \App\Recruiter::orderBy('name','ASC')->get();
        $recruiters_for_dropdown = [];
        $recruiters_for_dropdown[0] = 'Choose a recruiter...';
        foreach($recruiters as $recruiter) {
            $recruiters_for_dropdown[$recruiter->id] = $recruiter->name;
        }
        return $recruiters_for_dropdown;
    }
}
