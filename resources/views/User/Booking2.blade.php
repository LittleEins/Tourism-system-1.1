@include('inc.user-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('book.view')}}">
          <i class="bi bi-car-front-fill"></i>
          <span>Book</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.user-sidebar');
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Registration Form</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('book.view')}}">User Information</a></li>
          <li class="breadcrumb-item active">Additional Information</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="container  h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-100 mb-4 mb-lg-0">
              <div class="card mb-3" style="border-radius: .5rem;">
                <div class="row g-0">
                  <div class="col-md-40">
                    <div class="card-body p-4">
                        <h6>Information</h6>
                      <hr class="mt-0 mb-4">
                      <div class="row pt-1">
                        <div class="col-lg-20 mx-auto">
                          <div class="card">
                            <div class="card-header">
                              <h4>Choose Destination</h4>
                            </div>
                            <div class="card-body p-4">
                              <form action="{{ route('book.data') }}" method="post" id="add_form">
                                @csrf
                                <div class="row">
                                  <div class="row" id="solo_book">
                                    <input type="hidden" name="solo" value="solo">
                                  </div>
                                  <div class="col-md-4 mb-1">
                                    <select name="destination" id="locations" class="form-select" aria-label="Default select example" required>
                                      <option value="">Please Wait</option>
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
                                <div class="col-md-2 mb-3 ml-3 d-grid">
                                  <input class="btn btn-primary request_book" type="submit" value="Request" id="add_btn">
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
  <script src="/home/vendors/jquery/jquery-3.2.1.min.js"></script>
  {{-- <script src="/user/assets/js/add_rows.js"></script> --}}
  <script src="/user/assets/js/add_rows.js"></script>
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