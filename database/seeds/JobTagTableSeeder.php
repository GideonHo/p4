<?php

use Illuminate\Database\Seeder;

class JobTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $jobs =[
	        'Chief Investment Officer' => ['Asset Management'],
	        'Investment Director' => ['Asset Management'],
	        'Investment Manager' => ['Asset Management'],
	        'Investment Analyst' => ['Asset Management']
	    ];

	    foreach($jobs as $title => $tags) {

	        $job = \App\Job::where('title','like',$title)->first();

	        foreach($tags as $tagName) {
	            $tag = \App\Tag::where('name','LIKE',$tagName)->first();

	            # Connect this tag to this book
	            $job->tags()->save($tag);
	        }

	    }
    }
}
