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
      <h1>Manage Acounts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin.report') }}">User Accounts</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <form action="/admin/search/acc" method="post">
              @csrf 
              <div class="row">
                <div class="container-flued">
                  <div class="d-flex">
                    <div class="col-sm-3">
                      <select name="locations" id="location" class="form-control input-sm">
                        <option value="all">All</option>
                        <option value="0">Users</option>
                        <option value="1">Staff</option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </form>

            <table id="exampletable" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
                <tbody>
                  @foreach($accounts as $list)
                  <tr>
                    <th scope="row">{{ $list->first_name }} {{ $list->last_name }}</th>
                    <td scope="row">{{ $list->email }}</td>
                    <td scope="row">
                      @if ($list->role == '0')
                        User
                      @endif
                      @if ($list->role == '1')
                      Staff
                      @endif
                    </td>
                    <td>
                      <a href="/admin/edit/pass/account?id={{ $list->id }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                    </td>
                    <td>
                      <a href="/admin/account/delete?id={{ $list->id }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
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