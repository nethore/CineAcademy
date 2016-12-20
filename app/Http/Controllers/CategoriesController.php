<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class CategoriesController extends Controller
{
  public function index() {

    $categories = Categories::all();

    return view('categories/index', [
      'categories' => $categories
    ]);

  }

  public function create() {
    return view('categories/create');
  }

  public function update() {
    return view('categories/update');
  }

  public function remove() {
    return view('categories/remove');
  }
}
