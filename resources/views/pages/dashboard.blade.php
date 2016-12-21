@extends('layout')

@section('title')
  @parent - Dashboard
@endsection

@section('js')
  @parent
  <script src="{{ asset('vendor/plugins/highcharts/highcharts.js') }}"></script>
  <script type="text/javascript">
  $(document).ready(function() {
     // Stuff to do as soon as the DOM is ready

  var demoHighCharts = function () {

    // Define chart color patterns
    var highColors = [bgPrimary, bgInfo, bgAlert,
        bgSuccess, bgDanger, bgWarning, bgSystem, bgDark
    ];

    // Color Library we used to grab a random color
    var sparkColors = {
        "primary": [bgPrimary, bgPrimaryLr, bgPrimaryDr],
        "info": [bgInfo, bgInfoLr, bgInfoDr],
        "warning": [bgWarning, bgWarningLr, bgWarningDr],
        "success": [bgSuccess, bgSuccessLr, bgSuccessDr],
        "alert": [bgAlert, bgAlertLr, bgAlertDr]
    };

    // Pie Charts
    var demoHighPies = function() {

        var pie1 = $('#high-pie');

        if (pie1.length) {

            // Pie Chart1
            $('#high-pie').highcharts({
                credits: false,
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: null
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        center: ['30%', '50%'],
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                colors: highColors,
                legend: {
                    x: 90,
                    floating: true,
                    verticalAlign: "middle",
                    layout: "vertical",
                    itemMarginTop: 10
                },
                series: [{
                    type: 'pie',
                    name: 'Films ayant cette note',
                    data: [
                        ['0 étoile', {{ 100*$notes[0]/array_sum($notes) }}],
                        ['1 étoile', {{ 100*$notes[1]/array_sum($notes) }}],
                        ['2 étoiles', {{ 100*$notes[2]/array_sum($notes) }}],
                        ['3 étoiles', {{ 100*$notes[3]/array_sum($notes) }}],
                        ['4 étoiles', {{ 100*$notes[4]/array_sum($notes) }}],
                        ['5 étoiles', {{ 100*$notes[5]/array_sum($notes) }}]
                    ]
                }]
            });
        }
    } // End High Pie Charts Demo
    demoHighPies();
  }
  demoHighCharts();
});
  </script>
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

    <div class="row">
      <div class="col-md-4">
        <div class="panel">
            <div class="panel-heading">
              <span class="panel-title fw600 text-info">Pourcentage de notes reçues</span>
            </div>
            <div class="panel-body pn">
              <div id="high-pie" style="width: 100%; height: 210px; margin: 0 auto" data-highcharts-chart="6"></div>
            </div>
          </div>
      </div>
      <div class="col-md-4">
        <div class="panel">
            <div class="panel-heading">
              <span class="panel-title fw600 text-info">Acteurs les plus actifs</span>
            </div>
            <div class="panel-body pn">
              <div class="row pt10 pr20 pl20 topThree">
                <div class="col-md-4">
                  <p class="topActor">#1</p>
                  {{ substr($topActors[0]->firstname, 0, 1) }}. {{ $topActors[0]->lastname }}
                </div>
                <div class="col-md-4">
                  <p class="topActor">#2</p>
                  {{ substr($topActors[1]->firstname, 0, 1) }}. {{ $topActors[1]->lastname }}
                </div>
                <div class="col-md-4">
                  <p class="topActor">#3</p>{{ substr($topActors[2]->firstname, 0, 1) }}. {{ $topActors[2]->lastname }}
                </div>
              </div>
              <div class="row p20">
                <div class="col-md-4">
                  <img class="img-responsive" src="{{ $topActors[0]->image }}">
                </div>
                <div class="col-md-4">
                  <img class="img-responsive" src="{{ $topActors[1]->image }}">
                </div>
                <div class="col-md-4">
                  <img class="img-responsive" src="{{ $topActors[2]->image }}">
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-md-4">
        <div class="panel">
            <div class="panel-heading">
              <span class="panel-title fw600 text-info">Tags les plus utilisés</span>
            </div>
            <div class="panel-body pn p20">
              @foreach($topTags as $tag)
                <span class="label label-warning mr5 mb10 ib lh15">{{ $tag->word }}</span>
              @endforeach
            </div>
          </div>
          <div class="panel">
              <div class="panel-heading">
                <span class="panel-title fw600 text-info">Dernier commentaire</span>
              </div>
              <div class="panel-body pn p20">
                <blockquote>{{ $lastComment->content }}</blockquote>
                {{$lastComment->user->username}}
              </div>
            </div>
      </div>
    </div>
  </div>
</section>
@endsection
