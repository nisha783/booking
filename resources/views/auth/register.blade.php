
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Regitser Page | {{ config('app.name') }}</title>
    <!-- plugins:css -->
  @include('auth.includes.css')
    <link rel="shortcut icon" href="{{ Vite::asset('resources/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form  method="POST" action="{{ route('register') }} ">
                    @csrf
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control p_input">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control p_input">
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control p_input">
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                  </div>
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control p_input">
                    @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                  </div>
                  <p class="sign-up text-center">Already have an Account?<a href="{{ route('login') }}"> Sign In</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('auth.includes.js')
  </body>
</html>