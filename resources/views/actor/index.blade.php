@extends('layout')

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
          <a href="index.html">Acteurs</a>
        </li>
        <li class="crumb-trail">Liste des acteurs</li>
      </ol>
    </div>
  </header>
  <!-- End: Topbar -->

  @foreach($actors as $actor)
    <div class="modal fade" id="bio{{ $actor['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Biographie</h4>
          </div>
          <div class="modal-body">
            {!! $actor['biography'] !!}
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
              <th class="">#</th>
              <th class="">Photo</th>
              <th class="">Nom</th>
              <th class="">Date de naissance</th>
              <th class="">Ville</th>
              <th class="">Nationalité</th>
              <th class="">Biographie</th>
            </tr>
          </thead>
          <tbody>
            @foreach($actors as $actor)
            <tr>
              <td class="">{{ $actor['id'] }}</td>
              <td class="w100">
                <a class="fancybox" rel="group" href="{{ $actor['image'] }}">
                  <img class="img-responsive mw40 ib mr10" title="{{ $actor['firstname'] }} {{ $actor['lastname'] }}" src="{{ $actor['image'] }}">
                </a>
              </td>
              <td class="">{{ $actor['firstname'] }} {{ $actor['lastname'] }}</td>
              <td class="">{{ $actor['dob'] }}</td>
              <td class="">{{ $actor['city'] }}</td>
              <td>{{ $actor['nationality'] }}</td>
              <td>
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#bio{{ $actor['id'] }}">
                  Biographie
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
