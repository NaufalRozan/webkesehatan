<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
  <title>PosyanduX</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <style>
    a {
      font-family: 'Nunito';
      font-size: 22px;
    }
  </style>
</head>



<body class="p-3 m-3 border-0 bd-example">


  <!-- Example Code -->

  <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="background-color: white; border-color: white">
    <img src="https://cdn-icons-png.flaticon.com/512/3114/3114889.png" alt="HTML tutorial" style="width: 19px; height: 19px" />
  </a>

  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <a href="/home" class="nav-link"><h5 class="offcanvas-title" id="offcanvasExampleLabel">Dashboard</h5></a>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="">
        <a href="/anak" class="nav-link" style="font-size: 16px">
          Data Anak
        </a>
        <a href="/echart" class="nav-link" style="font-size: 16px">
          Data Grafik
        </a>
      </div>
      <div class="dropdown mt-3">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: auto;">
          <img src="https://cdn-icons-png.flaticon.com/512/1534/1534039.png" alt="HTML tutorial" style="width: 19px; height: 19px" />
          {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu" style="">
          <a class="dropdown-item" style="font-size: 14px; width: auto;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
        </ul>
      </div>
    </div>
  </div>



  <!-- End Example Code -->
</body>

</html>