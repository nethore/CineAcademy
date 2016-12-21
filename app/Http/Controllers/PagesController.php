<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Movies;
Use App\Comments;
Use App\Actors;
Use App\Tags;

class PagesController extends Controller
{
  public function dashboard() {
    $nbrMovies = Movies::getNbrActiveMovies();
    $sumBudget = Movies::getSumBudget();
    $avgLength = Movies::getAvgLength();
    $nbrComments = Comments::getNbrComments();
    $topActors = Actors::getTopActors();
    $topTags = Tags::getTags();
    $lastFilms = Movies::getLastFilms();
    $lastComment = Comments::getLastComment();

    $notes = [
      '0' => Movies::getNbrNotes(0),
      '1' => Movies::getNbrNotes(1),
      '2' => Movies::getNbrNotes(2),
      '3' => Movies::getNbrNotes(3),
      '4' => Movies::getNbrNotes(4),
      '5' => Movies::getNbrNotes(5)
    ];

    return view('pages/dashboard', [
      'nbrMovies' => $nbrMovies,
      'sumBudget' => $sumBudget,
      'nbrComments' => $nbrComments,
      'avgLength' => $avgLength,
      'topActors' => $topActors,
      'topTags' => $topTags,
      'lastFilms' => $lastFilms,
      'lastComment' => $lastComment,
      'notes' => $notes
    ]);
  }
  public function accueil() {

    $lastFilms = Movies::getLastFilms();
    $lastActors = Actors::getLastActors();


    return view('pages/accueil', [
      'lastFilms' => $lastFilms,
      'lastActors' => $lastActors,
    ]);
  }
}
