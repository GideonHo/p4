<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('jobs')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'expired_at' => Carbon\Carbon::now()->addMonths(1), //'2016-12-31',
	        'title' => 'Chief Investment Officer',
	        'recruiter_id' => 1,
	        'description' => 'This position is responsible for development of relationship with high-net-worth individuals and families',
	        'job_type_id' => 1,
	        'location_id' => 3,
	        'author_id' => 1,
	    ]);

	    DB::table('jobs')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'expired_at' => Carbon\Carbon::now()->addMonths(1), //'2016-12-31',
	        'title' => 'Investment Director',
	        'recruiter_id' => 1,
	        'description' => 'This position is responsible for making investment decisions for public and private funds',
	        'job_type_id' => 1,
	        'location_id' => 3,
	        'author_id' => 1,
	    ]);

		DB::table('jobs')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'expired_at' => Carbon\Carbon::now()->addMonths(1), //'2016-12-31',
	        'title' => 'Investment Manager',
	        'recruiter_id' => 1,
	        'description' => 'This position is responsible for making investment decisions for public and private funds',
	        'job_type_id' => 1,
	        'location_id' => 3,
	        'author_id' => 2,
	    ]);

		DB::table('jobs')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'expired_at' => Carbon\Carbon::now()->addMonths(1), //'2016-12-31',
	        'title' => 'Investment Analyst',
	        'recruiter_id' => 1,
	        'description' => 'This position is responsible for making investment decisions for public and private funds',
	        'job_type_id' => 1,
	        'location_id' => 3,
	        'author_id' => 2,
	    ]);

	    DB::table('jobs')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'expired_at' => Carbon\Carbon::now()->addMonths(1), //'2016-12-31',
	        'title' => 'Compliance Manager',
	        'recruiter_id' => 2,
	        'description' => 'The successful candidate will be responsible for liaison with regulators',
	        'job_type_id' => 1,
	        'location_id' => 3,
	        'author_id' => 3,
	    ]);

	    DB::table('jobs')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'expired_at' => Carbon\Carbon::now()->addMonths(1), //'2016-12-31',
	        'title' => 'Head of Compliance',
	        'recruiter_id' => 2,
	        'description' => 'The successful candidate will serve as the Head of Compliance for the company in Asia Pacific',
	        'job_type_id' => 1,
	        'location_id' => 3,
	        'author_id' => 3,
	    ]);
    }
}
