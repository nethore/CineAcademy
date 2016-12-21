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
}
