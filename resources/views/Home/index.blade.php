@include('inc.home-header');
  <main class="site-main">
    

    <!-- ================ start banner area ================= --> 
    <section class="home-banner-area" id="home">
      <div class="container h-100">
        <div class="home-banner">
          <div class="text-center">
            <h4>Stop stressing your self</h4>
            <h1>Bolinao <em></em> Tourism</h1>
            <a class="button home-banner-btn" href="signup">Create Account</a>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ end banner area ================= -->

    <!-- ================ welcome section start ================= --> 
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
              <p>Bolinao is a town on the west coast of Luzon Island, in the northern Philippines. The Spanish colonial St. James the Great Parish Church dates from the 1600s, and has an exterior made of black coral stones. </p>
              <p>The University of the Philippines' Bolinao Marine Laboratory supports the conservation of giant clams and other sea life. Atop Punta Piedra Point, the 1903 Cape Bolinao Lighthouse overlooks white-sand Patar Beach.</p>
              <a class="button button--active home-banner-btn mt-4" href="#">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ welcome section end ================= --> 


    
    <!-- ================ video section start ================= --> 
    <section class="video-area">
      <div class="container">
        <div class="row justify-content-center align-items-center flex-column text-center">
          <video style="width: 100%; height: 400px;" controls>
            <source src="/home/videos/home-video.mp4" type="video/mp4">
          Your browser does not support the video tag.
          </video>
          <h3>Bolinao?</h3>
          <p>What should i see on bolinao..</p>
          
        </div>
      </div>  
    </section>
    <!-- ================ video section end ================= --> 

    <section class="map-area" id="map-section">
      <div class="container">
        <div class="row justify-content-center align-items-center flex-column text-center">
          <div id="map" style="width: 100%; height: 400px; margin-bottom:10px;"></div>
          <h3>Map Locations</h3>
          <p>Visit us..</p>
        </div>
      </div>  
    </section>
  
   
    <!-- ================ carousel section start ================= -->
    <section class="section-margin">
      <div class="container">
        <div class="section-intro text-center pb-20px">
          <div class="section-intro__style">
            <img src="/home/img/home/bed-icon.png" alt="">
          </div>
          <h2>Our Guest Love Us</h2>
        </div>
        <div class="owl-carousel owl-theme testi-carousel">
          <div class="testi-carousel__item">
            <div class="media">
              <div class="testi-carousel__img">
                <img src="/home/img/home/testimonial1.png" alt="">
              </div>
              <div class="media-body">
                <p>I am very happy tha i visit this location..</p>
                <div class="testi-carousel__intro">
                  <h3>Robert Mack</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="testi-carousel__item">
            <div class="media">
              <div class="testi-carousel__img">
                <img src="/home/img/home/testimonial2.png" alt="">
              </div>
              <div class="media-body">
                <p>Hope i can visit again.!</p>
                <div class="testi-carousel__intro">
                  <h3>David Alone</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="testi-carousel__item">
            <div class="media">
              <div class="testi-carousel__img">
                <img src="/home/img/home/testimonial3.png" alt="">
              </div>
              <div class="media-body">
                <p>Ang ganda ng falls, good sa mga bata at matatanda.!</p>
                <div class="testi-carousel__intro">
                  <h3>Adam Pallin</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="testi-carousel__item">
            <div class="media">
              <div class="testi-carousel__img">
                <img src="/home/img/home/testimonial1.png" alt="">
              </div>
              <div class="media-body">
                <p>Maganda ang patar, white sand sya at malinis ang tubig</p>
                <div class="testi-carousel__intro">
                  <h3>Robert Mack</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="testi-carousel__item">
            <div class="media">
              <div class="testi-carousel__img">
                <img src="/home/img/home/testimonial2.png" alt="">
              </div>
              <div class="media-body">
                <p>Sana ma ulit pa namin pumunta dyan at makapag relax ulit.</p>
                <div class="testi-carousel__intro">
                  <h3>David Alone</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="testi-carousel__item">
            <div class="media">
              <div class="testi-carousel__img">
                <img src="/home/img/home/testimonial3.png" alt="">
              </div>
              <div class="media-body">
                <p>I like the system it's easy to use..!</p>
                <div class="testi-carousel__intro">
                  <h3>Adam Pallin</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ carousel section end ================= -->

  </main>



  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap" id="contact-section">
		<div class="container">
			<div class="footer-bottom row align-items-center text-center text-lg-left">
				<p class="footer-text m-0 col-lg-8 col-md-12">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://www.bolinaotourism.com/" target="_blank">Bolinao Tourism</a>
</p>
				<div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-twitter"></i></a>
					<a href="#"><i class="fab fa-dribbble"></i></a>
					<a href="#"><i class="fab fa-behance"></i></a>
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