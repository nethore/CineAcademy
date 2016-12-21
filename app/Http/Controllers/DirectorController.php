<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Directors;

class DirectorController extends Controller
{
  public function index() {
    $directors = Directors::all();

    return view('director/index', [
      'directors' => $directors
    ]);  }

  public function create() {
    return view('director/create');
  }

  public function update() {
    return view('director/update');
  }

  public function remove($id) {

    $director = Directors::find($id);
    $director->delete();

    return redirect()->back();
  }
}
