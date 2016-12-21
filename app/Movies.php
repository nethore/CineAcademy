<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Movies extends Model
{
  /**
   * Attribut qui precise le nom de la table référente à la base de donnée
   */
  protected $table = "movies";

  public static function getNbrNotes($note)
  {
    return DB::table('movies')
              ->where('note_presse', $note)
              ->count();
  }

  public static function getNbrActiveMovies()
  {
    return DB::table('movies')
              ->where('visible', 1)
              ->count();
  }

  public static function getSumBudget()
  {
    return DB::table('movies')
              ->sum('budget');
  }

  public static function getAvgLength()
  {
    return DB::table('movies')
              ->avg('duree');
  }

  public static function getLastFilms()
  {
    return DB::table('movies')
              ->orderBy('date_release', 'desc')
              ->take(6)
              ->get();
  }

  public function categories()
  {
      return $this->belongsTo('App\Categories');
  }
  public function tags()
  {
      return $this->belongsToMany('App\Tags', 'tags_movies');
  }
  public function directors()
  {
      return $this->belongsToMany('App\Directors');
  }

  public function actors()
  {
      return $this->belongsToMany('App\Actors');
  }

}
