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
                  <div class="container height-100 d-flex justify-content-center align-items-center" >
                    <div class="text-center">
                      <x-flash-message/>
                      <h4>Email reset password has been sent to your email.</h4>
                      <p>Not receive? click resend to resend password reset email</p>
                      <div class="panel-body d-flex justify-content-center">
                        
                        <form action="{{ route('resend.passreset') }}" role="form" autocomplete="off" class="form" method="post">
                          @csrf 
                          <div class="form-group">
                            <input type="hidden" name="reset_id" value="{{ Session::get('id')}}">
                            <input class="btn btn-lg btn-primary btn-block" value="Re-send" type="submit">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
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



