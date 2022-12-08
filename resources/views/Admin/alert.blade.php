@include('inc.admin-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-exclamation-circle"></i>
          <span>Alert</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.admin-sidebar')
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Alert</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Notification</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

    <!-- Modal add location -->
    <div class="modal fade" id="admin_createNotification" tabindex="-1" aria-labelledby="admin_createNotification" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Notification</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div id="admin_add_success"></div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <select id="admin_type" class="admin_type form-select" aria-label="Default select example">
                  <option value="">Notification type</option>
                  <option value="normal">Normal</option>
                  <option value="alert">Alert</option>
                  <option value="danger">Danger</option>
                </select>
                <x-error_style/><span id="admin_err_type"></span></p>
              </div>
              <div class="mb-3">
                <select id="sendto" class="admin_sendto form-select" aria-label="Default select example">
                  <option value="">Send to </option>
                  <option value="all_staffs">All (staffs)</option>
                  <option value="all_users">All (users)</option>
                  @foreach ($staff as $list)
                    <option value="{{$list->name}}">{{$list->name}}</option>
                  @endforeach
                </select>
                <x-error_style/><span id="admin_err_sendto"></span></p>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="admin_message form-control" id="admin_message"></textarea>
                <x-error_style/><span id="admin_err_message"></span></p>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary admin_create_notification">Send message</button>
          </div>
        </div>
      </div>
    </div>

      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

          <div class="card">

            <div class="card-header">
              <h4>Notification<a href="#" class="btn btn-primary float-end"  data-bs-toggle="modal" data-bs-target="#admin_createNotification" data-bs-whatever="@mdo">Create Notification</a></h4>
            </div>

            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="col-2">Notification</th>
                    <th scope="col">Message</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody id="admin_notifs">

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
  <script src="/user/assets/js/staff_send_notif.js"></script>

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
  <script src="/user/assets/js/send_notification.js"></script>

</body>

</html>