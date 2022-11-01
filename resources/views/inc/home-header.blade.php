<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bolinao Tourism</title>

	<link rel="icon" href="/home/img/logo_icon.png" type="image/png">
  <link rel="stylesheet" href="/home/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="/home/vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="/home/vendors/themify-icons/themify-icons.css">
	<link rel="stylesheet" href="/home/vendors/linericon/style.css">
  <link rel="stylesheet" href="/home/vendors/magnefic-popup/magnific-popup.css">
  <link rel="stylesheet" href="/home/vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="/home/vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="/home/vendors/nice-select/nice-select.css">

  <link rel="stylesheet" href="/home/css/style.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css">
</head>
<body>
	<!-- ================ header section start ================= -->	
	<header class="header_area">
    <div class="header-top">
      <div class="container">
        <div class="d-flex align-items-center">
          <div id="logo" class="d-flex align-items-center">
            <a href="index.html"><img style="width:50px; height:50px" src="/home/img/logo_icon.png" alt="" title="" /></a>
            <h3 class="ml-2">Bolinao Tourism</h3>
          </div>
          <div class="ml-auto d-none d-md-block d-md-flex">
            <div class="media header-top-info">
              <span class="header-top-info__icon"><i class="fa-duotone fa-envelope"></i></span>
              <div class="media-body">
                <p>Have any question?</p>
                <p>Free: <a href="bolinaotourism@gmail.com">bolinaotourism@gmail.com</a></p>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <!-- <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a> -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav">
              <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="#about-section">About</a></li>
              <li class="nav-item"><a class="nav-link" href="#map-section">Map</a></li>
              <li class="nav-item"><a class="nav-link" href="#contact-section">Contact</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a></li>
              <li class="nav-item"><a class="nav-link" href="{{route('signup')}}">Signup</a></li>
            </ul>
          </div>

          <ul class="social-icons ml-auto">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
            <li><a href="#"><i class="fas fa-rss"></i></a></li>
          </ul>
        </div>
      </nav>
    </div>
	</header>
	<!-- ================ header section end ================= -->	
