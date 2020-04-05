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
						Classes
					</span>
					<span class="login100-form-title p-b-48">
						<img src="images/logo.png">
					</span>

					<ul class="listing">
						<li>CSCI 111</li>
						<li>CSCI 141</li>
						<li>CSCI 142</li>
						<li>CINF 201</li>
					</ul>

				</form>
			</div>
		</div>
	</div>
@include('includes.footer')
	
	
	