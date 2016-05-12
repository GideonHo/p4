<?php

use Illuminate\Database\Seeder;

class CandidatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
	    DB::table('candidates')->insert([
	    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'resume' => 'Curriculum Vitae (2015) - Gideon Ho.pdf',
	    'user_id' => 1,
	    ]);

	    DB::table('candidates')->insert([
	    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'resume' => 'Curriculum Vitae (2015) - Gideon Ho.pdf',
	    'user_id' => 2,
	    ]);

	    DB::table('candidates')->insert([
	    'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	    'resume' => 'Curriculum Vitae (2015) - Gideon Ho.pdf',
	    'user_id' => 3,
	    ]);

	}
}
