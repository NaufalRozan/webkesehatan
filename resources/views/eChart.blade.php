@extends('layouts.app')
@include('layouts.sidebar')
@section('content')
<html>

<head>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(piechart);

    function drawChart() {
      var data1 = google.visualization.arrayToDataTable([
        ['Ket', 'Jumlah Anak'],
        <?php echo $data ?>
      ]);

      var options = {
        title: 'Lingkar Kepala',
        is3D: true,
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
      chart.draw(data1, options);
    }
  </script>
</head>

<body>
  <div class="col-4 my-3">
    <h1>Grafik Data Anak</h1>
  </div>
  <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  <button style="margin-left:16px" onClick="window.location.href='http://127.0.0.1:8000/achart';">
    Chart Berat Badan
  </button>
  <button style="margin-left:550px" onClick="window.location.href='http://127.0.0.1:8000/xchart';">
    Chart Tinggi Badan
  </button>
</body>

</html>