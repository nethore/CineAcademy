@extends('layout')

@section('title')
  @parent - Liste des categories
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
          <a href="index.html">Catégories</a>
        </li>
        <li class="crumb-trail">Liste des catégories</li>
      </ol>
    </div>
  </header>
  <!-- End: Topbar -->

    <section id="content">

    <div class="table-layout animated fadeIn">

      <div class="row">
        @foreach($categories as $categorie)
          <div class="col-md-2 p20">
            <a href="#">
              <div class="shadow affiche">
                <div class="showLoupe">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </div>
                <img class="img-responsive" src="{{ $categorie->image }}">
              </div>
            </a>
          </div>
        @endforeach
      </div>

    </div>

</section>

@endsection
