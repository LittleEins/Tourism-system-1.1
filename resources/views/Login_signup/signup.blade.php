@include('inc.home-header');	

  <main class="site-main">

    <section class="home-signup-area" id="signup">
      <div class="container h-100">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-5">
              <img src="/home/img/login/login-logo.png" alt="login" class="login-card-img">
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <form action="{{ route('authUser.register') }}" method="post">
                  <div class="brand-wrapper d-flex justify-content-center">
                    <img src="/home/img/logo_icon.png" alt="logo" class="logo">
                  </div>
                  <p class="login-card-description d-flex justify-content-center">Create Account</p>
                  @csrf
                  <x-flash-message/>
                    <div class="form-group">
                      <label for="first_name" class="sr-only">First Name</label>
                      <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}">
                      <x-error_style/>@error('first_name') {{$message}} @enderror</p>
                    </div>
                    <div class="form-group">
                      <label for="last_name" class="sr-only">Last Name</label>
                      <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}">
                      <x-error_style/>@error('last_name') {{$message}} @enderror</p>
                    </div>
                    <div class="form-group">
                      <label for="email" class="sr-only">Email</label>
                      <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                      <x-error_style/>@error('email') {{$message}} @enderror</p>
                    </div>
                    <div class="form-group">
                      <label for="phone" class="sr-only">Phone</label>
                      <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
                      <x-error_style/>@error('phone') {{$message}} @enderror</p>
                    </div>
                    <div class="form-group mb-4">
                      <label for="password" class="sr-only">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Password" >
                      <x-error_style/>@error('password') {{$message}} @enderror</p>
                    </div>
                    <div class="form-group mb-4">
                      <label for="password" class="sr-only">Password</label>
                      <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat Password">
                      <x-error_style/>@error('password_confirmation') {{$message}} @enderror</p>
                    </div>
                    <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Signup">
                  </form>
                  <p class="login-card-footer-text">Already have an account? <a href="login" class="text-reset">Login</a></p>
                  <nav class="login-card-footer-nav">
                    <a href="#!">Terms of use.</a>
                    <a href="#!">Privacy policy</a>
                  </nav>
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



