@include('inc.user-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-exclamation-diamond"></i>
          <span>Notification</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.user-sidebar');
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    
   <!-- Modal add location -->
   <div class="modal fade" id="viewnotif" tabindex="-1" aria-labelledby="viewnotif" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Notification from <span id="sender"></span></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="add_success"></div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <h4>Notification Level: <span id="type"></span></h4>
            </div>
            <div class="mb-3">
              <p id="message"></p>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

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
    <div class="modal fade" id="createNotification" tabindex="-1" aria-labelledby="createNotification" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Notification</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div id="add_success"></div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <select id="type" class="type form-select" aria-label="Default select example">
                  <option value="">Notification Type</option>
                  <option value="normal">Normal</option>
                  <option value="alert">Alert</option>
                  <option value="danger">Danger</option>
                </select>
                <x-error_style/><span id="err_type"></span></p>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="message form-control" id="message"></textarea>
                <x-error_style/><span id="err_message"></span></p>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary create_notification">Send message</button>
          </div>
        </div>
      </div>
    </div>

      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

          <div class="card">

            <div class="card-header">
              <h4>Notification</h4>
            </div>

            <div class="card-body">
              <table class="table table-bordered" id="no-more-table">
                <thead>
                  <tr>
                    <th class="col-2">Notification</th>
                    <th class="col">From</th>
                    <th scope="col">Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">View</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody id="user_notif">

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

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

  <!-- Template Main JS File -->
  <script src="/user/assets/js/main.js"></script>
  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"></script>
  <script src="/user/assets/js/send_notification.js"></script>

</body>

</html>