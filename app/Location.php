<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function jobs() {
        # Define a one-to-many relationship.
        return $this->hasMany('\App\Job');
    }

    public static function locationsForDropdown() {
        $locations = \App\Location::orderBy('name','ASC')->get();
        $locations_for_dropdown = [];
        $locations_for_dropdown[0] = 'Choose a location...';
        foreach($locations as $location) {
            $locations_for_dropdown[$location->id] = $location->name;
        }
        return $locations_for_dropdown;
    }
}
