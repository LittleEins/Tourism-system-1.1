@include('inc.home-header');
  <main class="site-main">
    

    {{-- HOME --}}
    <section class="home-banner-area" id="home">
      <div class="container h-100">
        <div class="home-banner">
          <div class="text-center">
            <h4>BOLINAO</h4>
            <h1>YOUR JOURNEY IS OUR <em></em>STORY</h1>
            <a class="button home-banner-btn" href="signup">Create Account</a>
          </div>
        </div>
      </div>
    </section>

    {{-- COVER --}}
    <section class="welcome" id="about-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="row no-gutters welcome-images">
              <div class="col-sm-7">
                <div class="card">
                  <img src="/home/img/resorts5.jpg" alt="Card image cap">
                </div>
              </div>
              <div class="col-sm-5">
                <div class="card">
                  <img class="" src="/home/img/resots2.jpg" alt="Card image cap">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card">
                  <img class="" src="/home/img/resots4.jpg" alt="Card image cap">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="welcome-content">
              <h2 class="mb-4"><span class="d-block">Welcome</span> to bolinao</h2>
              <p>Bolinao is well known for its fantastic variety of hotels, B&Bs & Restaurant options.</p>
              <p>You’ll find luxury resorts to budget friendly inns. Whether you want a quick weekend getaway in the bustling city or a summer holiday by the sea with panoramic west Philippine sea views, you'll find somewhere to stay in Bolinao that's perfect for you.</p>
            </div>
          </div>
        </div>
      </div>
    </section>



    <section class="map-area" id="map-section">
      <div class="container">
        <div class="row justify-content-center align-items-center flex-column text-center">
          <div id="map" style="width: 100%; height: 400px; margin-bottom:10px;"></div>
          <h3>Map Locations</h3>
          <p>Visit us..</p>
        </div>
      </div>  
    </section>
  
  </main>



  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap" id="contact-section">
		<div class="container">
			<div class="row footer_bolinao">
				<span>CONTACT US:</span>
        <div>
          <span>075.523.5564 / 09121138008</span>
        </div>
        <div>
          <span>bolinao.tourism@yahoo.com</span>
        </div>
        <div>
          <span>Bolinao Pangasinan, Philippines</span>
        </div>
        <div>
          <span>© 2019 by Bolinao Tourism</span>
        </div>
      </div>
		</div>
	</footer>
  <!-- ================ End footer Area ================= -->


  <script src="/home/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"></script>
  <script src="/home/js/map.js"></script>
  <script src="/home/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="/home/vendors/magnefic-popup/jquery.magnific-popup.min.js"></script>
  <script src="/home/vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="/home/vendors/easing.min.js"></script>
  <script src="/home/vendors/superfish.min.js"></script>
  <script src="/home/vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="/home/vendors/jquery.ajaxchimp.min.js"></script>
  <script src="/home/vendors/mail-script.js"></script>
  <script src="/home/js/main.js"></script>
</body>
</html>