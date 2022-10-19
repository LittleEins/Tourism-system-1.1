@include('inc.user-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Booking</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.user-sidebar');
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Booking</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">User Info</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container  h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-10 mb-4 mb-lg-0">
              <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                  <div class="col-md-40 gradient-custom text-center text-white"
                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="{{ asset('storage/img/'. $user_data['img_name']) }}"
                      alt="Avatar" class="rounded-circle img-fluid my-5" style="width: 80px;" />
                    <i class="far fa-edit mb-5"></i>
                  </div>
                  <div class="col-md-40">
                    <div class="card-body p-4">
                      <div class="d-flex justify-content-center align-items-center">
                        <x-flash-message/>
                      </div>
                      <form action="{{route('book2.view')}}" method="post">
                        @csrf
                        <h6>Information</h6>
                      <hr class="mt-0 mb-4">
                      <div class="row pt-1">
                        <div class="col-6 mb-3">
                          <h6>Full Name</h6>
                          <p class="text-muted">{{ $user_data['first_name'] }} {{ $user_data['last_name'] }}</p>
                          <input type="hidden" name="first_name" value="{{ $user_data['first_name'] }}">
                          <input type="hidden" name="last_name" value="{{ $user_data['last_name'] }}">
                          <input type="hidden" name="gender" value="{{ $user_data['gender'] }}">
                        </div>
                        <div class="col-6 mb-3">
                          <h6>Phone</h6>
                          <p class="text-muted">{{$user_data['phone']}}</p>
                          <input type="hidden" name="phone" value="{{$user_data['phone']}}">
                        </div>
                        <div class="col-6 mb-3">
                          <h6>Email</h6>
                          <p class="text-muted">{{$user_data['email']}}</p>
                          <input type="hidden" name="email" value="{{$user_data['email']}}">
                        </div>
                        <div class="col-6 mb-3">
                          <h6>Address</h6>
                          <p class="text-muted">{{$user_data['address']}}</p>
                          <input type="hidden" name="address" value="{{$user_data['address']}}">
                        </div>
                        <div class="col-12 mb-3 ml-3 d-flex justify-content-start">
                          <button type="submit" class="btn btn-primary">Next</button>
                        </div>
                      </div>
                      </form>
                    </div>
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
  <script src="/user/assets/js/map.js"></script>

</body>

</html>