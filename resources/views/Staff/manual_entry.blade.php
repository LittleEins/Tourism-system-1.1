@include('inc.staff-header');
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard">
          <i class="bi bi-grid"></i>
          <span>Reports</span>
        </a>
      </li><!-- End Dashboard Nav -->

    @include('inc.staff-sidebar')
  </aside><!-- End Sidebar-->

  <main id="main" class="main">

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


    <div class="container">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <table id="example" class="table table-striped" style="width:100%; white-space: nowrap">
              <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Book Number</th>
                  <th scope="col">Destination</th>
                  <th scope="col">Groups</th>
                  <th scope="col">Es. Time Leave</th>
                  <th scope="col">Date & Time</th>
                  <th scope="col">Update</th>
                </tr>
              </thead>
                <tbody>
                  @foreach($lists as $list)
                  <tr>
                    <th scope="row">{{ $list->first_name }} {{ $list->last_name }}</th>
                    <td>{{ $list->book_number }}</td>
                    <td>
                    <select name="" id="">
                      <option value="{{ $list->destination }}">{{ $list->destination }}</option>
                      @foreach ($locations as $loc )
                          <option value="{{ $loc->name }}">{{ $loc->name }}</option>
                      @endforeach
                    </select>
                  </td> 
                    <td>
                      @if ($list->groups != "0")
                        <a href="#" class="btn btn-primary entry-btn" data-bs-toggle="modal" data-bs-target="#admin_createNotification" data-bs-whatever="@mdo"><i class="far fa-eye"></i></a> 
                      @endif 
                      @if ($list->groups == "0")
                        <a href="#" class="btn btn-primary "><i class="far fa-eye-slash"></i></a> 
                      @endif 
                    </td>
                    <td>
                      @php
                    
                        $dt = new DateTime('@'.$list->time_leave);
                        $dt->setTimeZone(new DateTimeZone('Asia/Manila'));
                        $res = $dt->format('H:i');
                    
                      @endphp
                      <input type="time" value="{{$res}}">
                    </td>
                    <td>{{ $list->approve_td }}</td>
                    <td>
                      <a href="" class="btn btn-primary">Update</a>
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
<script src="/user/assets/js/map.js"></script>
<script>$('#example').DataTable();</script>

</body>

</html>