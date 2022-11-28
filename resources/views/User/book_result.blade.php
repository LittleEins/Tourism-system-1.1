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
          <li class="breadcrumb-item"><a href="{{route('book.view')}}">User Information</a></li>
          <li class="breadcrumb-item"><a href="{{route('book2.view')}}">Additional Information</a></li>
          <li class="breadcrumb-item active">Request result</li>
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
                      <div class="container height-100 d-flex justify-content-center align-items-center" >
                        <div class="text-center">
                          <x-flash-message/>
                          <p>Please bring this Ticket # to the location you are  going..</p>
                          <div class="panel-body d-flex justify-content-center">
                              <div class="form-group">
                                <div class="row">
                                  <div class="col-md-12 mb-3">
                                    <h2>{{ $book_number }}</h2>
                                    <input type="hidden" id="book_number" name="book_number" value="100">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12 mb-3">
                                    <div class="btn btn-success add_item_btn">
                                      <a class="text-white" href="{{ route('book_log') }}">Request log</a>
                                    </div>
                                  </div>
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

</body>

</html>