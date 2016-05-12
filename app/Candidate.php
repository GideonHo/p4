<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function user() {
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\App\User');
    }

    public static function candidatesForDropdown() {
        $candidates = \App\Candidate::orderBy('name','ASC')->get();
        $candidates_for_dropdown = [];
        $candidates_for_dropdown[0] = 'Choose a resume...';
        foreach($candidates as $candidate) {
            $candidates_for_dropdown[$candidate->id] = $candidate->resume;
        }
        return $candidates_for_dropdown;
    }
}
