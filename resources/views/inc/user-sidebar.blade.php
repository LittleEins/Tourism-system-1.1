  
      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('dashboard.view') }}">
          <i class="bi bi-pass-fill"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('map.view')}}">
          <i class="bi bi-geo-alt-fill"></i>
          <span>Map</span>
        </a>
      </li><!-- Map Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('book.view')}}">
          <i class="bi bi-car-front-fill"></i>
          <span>Request Entry</span>
        </a>
      </li><!-- Booking Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('book_log') }}">
          <i class="bi bi-bookmarks-fill"></i>
          <span>Request</span>
        </a>
      </li><!-- Booking Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('history')}}">
          <i class="bi bi-clock-history"></i>
          <span>Log</span>
        </a>
      </li><!-- Booking Nav -->

    </ul>
    
