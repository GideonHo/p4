<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JobTypesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(RecruitersTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(JobTagTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(JobUserTableSeeder::class);
        $this->call(CandidatesTableSeeder::class);
    }
}
