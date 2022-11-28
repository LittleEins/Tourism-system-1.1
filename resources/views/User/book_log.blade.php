@include('inc.user-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Manage Request</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.user-sidebar');
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Request Status</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="{{ route('book_log') }}">Manage Request</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <table class="table table-bordered" style="white-space: nowrap">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Address</th>
                  <th scope="col">Destination</th>
                  <th scope="col">Groups</th>
                  <th scope="col">Ticket#</th>
                  <th scope="col">Status</th>
                  <th scope="col">View</th>
                  @if ($list != null)
                    @if ($list->status == "pending")
                    <th scope="col">Cancel</th>
                    @endif
                    @if ($list->status == "approve")
                    <th scope="col">Leave</th>
                    @endif
                  @endif
                  @if ($list == null)
                    <th scope="col">Action</th>
                  @endif
                </tr>
              </thead>
                <tbody>
                  <tr>
                    @if($list != null)
                    <th scope="row">{{ $list->first_name }} {{ $list->last_name }}</th>
                    <td>{{ $list->gender }}</td>
                    <td>{{ $list->phone }}</td>
                    <td>{{ $list->email }}</td>
                    <td>{{ $list->address }}</td>
                    <td>{{ $list->destination}}</td>
                    <td>{{ $list->groups }}</td>
                    <td>{{ $list->book_number }}</td>
                    <td>{{ $list->status }}</td>
                    <td>
                      @if ($list->groups == "solo")
                      
                      @endif
                      @if ($list->groups != "solo")
                      <a href="/user/book/view/all?id={{ $list->book_number }}" class="btn btn-primary"><i class="far fa-eye"></i></a> 
                      @endif
                    </td>
                        @if ($list->status == "pending")
                        <td>
                          <a href="/user/book/delete?id={{ $list->id }}" class="btn btn-danger"><i class="fa fa-trash"></i></a> 
                        </td>
                        @endif
                        @if ($list->status == "approve")
                        <td>
                          <a href="/user/book/leave?id={{ $list->book_number }}" class="btn btn-danger"><i class="fa fa-taxi"></i></a> 
                        </td>
                        @endif
                    @endif
                  </tr>
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
<script src="/home/vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="/user/assets/js/map.js"></script>
{{-- <script src="/user/assets/js/add_rows.js"></script> --}}
<script src="/user/assets/js/fetch_bookrequest.js"></script>
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