<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;

class MovieController extends Controller
{
    public function index() {
      $movies = Movies::all();

      return view('movie/index', [
        'movies' => $movies
      ]);
    }

    public function show($id) {
      $movie = Movies::find($id);

      return view('movie/show', [
        'movie' => $movie
      ]);
    }

    public function create() {
      return view('movie/create');
    }

    public function update() {
      return view('movie/update');
    }

    public function remove($id) {

      $movie = Movies::find($id);
      $movie->delete();

      return redirect()->back();
    }
}
