<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tags extends Model
{
  protected $table = "tags";

  public static function getTags()
  {
    return DB::table('tags_movies')
            ->join('tags', 'tags.id', '=', 'tags_movies.tags_id')
            ->groupBy('tags.id')
            ->orderBy(DB::raw('count(tags_movies.movies_id)'), 'desc')
            ->select('tags.*')
            ->get();
  }

}
