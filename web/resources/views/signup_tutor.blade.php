@extends('layouts.app')
@section('content')
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form">
                <span class="login100-form-title p-b-26">
                    Register
                </span>

                <div class="wrap-input100 validate-input" data-validate = "">
                    <input id="username" class="input100" type="text" name="Username">
                    <span class="focus-input100" data-placeholder="Username"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
                        <i class="zmdi zmdi-eye"></i>
                    </span>
                    <input id="password" class="input100" type="password" name="pass">
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "">
                    <input id="firstname" class="input100" type="text" name="FirstName">
                    <span class="focus-input100" data-placeholder="First Name"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "">
                    <input id="lastname" class="input100" type="text" name="LastName">
                    <span class="focus-input100" data-placeholder="Last Name"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "">
                    <input id="email" class="input100" type="text" name="Email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div  class="validate-input" data-validate = "">
                    <select class="form-control" id="availableFrom"  required="required" name="availableFrom">
                        <option value="">Select Available From:</option>
                        <option value="08:00">08:00</option>
                        <option value="08:30">08:30</option>
                        <option value="09:00">09:00</option>
                        <option value="09:30">09:30</option>
                        <option value="10:00">10:00</option>
                        <option value="10:30">10:30</option>
                        <option value="11:00">11:00</option>
                        <option value="11:30">11:30</option>
                        <option value="12:00">12:00</option>
                        <option value="12:30">12:30</option>
                        <option value="13:00">13:00</option>
                        <option value="13:30">13:30</option>
                        <option value="14:00">14:00</option>
                        <option value="14:30">14:30</option>
                        <option value="15:00">15:00</option>
                        <option value="15:30">15:30</option>
                        <option value="16:00">16:00</option>
                        <option value="16:30">16:30</option>
                        <option value="17:00">17:00</option>
                        <option value="17:30">17:30</option>
                        <option value="18:00">18:00</option>
                        <option value="18:30">18:30</option>
                    </select>
                </div>
                <br>
                <div  class="validate-input" data-validate = "">
                    <select class="form-control" id="availableUpto"  required="required" name="availableUpto">
                        <option value="">Select Available Upto:</option>
                        <option value="08:00">08:00</option>
                        <option value="08:30">08:30</option>
                        <option value="09:00">09:00</option>
                        <option value="09:30">09:30</option>
                        <option value="10:00">10:00</option>
                        <option value="10:30">10:30</option>
                        <option value="11:00">11:00</option>
                        <option value="11:30">11:30</option>
                        <option value="12:00">12:00</option>
                        <option value="12:30">12:30</option>
                        <option value="13:00">13:00</option>
                        <option value="13:30">13:30</option>
                        <option value="14:00">14:00</option>
                        <option value="14:30">14:30</option>
                        <option value="15:00">15:00</option>
                        <option value="15:30">15:30</option>
                        <option value="16:00">16:00</option>
                        <option value="16:30">16:30</option>
                        <option value="17:00">17:00</option>
                        <option value="17:30">17:30</option>
                        <option value="18:00">18:00</option>
                        <option value="18:30">18:30</option>
                    </select>
                </div>
                <br>
                <div class="wrap-input100 validate-input" data-validate = "">
                    <input id="streetAddress" class="input100" type="text" name="streetAddress">
                    <span class="focus-input100" data-placeholder="Enter Street Address"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "">
                    <input id="city" class="input100" type="text" name="city">
                    <span class="focus-input100" data-placeholder="Enter City"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "">
                    <input id="state" class="input100" type="text" name="state">
                    <span class="focus-input100" data-placeholder="Enter State"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "">
                    <input id="zipCode" class="input100" type="text" name="zipCode">
                    <span class="focus-input100" data-placeholder="Enter ZipCode"></span>
                </div>

                <div>
                    <p>select course</p>
                    <ul class="listing">
						<li><input id="math-101" type="checkbox" name="fruit" value="Math101"> Math 101</li>
						<li><input id="cs-101" type="checkbox" name="fruit" value="CS101"> Introduction to Computing</li>
						<li><input id="cs-102" type="checkbox" name="fruit" value="CS102"> Introduction to Programming</li>
					</ul>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button id="sign-up" class="login100-form-btn">
                          Register
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-115">
                    <span class="txt1">
                        Already have an account?
                    </span>

                    <button id="login" class="txt2" onclick="window.location='{{ url("/") }}'">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        var isSignUpInProgress = false;
        firebase.auth().onAuthStateChanged(function(user) {
            if(user) {
                 console.log('User is signed in');
                if(!isSignUpInProgress) {
                    redirectToHome();
                }
            }
            else {
                console.log('User is logged out');
            }
        });
    </script>
    <script>
        document.querySelector('#sign-up').addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var email = document.querySelector('#email').value;
            var password = document.querySelector('#password').value;
            isSignUpInProgress = true;
            firebase.auth().createUserWithEmailAndPassword(email, password)
            .then(() => {
                console.log('Account created successfully');
                onSignUp();
            })
            .catch((error) => {
                isSignUpInProgress = false;
                // Handle Errors here.
                var errorCode = error.code;
                var errorMessage = error.message;
                alert(errorMessage);
                // ...
            });
        });
    </script>
    <script>
        function onSignUp() {
            ///Save user data
            var username = document.querySelector('#username').value;
            var password = document.querySelector('#password').value;
            var firstName = document.querySelector('#firstname').value;
            var lastName = document.querySelector('#lastname').value;
            var email = document.querySelector('#email').value;
            var availableFrom = document.querySelector('#availableFrom').value;
            var availableUpto = document.querySelector('#availableUpto').value;
            var location = {};
            location.streetAddress = document.querySelector('#streetAddress').value;
            location.city = document.querySelector('#city').value;
            location.state = document.querySelector('#state').value;
            location.zipCode = document.querySelector('#zipCode').value;

            var courses = {};
            if(document.querySelector('#math-101').checked){
                courses.Math101 = true;
            }
            if(document.querySelector('#cs-101').checked){
                courses.CS101 = true;
            }
            if(document.querySelector('#cs-102').checked){
                courses.CS102 = true;
            }
            firebase.auth().currentUser.getIdToken().then((idToken) => {
                // Pass the ID token to the server along with data
                $.post(
                    '/create-tutor',
                    {
                        idToken: idToken,
                        username: username,
                        password: password,
                        firstName: firstName,
                        lastName: lastName,
                        email: email,
                        availableFrom: availableFrom,
                        availableUpto: availableUpto,
                        location: location,
                        courses: courses
                    },
                    (data, status) => {
                        if (status == 'success' && data) {
                            // const json = JSON.parse(data);
                            // if (json && json.status == 'success') {
                            //     // Force token refresh. The token claims will contain the additional claims.
                            //     firebase.auth().currentUser.getIdToken(true);
                            // }
                            console.log("Students saved successfully");
                        }
                        else {
                            console.log("Error saving student");
                        }
                        redirectToHome();
                    });

            }).catch((error) => {
                console.log(error);
                firebase.auth().signOut();
                window.location = "/";
            });
        }
    </script>
@endsection
