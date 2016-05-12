<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	public function jobs() {
	    return $this->belongsToMany('\App\Job')->withTimestamps();
	}

	public static function getTagsForCheckboxes() {

	    $tags = \App\Tag::orderBy('name','ASC')->get();

	    $tagsForCheckboxes = [];

        foreach($tags as $tag) {
            $tags_for_checkboxes[$tag['id']] = $tag['name'];
        }

	    return $tags_for_checkboxes;

	}
}
