<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'Beijing',
        	'Frankfurt',
        	'Hong Kong',
        	'London',
        	'New York',
        	'Paris',
        	'Seoul',
        	'Shanghai',
        	'Singapore',
        	'Sydney',
        	'Tokyo',
        	'Zurich'
        ];

        foreach($data as $locationName) {
            $location = new \App\Location();
            $location->name = $locationName;
            $location->save();
        }
    }
}
