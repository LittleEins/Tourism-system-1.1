@include('inc.home-header');

  <main class="site-main">
    <section class="home-login-area" id="login">
      <div class="container h-100">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-5">
              <img src="/home/img/login/login-logo.png" alt="login" class="login-card-img">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                  <form action="{{ route('otpUser.check') }}" method="post" class="container height-100 d-flex justify-content-center align-items-center" >
                    @csrf 
                    <div class="position-relative">
                      <div class="card p-2 text-center">
                        <x-flash-message/>
                        <h6>Please enter the one time password or click verify on email verification <br> to verify your account</h6>
                        <div> 
                          <span>A code has been sent to</span> <small>{{ Session::get('email') }}</small>
                        </div>
                        <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> 
                          <input type="hidden" name="id" value="{{ Session::get('id')}}" >
                          <input type="text" name="otp" placeholder="Enter OTP" style="padding: 0 10px;">
                        </div>
                        <x-error_style/>@error('otp') {{$message}} @enderror</p>
                        <div class="mt-4"> 
                          <button type="submit" class="btn btn-danger px-4 validate">Verify</button> 
                        </div>
                        <div class="mt-4 mb-2">
                          <p>Receive email verification? <a href="/resend/emailverification?id={{ Session::get('id')}}">re-send</a></p>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>



