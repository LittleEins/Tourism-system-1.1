@include('inc.user-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-pass-fill"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.user-sidebar');
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
          <!-- Sale & Revenue Start -->
          <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div id="falls_count" class="ms-3">
                            <p class="mb-2">Bolinao Falls</p>
                            <h6 id="patar_count" class="mb-0">{{ $falls }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div id="tundol_count" class="ms-3">
                            <p class="mb-2">Patar Beach</p>
                            <h6 class="mb-0">{{ $tundol }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-3x text-primary"></i>
                        <div id="elspis_count" class="ms-3">
                            <p class="mb-2">Light House</p>
                            <h6 class="mb-0">34</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div id="tara_falls" class="ms-3">
                            <p class="mb-2">Tupa</p>
                            <h6 class="mb-0">234</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sale & Revenue End -->


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

      {{-- jquery cdn --}}
      <script src="/home/vendors/jquery/jquery-3.2.1.min.js"></script>
      {{-- <script src="/user/assets/js/add_rows.js"></script> --}}
      <script src="/user/assets/js/fetch_bookrequest.js"></script>

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
  <script src="/user/assets/js/all.js"></script>

</body>

</html>