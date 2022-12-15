@include('inc.staff-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-sign-stop"></i>
          <span>Check Point</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.staff-sidebar')
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Entries</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="/staff/check/point">Request Entry</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="container">
        <div class="row">
          <div class="col-12 mb-3">
            <a href="/staff/add/entery" class="btn btn-primary">Add</a>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <table id="example" class="table table-striped" style="width:100%; white-space: nowrap">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Groups</th>
                  <th>Ticket#</th>
                  <th>View</th>
                  <th>Delete</th>
                  <th>Confirm</th>
                </tr>
              </thead>
                <tbody id="check_point" >

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
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
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="/user/assets/js/staff_send_notif.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="/user/assets/js/map.js"></script>
{{-- <script src="/user/assets/js/add_rows.js"></script> --}}
<script src="/user/assets/js/fetch_bookrequest.js"></script>
<script src="/user/assets/js/map.js"></script>

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
<script>$('#example').DataTable();</script>

</body>

</html>