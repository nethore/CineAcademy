@extends('layout')

@section('title')
  @parent - {{ $movie['title'] }}
@endsection

@section('js')
  @parent
@endsection

@section('css')
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
          Films
        </li>
        <li class="crumb-link">
          <a href="{{ route('indexMovie') }}">Liste des films</a>
        </li>
        <li class="crumb-trail">{{ $movie['title'] }}</li>
      </ol>
    </div>
  </header>
  <!-- End: Topbar -->

  <!-- Begin: Content -->
  <section id="content" class="animated fadeIn">

    <!-- Begin .page-heading -->
    <div class="page-heading">
        <div class="media clearfix">
          <div class="media-left pr30">
            <div class="shadow">
              <a class="fancybox" rel="group" href="{{ $movie['image'] }}">
                <img class="img-responsive mw100" src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}">
              </a>
            </div>
          </div>
          <div class="media-body va-m">
            <h2 class="media-heading">{{ $movie['title'] }}
              <small> - {{ $movie['annee'] }}</small>
            </h2>
            <p class="lead">{{ $movie['type'] }} - {{ $movie->categories->title }}</p>
            <div class="media-links">
              {!! str_repeat('<i style="font-size:2rem; color:#F5B025;" class="fa fa-star" aria-hidden="true"></i> ', $movie['note_presse']) !!}
              {!! str_repeat('<i style="font-size:2rem; color:#e2e2e2;" class="fa fa-star" aria-hidden="true"></i> ', 5-$movie['note_presse']) !!}
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-pencil"></i>
              </span>
              <span class="panel-title"> Informations</span>
            </div>
            <div class="panel-body pn">
              <table class="table mbn tc-med-2 tc-bold-last">
                <tbody>
                  <tr>
                    <td>Date de sortie</td>
                    <td>
                      {{  Carbon\Carbon::parse($movie['date_release'])->format('d/m/Y') }}</td>
                  </tr>
                  <tr>
                    <td>Budget</td>
                    <td>
                      {{ number_format($movie['budget'], 0, ',', ' ') }} $
                      </td>
                  </tr>
                  <tr>
                    <td>Distributeur</td>
                    <td>
                      {{ $movie['distributeur'] }}
                    </td>
                  </tr>
                  <tr>
                    <td>Réalisateur(s)</td>
                    <td>
                      @foreach($movie->directors as $director)
                        {{ $director['firstname'] }} {{ $director['lastname'] }}
                      @endforeach
                    </td>
                  </tr>
                  <tr>
                    <td>Langue</td>
                    <td>
                      @if($movie['languages'] == 'fr')
                        <img class="img-responsive mw30 ib mr10" src="https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg">
                      @else
                        <img class="img-responsive mw30 ib mr10" src="https://upload.wikimedia.org/wikipedia/en/a/a4/Flag_of_the_United_States.svg">
                      @endif
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-trophy"></i>
              </span>
              <span class="panel-title"> Tags du film</span>
            </div>
            <div class="panel-body pb5">
              @foreach($movie->tags as $tag)
                <span class="label label-info mr5 mb10 ib lh15">{{ $tag['word'] }}</span>
              @endforeach
            </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <span class="panel-icon">
                <i class="fa fa-user"></i>
              </span>
              <span class="panel-title">Acteurs</span>
            </div>
            <div class="panel-body pb5">
              @foreach ($movie->actors as $actor)
              <div class="row">
                <div class="col-md-3">
                  <img class="img-responsive mw60 ib mr10" src="{{ $actor['image'] }}">
                </div>
                <div class="col-md-9">
                  <h4>{{ $actor['firstname'] }} {{ $actor['lastname'] }}</h4>
                  <p class="text-muted pb10" style="font-size: 11px;">
                    {{ substr(strip_tags($actor['biography']), 0, 100) }}...
                  </p>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-md-8">

          <div class="tab-block">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab1" data-toggle="tab">Synopsis</a>
              </li>
              <li>
                <a href="#tab2" data-toggle="tab">Description</a>
              </li>
              <li>
                <a href="#tab3" data-toggle="tab">Trailer</a>
              </li>
            </ul>
            <div class="tab-content p30">
              <div id="tab1" class="tab-pane active">
                {!! $movie['synopsis'] !!}
              </div>
              <div id="tab2" class="tab-pane">
                {!! $movie['description'] !!}
              </div>
              <div id="tab3" class="tab-pane">
                {!! $movie['trailer'] !!}
              </div>
              <div id="tab4" class="tab-pane"></div>
            </div>
          </div>
        </div>
      </div>

  </section>
  <!-- End: Content -->

@endsection
