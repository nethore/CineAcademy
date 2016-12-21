@extends('layout')

@section('title')
  @parent - Dashboard
@endsection

@section('js')
  @parent
@endsection

@section('content')
  <!-- Start: Topbar -->
  <header id="topbar" class="alt">
    <div class="topbar-left">
      <ol class="breadcrumb">
        <li class="crumb-active">
          <a href="dashboard.html">CinéAcademy</a>
        </li>
        <li class="crumb-icon">
          <a href="dashboard.html">
            <span class="glyphicon glyphicon-home"></span>
          </a>
        </li>
        <li class="crumb-link">
          Dashboard
        </li>
      </ol>
    </div>
  </header>
  <!-- End: Topbar -->
  <section id="content" class="table-layout animated fadeIn">

  <div class="tray tray-center">

    <!-- dashboard tiles -->
    <div class="row">
      <div class="col-sm-3">
        <div class="panel panel-tile bg-primary light">
          <div class="panel-body pn pl20 p5">
            <i class="fa fa-film icon-bg"></i>
            <h2 class="mt15 lh15">
              <b>{{ $nbrMovies }}</b>
            </h2>
            <h5 class="text-muted">Films</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="panel panel-tile bg-success light">
          <div class="panel-body pn pl20 p5">
            <i class="fa fa-comments-o icon-bg"></i>
            <h2 class="mt15 lh15">
              <b>{{ $nbrComments }}</b>
            </h2>
            <h5 class="text-muted">Commentaires</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="panel panel-tile bg-danger light">
          <div class="panel-body pn pl20 p5">
            <i class="fa fa-usd icon-bg"></i>
            <h2 class="mt15 lh15">
              <b>{{ number_format($sumBudget, 0, ',', ' ') }}</b> $
            </h2>
            <h5 class="text-muted">Budget total</h5>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="panel panel-tile bg-warning light">
          <div class="panel-body pn pl20 p5">
            <i class="fa fa-clock-o icon-bg"></i>
            <h2 class="mt15 lh15">
              <b>{{ gmdate("H:i", $avgLength*3600) }}</b>            </h2>
            <h5 class="text-muted">Durée moyenne</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{ dump($notes) }}
{{ dump(array_sum($notes)) }}

@endsection
