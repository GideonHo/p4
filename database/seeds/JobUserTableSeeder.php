<?php

use Illuminate\Database\Seeder;

class JobUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('job_user')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'applied' => 1,
	        'saved' => 1,
	        'viewed' => 1,
	        'job_id' => 2,
	        'user_id' =>1,
	    ]);

		DB::table('job_user')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'applied' => 1,
	        'saved' => 1,
	        'viewed' => 1,
	        'job_id' => 2,
	        'user_id' =>2,
	    ]);

		DB::table('job_user')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'applied' => 1,
	        'saved' => 1,
	        'viewed' => 1,
	        'job_id' => 2,
	        'user_id' =>3,
	    ]);

	    DB::table('job_user')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'applied' => 1,
	        'saved' => 1,
	        'viewed' => 1,
	        'job_id' => 3,
	        'user_id' =>1,
	    ]);

		DB::table('job_user')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'applied' => 1,
	        'saved' => 1,
	        'viewed' => 1,
	        'job_id' => 3,
	        'user_id' =>2,
	    ]);

		DB::table('job_user')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(), //'2016-03-31',
	        'applied' => 1,
	        'saved' => 1,
	        'viewed' => 1,
	        'job_id' => 3,
	        'user_id' =>3,
	    ]);
    }
}
