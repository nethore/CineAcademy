<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
  /**
   * Attribut qui precise le nom de la table référente à la base de donnée
   */
  protected $table = "movies";

  public function categories()
  {
      return $this->belongsTo('App\Categories');
  }

}
