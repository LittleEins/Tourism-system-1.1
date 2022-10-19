@include('inc.stuff-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.stuff-sidebar');
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
          <div class="container rounded bg-white mt-5 mb-5">
            <form action="{{ route('profile.process') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6 border-right">
                  <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5 mb-3" width="150px" src="{{ asset('storage/img/'. $user_data['img_name']) }}" alt="{{ $user_data['img_name'] }}">
                    <span>
                      <a href="{{ route('profileDelete.proccess') }}">Delete</a>
                    </span>
                    <span>
                      <div class="profile">
                        <label for="inputTag">
                          Upload Image <br/>
                          <i class="fa fa-2x fa-camera"></i>
                          <input id="inputTag" type="file" name="profile" accept=".png, .jpg, .jpeg" />
                          <br/>
                          <span id="imageName"></span>
                        </label>
                        <x-error_style/>@error('profile') {{$message}} @enderror</p>
                      </div>
                    </span>
                  </div>
                </div>
                <div class="col-md-5 border-right">
                  <div class="p-3 py-5">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                      <div class="row">
                        @if (Session::get('success'))
                            <div class=" mb-2">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('success') }}</strong>
                                </div>
                            </div>
                        @endif
                        <h4 class="text-center">Profile Settings</h4>
                      </div>
                    </div>
                    <div class="row mt-md-3">
                        <div class="col-md-12"><label class="labels">Name</label><input name="first_name" type="text" class="form-control" placeholder="first name" value="{{ $user_data['first_name'] }}"></div>
                        <x-error_style/>@error('first_name') {{$message}} @enderror</p>
                        <div class="col-md-12"><label class="labels">Surname</label><input name="last_name" type="text" class="form-control" value="{{ $user_data['last_name'] }}" placeholder="surname"></div>
                        <x-error_style/>@error('last_name') {{$message}} @enderror</p>
                      </div>
                  <div class="row mt-md-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input name="phone" type="number" class="form-control" placeholder="enter phone number" value="{{ $user_data['phone'] }}"></div>
                    <x-error_style/>@error('phone') {{$message}} @enderror</p>
                    <div class="col-md-12"><label class="labels">Email</label><input name="email" type="email" class="form-control" placeholder="enter email id" value="{{ $user_data['email'] }}"></div>
                    <x-error_style/>@error('email') {{$message}} @enderror</p>
                    <div class="col-md-12"><label class="labels">Address</label><input name="address" type="text" class="form-control" placeholder="enter address" value="{{ $user_data['address'] }}"></div>
                    <x-error_style/>@error('address') {{$message}} @enderror</p>
                  </div>
                  <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                  </div>
                </div>
              </div>
            </form>
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