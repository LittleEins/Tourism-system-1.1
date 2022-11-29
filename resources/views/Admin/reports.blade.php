@include('inc.admin-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Reports</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.admin-sidebar');
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Report Generation</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.report') }}">Reports</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <form action="/admin/search/report" method="post">
              @csrf 
              <div class="row">
                <div class="container-flued">
                  <div class="d-flex">
                    <div class="col-sm-3">
                      <select name="locations" id="location" class="form-control input-sm">
                        @if (Session::get('location') == null )
                        <option value="all">All</option>
                        @foreach($locations as $list)
                        <option value="{{ $list->name }}">{{ $list->name }}</option>
                        @endforeach
                        @endif
                        @if (Session::get('location') != null )
                        <option value="{{Session::get('location')}}">{{ucfirst(Session::get('location'))}}</option>
                        @foreach($locations as $list)
                        <option value="{{ $list->name }}">{{ $list->name }}</option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                    <div class="form-group row">
                      <label for="col-form-label col-sm-2">Start</label>
                    </div>
                    <div class="col-sm-3">
                      <input type="date" class="form-control input-sm" id="fromDate" name="from" value="{{ Session::get('start') }}" >
                    </div>
                    <div class="form-group row">
                      <label for="col-form-label col-sm-2">End</label>
                    </div>
                    <div class="col-sm-3">
                      <input type="date" class="form-control input-sm" id="endDate" name="end" value="{{ Session::get('end') }}" >
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </div>
                    <div class="col-sm-3">
                      <a href="/admin/reports/export?start={{ Session::get('start') }}&end={{ Session::get('end') }}&location={{ Session::get('location') }}" class="btn btn-primary">Export as excel</a>
                    </div>
                  </div>
                </div>
              </div>
            </form>

        <table id="exampletable" class="table table-striped" style="width:100%;white-space: nowrap">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Email</th>
                  <th scope="col">Address</th>
                  <th scope="col">Destination</th>
                  <th scope="col">Book Number</th>
                  <th scope="col">Groups</th>
                  <th scope="col">View</th>
                  <th scope="col">Date & Time</th>
                </tr>
              </thead>
                <tbody>
                  @foreach($lists as $list)
                  <tr>
                    <th scope="row">{{ $list->first_name }} {{ $list->last_name }}</th>
                    <td>{{ $list->gender }}</td>
                    <td>{{ $list->phone }}</td>
                    <td>{{ $list->email }}</td>
                    <td>{{ $list->address }}</td>
                    <td>{{ $list->destination }}</td>
                    <td>{{ $list->book_number }}</td>
                    <td>{{ $list->groups }}<td>
                    @if ($list->groups != "0")
                      <a href="/admin/log/view/all?id={{ $list->book_number }}" class="btn btn-primary"><i class="far fa-eye"></i></a> </td>
                    @endif
                    @if ($list->groups == "0")
                      <a href="/admin/log/view/all?id={{ $list->book_number }}" class="btn btn-primary"><i class="far fa-eye-slash"></i></a> </td>
                    @endif
                    <td>{{ $list->approve_td }}</td>
                  </tr>
                  @endforeach
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
<script src="/user/assets/js/map.js"></script>
<script>$('#exampletable').DataTable();</script>
</body>

</html>