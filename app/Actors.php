<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Actors extends Model
{
  protected $table = "actors";

  public static function getTopActors()
  {
    return DB::table('actors_movies')
            ->join('actors', 'actors.id', '=', 'actors_movies.actors_id')
            ->groupBy('actors.id')
            ->orderBy(DB::raw('count(actors_movies.movies_id)'), 'desc')
            ->select('actors.*')
            ->take(3)
            ->get();
  }

  public static function getLastActors()
  {
    return DB::table('actors')
              ->orderBy('dob', 'desc')
              ->take(6)
              ->get();
  }
}
