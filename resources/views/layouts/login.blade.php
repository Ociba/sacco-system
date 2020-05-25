<div class="col-md-6 mb-sm--50">
  <div class="login-box">
      <h3 class="heading__tertiary mb--30">Login</h3>
      <form method="POST" action="{{ route('login') }}">
      @csrf
          <div class="form__group mb--20">
              <label class="form__label form__label--2" for="username_email">email address <span class="">*</span></label>
              <input type="email" class="form__input form__input--2 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form__group mb--20">
              <label class="form__label form__label--2" for="login_password">Password <span class="">*</span></label>
              <input type="password" class="form__input form__input--2 @error('password') is-invalid @enderror" id="password" name="password" autocomplete="current-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="d-flex align-items-center mb--20">
              <div class="form__group mr--30">
                  <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                  
              </div>
              <div class="form__group checkbox icheck">
                  <label class="form__label inline-label" for="store_session">
                      <input type="checkbox"  id="remember" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                      </label>
                  </label>
              </div>
          </div>
      </form>
      @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Password?') }}
              </a>
          @endif
  </div>
  </div>