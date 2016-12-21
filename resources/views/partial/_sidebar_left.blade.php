<!-- Start: Sidebar -->
<aside id="sidebar_left" class="nano nano-light affix">

  <!-- Start: Sidebar Left Content -->
  <div class="sidebar-left-content nano-content">

    <!-- Start: Sidebar Header -->
    <header class="sidebar-header">

      <!-- Sidebar Widget - Menu (Slidedown) -->
      <div class="sidebar-widget menu-widget">
        <div class="row text-center mbn">
          <div class="col-xs-4">
            <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
              <span class="glyphicon glyphicon-home"></span>
            </a>
          </div>
          <div class="col-xs-4">
            <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
              <span class="glyphicon glyphicon-inbox"></span>
            </a>
          </div>
          <div class="col-xs-4">
            <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
              <span class="glyphicon glyphicon-bell"></span>
            </a>
          </div>
          <div class="col-xs-4">
            <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
              <span class="fa fa-desktop"></span>
            </a>
          </div>
          <div class="col-xs-4">
            <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="fa fa-gears"></span>
            </a>
          </div>
          <div class="col-xs-4">
            <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
              <span class="fa fa-flask"></span>
            </a>
          </div>
        </div>
      </div>

      <!-- Sidebar Widget - Author (hidden)  -->
      <div class="sidebar-widget author-widget hidden">
        <div class="media">
          <a class="media-left" href="#">
            <img src="assets/img/avatars/3.jpg" class="img-responsive">
          </a>
          <div class="media-body">
            <div class="media-links">
               <a href="#" class="sidebar-menu-toggle">User Menu -</a> <a href="pages_login(alt).html">Logout</a>
            </div>
            <div class="media-author">Michael Richards</div>
          </div>
        </div>
      </div>

      <!-- Sidebar Widget - Search (hidden) -->
      <div class="sidebar-widget search-widget hidden">
        <div class="input-group">
          <span class="input-group-addon">
            <i class="fa fa-search"></i>
          </span>
          <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
        </div>
      </div>

    </header>
    <!-- End: Sidebar Header -->

    <!-- Start: Sidebar Menu -->
    <ul class="nav sidebar-menu">
      <li class="sidebar-label pt20">Dashboard</li>
      <li class="{{ Route::currentRouteName() === 'accueil' ? 'active' : '' }}">
        <a href="{{ route('accueil') }}">
          <span class="glyphicon glyphicon-home"></span>
          <span class="sidebar-title">Accueil</span>
        </a>
      </li>
      <li class="{{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}">
          <span class="glyphicon glyphicon-dashboard"></span>
          <span class="sidebar-title">Dashboard</span>
        </a>
      </li>
      <li class="sidebar-label pt15">Gestion des données</li>
      <li>
        <a class="accordion-toggle {{ strpos(Route::currentRouteName(), 'Movie') != false ? 'menu-open' : '' }}" href="#">
          <span class="fa fa-film"></span>
          <span class="sidebar-title">Films</span>
          <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
          <li class="{{ Route::currentRouteName() === 'indexMovie' ? 'active' : '' }}">
            <a href="{{ route('indexMovie') }}">
              <span class="glyphicon glyphicon-list"></span>
              Liste des films
              <span class="caret"></span>
            </a>
          </li>
          <li class="{{ Route::currentRouteName() === 'createMovie' ? 'active' : '' }}">
            <a href="{{ route('createMovie') }}">
              <span class="glyphicon glyphicon-film"></span>
              Ajouter un film
              <span class="caret"></span>
            </a>
          </li>
          <li class="{{ Route::currentRouteName() === 'updateMovie' ? 'active' : '' }}">
            <a href="{{ route('updateMovie') }}">
              <span class="glyphicon glyphicon-edit"></span>
              Mettre à jour une fiche
              <span class="caret"></span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a class="accordion-toggle {{ strpos(Route::currentRouteName(), 'Actor') != false ? 'menu-open' : '' }}" href="#">
          <span class="fa fa-user"></span>
          <span class="sidebar-title">Acteurs</span>
          <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
          <li class="{{ Route::currentRouteName() === 'indexActor' ? 'active' : '' }}">
              <a href="{{ route('indexActor') }}">
              <span class="glyphicon glyphicon-list"></span>
              Liste des acteurs
              <span class="caret"></span>
            </a>
          </li>
          <li class="{{ Route::currentRouteName() === 'createActor' ? 'active' : '' }}">
            <a href="{{ route('createActor') }}">
              <span class="glyphicon glyphicon-film"></span>
              Ajouter un acteur
              <span class="caret"></span>
            </a>
          </li>
          <li class="{{ Route::currentRouteName() === 'updateActor' ? 'active' : '' }}">
              <a href="{{ route('updateActor') }}">
              <span class="glyphicon glyphicon-edit"></span>
              Mettre à jour une fiche
              <span class="caret"></span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a class="accordion-toggle {{ strpos(Route::currentRouteName(), 'Director') != false ? 'menu-open' : '' }}" href="#">
          <span class="fa fa-video-camera"></span>
          <span class="sidebar-title">Realisateurs</span>
          <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
          <li class="{{ Route::currentRouteName() === 'indexDirector' ? 'active' : '' }}">
            <a href="{{ route('indexDirector') }}">
              <span class="glyphicon glyphicon-list"></span>
              Liste des réalisateurs
              <span class="caret"></span>
            </a>
          </li>
          <li class="{{ Route::currentRouteName() === 'cretaeDirector' ? 'active' : '' }}">
            <a href="{{ route('createDirector') }}">
              <span class="glyphicon glyphicon-film"></span>
              Ajouter un réalisateur
              <span class="caret"></span>
            </a>
          </li>
          <li class="{{ Route::currentRouteName() === 'updateDirector' ? 'active' : '' }}">
            <a href="{{ route('updateDirector') }}">
              <span class="glyphicon glyphicon-edit"></span>
              Mettre à jour une fiche
              <span class="caret"></span>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a class="accordion-toggle {{ strpos(Route::currentRouteName(), 'Categories') != false ? 'menu-open' : '' }}" href="#">
          <span class="fa fa-folder-open"></span>
          <span class="sidebar-title">Catégories</span>
          <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
          <li class="{{ Route::currentRouteName() === 'indexCategories' ? 'active' : '' }}">
            <a href="{{ route('indexCategories') }}">
              <span class="glyphicon glyphicon-list"></span>
              Liste des catégories
              <span class="caret"></span>
            </a>
          </li>
          <li class="{{ Route::currentRouteName() === 'createCategories' ? 'active' : '' }}">
            <a href="{{ route('createCategories') }}">
              <span class="glyphicon glyphicon-film"></span>
              Ajouter une catégorie
              <span class="caret"></span>
            </a>
          </li>
          <li class="{{ Route::currentRouteName() === 'updateCategories' ? 'active' : '' }}">
            <a href="{{ route('updateCategories') }}">
              <span class="glyphicon glyphicon-edit"></span>
              Mettre à jour une fiche
              <span class="caret"></span>
            </a>
          </li>
        </ul>
      </li>

      <!-- sidebar progress bars -->
      <li class="sidebar-label pt25 pb10">User Stats</li>
      <li class="sidebar-stat">
        <a href="#projectOne" class="fs11">
          <span class="fa fa-inbox text-info"></span>
          <span class="sidebar-title text-muted">Email Storage</span>
          <span class="pull-right mr20 text-muted">35%</span>
          <div class="progress progress-bar-xs mh20 mb10">
            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
              <span class="sr-only">35% Complete</span>
            </div>
          </div>
        </a>
      </li>
      <li class="sidebar-stat">
        <a href="#projectOne" class="fs11">
          <span class="fa fa-dropbox text-warning"></span>
          <span class="sidebar-title text-muted">Bandwidth</span>
          <span class="pull-right mr20 text-muted">58%</span>
          <div class="progress progress-bar-xs mh20">
            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 58%">
              <span class="sr-only">58% Complete</span>
            </div>
          </div>
        </a>
      </li>
    </ul>
    <!-- End: Sidebar Menu -->

    <!-- Start: Sidebar Collapse Button -->
    <div class="sidebar-toggle-mini">
      <a href="#">
        <span class="fa fa-sign-out"></span>
      </a>
    </div>
    <!-- End: Sidebar Collapse Button -->

  </div>
  <!-- End: Sidebar Left Content -->

</aside>
