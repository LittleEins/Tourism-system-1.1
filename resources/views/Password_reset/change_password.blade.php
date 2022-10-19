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
                    <div class="card login-form">
                      <div class="card-body">
                        <h3 class="card-title text-center">Change password</h3>
                          <div class="card-text">
                          <form action="{{ route('update.password') }}" method="post">
                            @csrf 
                            <x-flash-message/>
                            <div class="form-group">
                              <label for="password">Your new password</label>
                              <input type="hidden" name="id" value="{{ $user_id }}">
                              <input type="password" name="password" class="form-control form-control-sm">
                              <x-error_style/>@error('password') {{$message}} @enderror</p>
                            </div>
                            <div class="form-group">
                              <label for="password_confirmation">Repeat password</label>
                              <input type="password" name="password_confirmation" class="form-control form-control-sm">
                              <x-error_style/>@error('password_confirmation') {{$message}} @enderror</p>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block submit-btn">Confirm</button>
                          </form>
                        </div>
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



