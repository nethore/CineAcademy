@extends('layout')

@section('title')
  @parent - Ajouter un film
@endsection

@section('js')
  @parent
  <script src="{{ asset('admin-tools/admin-forms/js/jquery-ui-monthpicker.min.js') }}"></script>
  <script src="{{ asset('admin-tools/admin-forms/js/jquery-ui-datepicker.min.js') }}"></script>
  <script src="{{ asset('admin-tools/admin-forms/js/jquery.spectrum.min.js') }}"></script>
  <script src="{{ asset('admin-tools/admin-forms/js/jquery.stepper.min.js') }}"></script>

  <script>
  $(document).ready(function() {
     // Stuff to do as soon as the DOM is ready
     $('.inline-tp').timepicker();

    $('#timepicker').timepicker({
       showOn: 'both',
       buttonText: '<i class="fa fa-clock-o"></i>',
       beforeShow: function(input, inst) {
         var newclass = 'admin-form';
         var themeClass = $(this).parents('.admin-form').attr('class');
         var smartpikr = inst.dpDiv.parent();
         if (!smartpikr.hasClass(themeClass)) {
           inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
         }
       }
     });
   });
  </script>
@endsection

@section('css')
  @parent
  <link rel="stylesheet" type="text/css" href="{{ asset('admin-tools/admin-forms/css/admin-forms.css') }}">
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
          <a href="{{ route('createMovie') }}">Ajouter un film</a>
        </li>
      </ol>
    </div>
  </header>
  <!-- End: Topbar -->
  <section id="content" class="table-layout">
  <div class="tray tray-center">

    <div class="center-block mw800">
      <!-- Begin: Admin Form -->
      <div class="admin-form theme-warning">

        <form method="post" action="{{ route('createMovie') }}" id="form-ui">

        {{ csrf_field() }}
        
        <div class="panel heading-border panel-warning">
          <div class="panel-body bg-light">
              <div class="section-divider mb40" id="spy1">
                <span>Informations principales</span>
              </div>
              <!-- .section-divider -->

              <!-- Basic Inputs -->
              <div class="row">
                <div class="col-md-4">
                  <div class="section">
                    <label class="field select">
                      <select id="type" name="type">
                        <option value="" selected disabled>Type de film</option>
                        <option value="long">Long métrage</option>
                        <option value="court">Court métrage</option>
                      </select>
                      <i class="arrow"></i>
                    </label>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="section">
                    <label class="field">
                      <input type="text" name="titre" id="titre" class="gui-input" placeholder="Titre du film">
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">

                <div class="col-md-3">
                  <div class="section">
                    <label for="timepicker2" class="field prepend-picker-icon">
                          <input type="text" id="timepicker" name="timepicker2" class="gui-input hasDatepicker" placeholder="Durée du film"><button type="button" class="ui-datepicker-trigger"><i class="fa fa-clock-o"></i></button>
                        </label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="section">
                    <label class="field prepend-icon">
                      <input type="text" name="date_release" id="date_release" class="gui-input" placeholder="Date de sortie">
                      <label for="date_release" class="field-icon">
                        <i class="fa fa-calendar-o"></i>
                      </label>
                    </label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="section">
                    <label class="block mt10 switch switch-primary">
                      <input type="checkbox" name="cover" id="cover" value="cover">
                      <label for="cover" data-on="OUI" data-off="NON"></label>
                      <span>En couverture</span>
                    </label>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="section">
                    <label class="block mt10 switch switch-primary">
                      <input type="checkbox" name="visible" id="visible" value="visible" checked>
                      <label for="visible" data-on="OUI" data-off="NON"></label>
                      <span>Visible</span>
                    </label>
                  </div>
                </div>
              </div>

              <!-- end .form-footer section -->

              <div class="section-divider mb40" id="spy1">
                <span>Informations presse</span>
              </div>
              <!-- .section-divider -->

              <!-- Basic Inputs -->
              <div class="row">
                <div class="col-md-4">
                  <div class="section">
                    <span class="rating block">
                          <span class="lbl-text">Note presse</span>
                          <input class="rating-input" id="r5" type="radio" value="5" name="note_presse">
                          <label class="rating-star" for="r5">
                            <i class="fa fa-star"></i>
                          </label>
                          <input class="rating-input" id="r4" type="radio" value="4" name="note_presse">
                          <label class="rating-star" for="r4">
                            <i class="fa fa-star"></i>
                          </label>
                          <input class="rating-input" id="r3" type="radio" value="3" name="note_presse">
                          <label class="rating-star" for="r3">
                            <i class="fa fa-star"></i>
                          </label>
                          <input class="rating-input" id="r2" type="radio" value="2" name="note_presse">
                          <label class="rating-star" for="r2">
                            <i class="fa fa-star"></i>
                          </label>
                          <input class="rating-input" id="r1" type="radio" value="1" name="note_presse">
                          <label class="rating-star" for="r1">
                            <i class="fa fa-star"></i>
                          </label>
                        </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="section">
                    <label class="field prepend-icon">
                      <textarea class="gui-textarea" id="synopsis" name="synopsis" placeholder="Synopsis"></textarea>
                      <label for="synopsis" class="field-icon">
                        <i class="fa fa-pencil"></i>
                      </label>
                      <span class="input-footer">
                        <strong>Conseil:</strong>N'utilisez pas de mise ne page ou de liens dans le synopsis</span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="section">
                    <label class="field prepend-icon">
                      <textarea class="gui-textarea" id="description" name="description" placeholder="Description"></textarea>
                      <label for="description" class="field-icon">
                        <i class="fa fa-pencil"></i>
                      </label>
                      <span class="input-footer">
                        <strong>Conseil:</strong>Vous pouvez utiliser du html</span>
                    </label>
                  </div>
                </div>
              </div>

              <!-- end .form-footer section -->

              <div class="section-divider mb40" id="spy1">
                <span>Fiche technique</span>
              </div>
              <!-- .section-divider -->

              <!-- Basic Inputs -->
              <div class="row">
                <div class="col-md-6">
                  <div class="section">
                    <label class="field">
                      <input type="text" name="image" id="image" class="gui-input" placeholder="Url de l'affiche">
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="section">
                    <label class="field">
                      <input type="text" name="trailer" id="trailer" class="gui-input" placeholder="Url du trailer">
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="section">
                    <label class="field select">
                      <select id="langue" name="langue">
                        <option value="" selected disabled>Langue du film</option>
                        <option value="fr">Français</option>
                        <option value="en">Anglais</option>
                      </select>
                      <i class="arrow"></i>
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="section">
                    <label class="field select">
                      <select id="BO" name="BO">
                        <option value="" selected disabled>Sous-titrage</option>
                        <option value="vo">VO</option>
                        <option value="vost">VOST</option>
                        <option value="vf">VF</option>
                      </select>
                      <i class="arrow"></i>
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="section">
                    <label class="field">
                      <input type="text" name="distributeur" id="distributeur" class="gui-input" placeholder="Distributeur">
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="section">
                    <label class="field">
                      <input type="text" name="budget" id="budget" class="gui-input" placeholder="Budget en $">
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="section">
                    <label class="field">
                      <input type="text" name="annee" id="annee" class="gui-input" placeholder="Année de production">
                    </label>
                  </div>
                </div>
              </div>
              <!-- end .form-footer section -->
          </div>
          <div class="panel-footer text-right">
            <button type="submit" class="button btn-primary"> Enregistrer le film </button>
          </div>
        </div>
      </form>

      </div>

    </div>
  </div>
  <aside class="tray tray-right tray220 p20" style="height: 766px;">

    <div class="tray-scroller scroller scroller-active" style="height: 726px;"><div class="scroller-bar" style="height: 726px;"><div class="scroller-track" style="height: 726px; margin-bottom: 0px; margin-top: 0px;"><div class="scroller-handle" style="height: 470.184px; top: 0px;"></div></div></div><div class="scroller-content">

      <h4> Aide </h4>
      <hr class="alt short">
      <p class="text-muted"> Lorem ipsum dolor sit amet,  is nisi ut aliquip ex ea commodo consectetur adipi sicing elit, sed do eiusmod tempor incididu ut labore et is nisi ut aliquip ex ea commodo dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exetation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

    </div></div>

  </aside>
</section>
@endsection
