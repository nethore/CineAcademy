<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;


class Comments extends Model
{
  protected $table = "comments";

  public static function getNbrComments()
  {
    return DB::table('comments')
              ->where('state', '>', 0)
              ->count();
  }

  public static function getLastComment()
  {
    return Comments::where('state', '>', 0)
              ->orderBy('created_at', 'desc')
              ->first();
  }
  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
