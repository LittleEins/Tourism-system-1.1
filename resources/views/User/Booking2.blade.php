@include('inc.user-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
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
          <li class="breadcrumb-item active">More Details</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container  h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-100 mb-4 mb-lg-0">
              <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                  <div class="col-md-40 gradient-custom text-center text-white"
                    style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                      alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                    <i class="far fa-edit mb-5"></i>
                  </div>
                  <div class="col-md-40">
                    <div class="card-body p-4">
                        <h6>Information</h6>
                      <hr class="mt-0 mb-4">
                      <div class="row pt-1">
                        <div class="col-lg-20 mx-auto">
                          <div class="card">
                            <div class="card-header">
                              <h4>Groups</h4>
                            </div>
                            <div class="card-body p-4">
                              <form action="{{ route('book.data') }}" method="post" id="add_form">
                                @csrf
                                <div class="row">
                                  <div class="row" id="solo_book">
                                    <input type="hidden" name="solo" value="solo">
                                  </div>
                                  <div class="col-md-4 mb-1">
                                    <select name="destination" class="form-select" aria-label="Default select example" required>
                                      <option value="">Destination</option>
                                      <option value="falls">Bolinao (Falls 200)</option>
                                      <option value="tundol">Tundol (130)</option>
                                    </select>
                                    <x-error_style/>@error('password') {{$message}} @enderror</p>
                                  </div>  
                                  <hr class="mt-2 mb-3"/>   
                                </div>
                                <div id="show_item">
                                  <div class="row">
                                    <div class="row">
                                      <div class="col-md-2 mb-3 ml-3 d-grid">
                                        <button type="button" class="btn btn-success add_item_btn">Add more</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div>
                                  <input type="submit" value="Book" class="btn btn-primary w-25" id="add_btn">
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="col-6 mb-3 ml-3 d-flex justify-content-start">
                        </div>
                        <div class="col-6 mb-3 ml-3 d-flex justify-content-end">
                          <a href="{{route('book.view')}}" class="btn btn-primary">Back</a>
                        </div>
                      </div>
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

  {{-- jquery cdn --}}
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  {{-- <script src="/user/assets/js/add_rows.js"></script> --}}
  <script src="/user/assets/js/add_rows.js"></script>

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