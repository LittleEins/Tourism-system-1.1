@include('inc.staff-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-newspaper"></i>
          <span>Manual Approves</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.staff-sidebar')
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Manual Approves</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="#">Manual Entry</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- Modal add location -->
    <div class="modal fade" id="admin_createNotification" tabindex="-1" aria-labelledby="admin_createNotification" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Groups</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div id="admin_add_success"></div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <div id="remove_success" class="container"></div>
                <table class="table table-striped" style="width:100%; white-space: nowrap">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Book Number</th>
                      <th>Remove</th>
                    </tr>
                  </thead>
                    <tbody id="groups_manual" >
                  </tbody>
                </table>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <div class="container">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <table id="example"  class="table table-striped" style="width:100%; white-space: nowrap">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Book Number</th>
                  <th scope="col">Destination</th>
                  <th scope="col">Groups</th>
                  <th scope="col">Es. Time Leave</th>
                  <th scope="col">Date & Time</th>
                  <th scope="col">Update</th>
                  <th scope="col">Leave</th>
                </tr>
              </thead>
         
                <tbody>
                  @for ($i = 0; $i <= count($tl)-1; $i++)
                  <tr>
                    <form action="/staff/manual/update" method="post">
                      @csrf
                      <th scope="row">{{ $lists[$i]->first_name }} {{ $lists[$i]->last_name }}</th>
                      <td>{{ $lists[$i]->book_number }}</td>
                      <td>
                        <input type="hidden" name="id" value="{{ $lists[$i]->id }}">
                      <input type="hidden" name="book_number" value="{{ $lists[$i]->book_number }}">
                      <select name="destination" id="">
                        <option value="{{ $lists[$i]->destination }}">{{ $lists[$i]->destination }}</option>
                        @foreach ($locations as $loc )
                            <option value="{{ $loc->name }}">{{ $loc->name }}</option>
                        @endforeach
                      </select>
                    </td> 
                      <td>
                        @if ($lists[$i]->groups != "0")
                          <button value="{{ $lists[$i]->book_number }}" class="groups-btn btn btn-primary entry-btn" data-bs-toggle="modal" data-bs-target="#admin_createNotification" data-bs-whatever="@mdo"><i class="far fa-eye"></i></button> 
                        @endif 
                        @if ($lists[$i]->groups == "0")
                          <button value="{{ $lists[$i]->id }}" class="btn btn-primary "><i class="far fa-eye-slash"></i></button> 
                        @endif 
                      </td>
                      <td>
                        <input name="time" type="time" value="{{ $tl[$i] }}">
                      </td>
                      <td>{{ $lists[$i]->approve_td }}</td>
                      
                      <td>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </td>
                    </form>
                      <td>
                        <a href="/staff/manual/leave?id={{ $lists[$i]->book_number }}" class="btn btn-danger">Leave</a>
                      </td>
                  </tr>
                  @endfor
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
{{-- <script src="/user/assets/js/add_rows.js"></script> --}}
<script src="/user/assets/js/fetch_bookrequest.js"></script>
<script src="/user/assets/js/send_notification.js"></script>
<script src="/user/assets/js/staff_send_notif.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

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
<script>$('#example').DataTable();</script>

</body>

</html>