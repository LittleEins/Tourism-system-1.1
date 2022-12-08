@include('inc.user-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('map.view')}}">
          <i class="bi bi-geo-alt-fill"></i>
          <span>Map</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.user-sidebar');
  </aside><!-- End Sidebar-->
  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Map</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('map.view')}}">Map</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="container-flued">
          <!-- Map -->
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="card-title">
                  <h4 id="mapHover">Locations</h4>
                  <div class="map_table">
                    @for($i=0;$i < $count; $i++)
                    @if ($location[$i]->type == "2")
                        <a href="#" id="{{ strtok($location[$i]->name," ") }}" class="loc_btn btn" style="color: white; background: blue;">{{ $location[$i]->name }}</a>
                      @endif
                      @if ($location[$i]->type == "0")
                        <a href="#" id="{{ strtok($location[$i]->name," ") }}" class="loc_btn btn" style="color: white; background: skyblue;">{{ $location[$i]->name }}</a>
                      @endif
                      @if ($location[$i]->type == "1")
                        <a href="#" id="{{ strtok($location[$i]->name," ") }}" class="loc_btn btn" style="color: white; background: yellow;">{{ $location[$i]->name }}</a>
                      @endif
                    @endfor
                  </div>
                </div>
                <div class="row">
                  <div class="container">
                    <div class="d-flex">
                      <span class="btn_tourism">Tourism Office</span>
                      <span class="btn_check">Check Point</span>
                      <span class="btn_estab">Establishments</span>
                    </div>
                  </div>
                </div>
                <div id="map" class="card-img-bottom" style="width: 100%; height: 400px;"></div>
              </div>
            </div>
          </div><!-- End Map -->
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Bolinao Tourism</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="www.bolinao.tourism.com">Bolinao Tourism</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  {{-- <script src="/user/assets/js/add_rows.js"></script> --}}

  <!-- Vendor JS Files -->
  <script src="/user/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/user/assets/vendor/chart.js/chart.min.js"></script>
  <script src="/user/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/user/assets/vendor/quill/quill.min.js"></script>
  <script src="/user/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/user/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/user/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/user/assets/js/main.js"></script>
  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"></script>
  <script src="/home/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="/user/assets/js/map.js"></script>
  <script src="/user/assets/js/send_notification.js"></script>

</body>

</html>