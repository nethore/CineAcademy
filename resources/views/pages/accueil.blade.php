@extends('layout')

@section('title')
  @parent - Accueil
@endsection

@section('js')
  @parent

@endsection

@section('content')
  <!-- Start: Topbar -->
  <!-- End: Topbar -->
  <section id="content" class="table-layout animated fadeIn">

  <div class="tray tray-center">

    <!-- dashboard tiles -->
    <div class="row">
      <p class="pl20 titleCA"><i class="fa fa-ticket" aria-hidden="true"></i> <b>Ciné</b>Academy</p>
    </div>
    <div class="row">
      <h4 class="pl20">Dernières sorties <a href="{{ route('indexMovie') }}">(Voir tous les films)</a></h4>
      @foreach($lastFilms as $movie)
      <div class="col-md-2 p20">
        <a href="{{ route('showMovie', ['id' => $movie->id]) }}">
          <div class="shadow affiche">
            @if($movie->cover >= 1)
              <div class="newBadge coverBadge">
                <i class="fa fa-star" aria-hidden="true"></i>
              </div>
            @endif
            @if(\Carbon\Carbon::parse($movie->date_release) > \Carbon\Carbon::now()->subMonth())
              <div class="newBadge">
                <i class="fa fa-ticket" aria-hidden="true"></i>
              </div>
            @endif
            <div class="showLoupe">
              <i class="fa fa-eye" aria-hidden="true"></i>
            </div>
            <img class="img-responsive" src="{{ $movie->image }}">
          </div>
        </a>
      </div>
      @endforeach
    </div>
    <div class="row">
      <h4 class="pl20">Derniers acteurs <a href="{{ route('indexActor') }}">(Voir tous les acteurs)</a></h4>
      @foreach($lastActors as $actor)
      <div class="col-md-2 p20">
        <a href="#">
          <div class="shadow affiche">
            <div class="showLoupe">
              <i class="fa fa-eye" aria-hidden="true"></i>
              <p>{{ $actor->firstname }} {{ $actor->lastname }}</p>
            </div>
            <img class="img-responsive" src="{{ $actor->image }}">
          </div>
        </a>
      </div>
      @endforeach
    </div>

  </div>
</section>
@endsection
