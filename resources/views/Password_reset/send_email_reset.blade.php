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
                      <h3><i class="fa fa-lock fa-4x"></i></h3>
                      <x-flash-message/>
                      <h2 class="text-center">Forgot Password?</h2>
                      <p>You can reset your password here.</p>
                      <div class="panel-body">
        
                        <form action="{{ route('reset.process') }}" role="form" autocomplete="off" class="form" method="post">
                          @csrf 
                          <div class="form-group">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                              <input id="email" name="email" placeholder="Email address" class="form-control"  type="email">
                            </div>
                            <x-error_style/>@error('email') {{$message}} @enderror</p>
                          </div>
                          <div class="form-group">
                            <input class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
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



