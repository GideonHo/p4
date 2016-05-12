<?php

use Illuminate\Database\Seeder;

class JobTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'Full-Time',
        	'Part-Time',
        	'Contract'
        ];

        foreach($data as $jobtypeName) {
            $jobtype = new \App\JobType();
            $jobtype->name = $jobtypeName;
            $jobtype->save();
        }
    }
}
