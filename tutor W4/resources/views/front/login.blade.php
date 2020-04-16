@include('includes.header')

	<div class="outer-menu">
	  <input class="checkbox-toggle" type="checkbox" />
	  <div class="hamburger">
	    <div></div>
	  </div>
	  <div class="menu">
	    <div>
	      <div>
	        <ul>
              <li><a href="{{ url('/') }}">Home</a></li>
              <li><a href="{{ url('login') }}">Login</a></li>
              <li><a href="{{ url('register') }}">Register</a></li>
              <li><a href="{{ url('profile') }}">Profile</a></li>
              <li><a href="{{ url('classes') }}">Classes</a></li>
            </ul>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Welcome
					</span>
					<span class="login100-form-title p-b-48">
						<img src="images/logo.png">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "">
						<input class="input100" type="text" name="Username" id="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" id="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" id="loginUser">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="register.html">
							Register
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@include('includes.footer')
