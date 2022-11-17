@include('inc.admin-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Create Account</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.admin-sidebar');
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Account Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Update Password</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
  
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
              <div class="container">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <div class="container">
                        <x-flash-message/>
                      </div>
                      <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Location</th>
                            <th scope="col">Password</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                          <tbody class="container">
                            <tr>
                              <td>{{ $info->first_name }} {{ $info->last_name }}</td>
                              <td>{{ $info->email }}</td>
                              <td>{{ $info->location }}</td>
                              <form action="{{ route('update_staff_pass') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$info->id}}">
                                <td><input type="password" class="container" name="password" placeholder="New password"> <x-error_style/>@error('password') {{$message}} @enderror</p></td>
                                <td><button type="submit" class="btn btn-primary">Update</button></td>
                              </form>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
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
  <script src="/user/assets/js/admin_create_account.js"></script>

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