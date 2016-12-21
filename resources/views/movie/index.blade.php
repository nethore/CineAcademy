@extends('layout')

@section('title')
  @parent - Liste des films
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

    <section id="content">

    <div class="table-layout animated fadeIn">

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
              <th class="">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($movies as $movie)
            <tr>
              <td class="w100">
                <a class="fancybox" rel="group" href="{{ $movie['image'] }}">
                  <img class="img-responsive mw40 ib mr10 shadow" title="{{ $movie['title'] }}" src="{{ $movie['image'] }}">
                </a>
              </td>
              <td class=""><a href="{{ route('showMovie', ['id' => $movie['id']]) }}">{{ $movie['title'] }}</td>
              <td class="">
                {!! str_repeat('<i style="color:#F5B025;" class="fa fa-star" aria-hidden="true"></i> ', $movie['note_presse']) !!}
                {!! str_repeat('<i style="color:#e2e2e2;" class="fa fa-star" aria-hidden="true"></i> ', 5-$movie['note_presse']) !!}
              </td>
              <td class="">{{ $movie['annee'] }}</td>
              <td class="">{{ $movie['type'] }}</td>
              <td class="">{{ $movie->categories->title }}</td>
              <td class="align-right">
                @if($movie['budget'] > 0)
                {{ $movie['budget'] }} $
                @else
                  Non renseigné
                @endif
              </td>
              <td class="text-center">
                <a href="{{ route('showMovie', ['id' => $movie['id']]) }}" class="btn btn-info btn-md">
                  <i style="font-size:1.5rem;" class="fa fa-eye" aria-hidden="true"></i>
                </a>
                <a href="{{ route('showMovie', ['id' => $movie['id']]) }}" class="btn btn-success btn-md">
                  <i style="font-size:1.5rem;" class="fa fa-pencil" aria-hidden="true"></i>
                </a>
                <a href="{{ route('removeMovie', ['id' => $movie['id']]) }}" class="btn btn-danger btn-md">
                  <i style="font-size:1.5rem;" class="fa fa-trash" aria-hidden="true"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>

</section>

@endsection
