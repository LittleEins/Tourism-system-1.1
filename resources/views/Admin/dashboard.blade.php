@include('inc.admin-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-border-all"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.admin-sidebar');
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4" id="dahboard">
          <h4>Live Count</h4>
          @for($i=0;$i < $count; $i++)
          <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-users fa-3x text-primary"></i>
              <div id="falls_count" class="ms-3">
                  <p class="mb-2">{{ $location[$i]->name }}</p>
                  <h6 id="patar_count" class="mb-0">{{ $location[$i]->visit_count }}</h6>
              </div>
            </div>
          </div>
          @endfor
        </div>
        <div class="row g-4" id="dahboard">
          <h4>Total Visit</h4>
          @for($i=0;$i < $count; $i++)
          <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-users fa-3x text-primary"></i>
              <div id="falls_count" class="ms-3">
                  <p class="mb-2">{{ $location[$i]->name }}</p>
                  <h6 id="patar_count" class="mb-0">{{ $location[$i]->total_visit }}</h6>
              </div>
            </div>
          </div>
          @endfor
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

      {{-- jquery cdn --}}
      <script src="/home/vendors/jquery/jquery-3.2.1.min.js"></script>
      {{-- <script src="/user/assets/js/add_rows.js"></script> --}}
      <script src="/user/assets/js/fetch_bookrequest.js"></script>
      <script src="/user/assets/js/all.js"></script>
      <script src="/user/assets/js/send_notification.js"></script>

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


</body>

</html>