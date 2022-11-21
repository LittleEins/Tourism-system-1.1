@include('inc.admin-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-pin-map-fill"></i>
          <span>Add Map Location</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.admin-sidebar');
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Add Pin</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Location</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

    <!-- Modal add location -->
    <div class="modal fade" id="addlocationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add location</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div id="add_success"></div>
          <div class="modal-body">

            <div class="form-group mb3">
              <label for="">Location Name</label>
              <input type="text" class="name form-control">
              <x-error_style/><span id="err_name"></span></p>
            </div>

            <div class="form-group mb3">
              <label for="">Latitude</label>
              <input type="text" class="latitude form-control">
              <x-error_style/><span id="err_latitude"></span></p>
            </div>

            <div class="form-group mb3">
              <label for="">Longitude</label>
              <input type="text" class="longitude form-control">
              <x-error_style/><span id="err_longitude"></span></p>
            </div>
            <div class="form-check">
              <input class="pin_type form-check-input" type="checkbox" value="" id="flexCheckDefault" />
              <label class="form-check-label" for="flexCheckDefault">Pin only</label>
            </div>
          </div>
          <div class="modal-footer" id="modal_btn">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary add_location">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    

      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

          <div class="card">

            <div class="card-header">
              <h4>Add Map Location <a href="#" class="btn btn-primary float-end" data-toggle="modal" data-target="#addlocationModal">Add Location</a></h4>
            </div>

            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</th>
                    <th scope="col">Type</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody id="map_locations">

                </tbody>
              </table>
            </div>

          </div>
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
  
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="/user/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/user/assets/vendor/chart.js/chart.min.js"></script>
  <script src="/user/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/user/assets/vendor/quill/quill.min.js"></script>
  <script src="/user/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/user/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/user/assets/vendor/php-email-form/validate.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

  <!-- Template Main JS File -->
  <script src="/user/assets/js/main.js"></script>
  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"></script>
  <script src="/user/assets/js/add_location.js"></script>

</body>

</html>