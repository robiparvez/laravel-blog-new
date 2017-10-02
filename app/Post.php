<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
	singular name as the id is named
	as 'category_id' in posts table...
	may cause confusion
	 */

class Post extends Model
{

	//Category relationship
	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	/*Tag relationship*/
	public function tags()
	{
		return $this->belongstoMany('App\Tag','post_tag','post_id','tag_id');
	}

}

