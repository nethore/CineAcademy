@extends('layout')

@section('title')
  CinéAcademy - Liste des films
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
          <a href="index.html">Films</a>
        </li>
        <li class="crumb-trail">Liste des films</li>
      </ol>
    </div>
  </header>
  <!-- End: Topbar -->

  @foreach($movies as $movie)
    <div class="modal fade" id="ba{{ $movie['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Bande annonce</h4>
          </div>
          <div class="modal-body">
            {!! $movie['trailer'] !!}
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="synopsis{{ $movie['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Synopsis</h4>
          </div>
          <div class="modal-body">
            {!! $movie['synopsis'] !!}
          </div>
        </div>
      </div>
    </div>
  @endforeach

  <section id="content" class="table-layout animated fadeIn">
    <div class="panel">
    <div class="panel-body pn">
      <div class="table-responsive">
        <table class="table admin-form theme-warning tc-checkbox-1 fs13">
          <thead>
            <tr class="bg-light">
              <th class="">Affiche</th>
              <th class="">Titre</th>
              <th class="">Note</th>
              <th class="">Année</th>
              <th class="">Type</th>
              <th class="">Catégorie</th>
              <th class="">Budget</th>
              <th class="">Bande annonce</th>
              <th class="">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($movies as $movie)
            <tr>
              <td class="w100">
                <a class="fancybox" rel="group" href="{{ $movie['image'] }}">
                  <img class="img-responsive mw40 ib mr10" title="{{ $movie['title'] }}" src="{{ $movie['image'] }}">
                </a>
              </td>
              <td class=""><a href="#" data-toggle="modal" data-target="#synopsis{{ $movie['id'] }}">{{ $movie['title'] }}</td>
              <td class="">{!! str_repeat('<i class="fa fa-star" aria-hidden="true"></i>', $movie['note_presse']) !!}</td>
              <td class="">{{ $movie['annee'] }}</td>
              <td class="">{{ $movie['type'] }}</td>
              <td class="">{{ $movie->categories->title }}</td>
              <td class="align-right">{{ $movie['budget'] }} $</td>
              <td>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ba{{ $movie['id'] }}">
                  Voir la BA
                </button>
              </td>
              <td>
                <a href="{{ route('removeMovie', [
                  'id' => $movie['id']]) }}" class="btn btn-danger btn-xs">
                  Supprimer
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</section>

@endsection
