@extends('layout')

@section('title')
  CinéAcademy - Liste des réalisateurs
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
          <a href="index.html">Réalisateurs</a>
        </li>
        <li class="crumb-trail">Liste des réalisateurs</li>
      </ol>
    </div>
  </header>
  <!-- End: Topbar -->

  @foreach($directors as $director)
    <div class="modal fade" id="bio{{ $director['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Biographie</h4>
          </div>
          <div class="modal-body">
            {!! $director['biography'] !!}
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
              <th class="">Photo</th>
              <th class="">Nom</th>
              <th class="">Date de naissance</th>
              <th class="">Biographie</th>
              <th class="">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($directors as $director)
            <tr>
              <td class="w100">
                <a class="fancybox" rel="group" href="{{ $director['image'] }}">
                  <img class="img-responsive mw40 ib mr10" title="{{ $director['firstname'] }} {{ $director['lastname'] }}" src="{{ $director['image'] }}">
                </a>
              </td>
              <td class="">{{ $director['firstname'] }} {{ $director['lastname'] }}</td>
              <td class="">{{ $director['dob'] }}</td>
              <td>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#bio{{ $director['id'] }}">
                  Biographie
                </button>
              </td>
              <td>
                <a href="{{ route('removeDirector', ['id' => $director['id']]) }}" class="btn btn-danger btn-xs">
                  Supprimer
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
</section>

@endsection
