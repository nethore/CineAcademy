<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actors;

class ActorController extends Controller
{
  public function index() {

    $actors = Actors::all();

    return view('actor/index', [
      'actors' => $actors
    ]);

  }

  public function create() {
    return view('actor/create');
  }

  public function update() {
    return view('actor/update');
  }

  public function remove() {
    return view('actor/remove');
  }}
