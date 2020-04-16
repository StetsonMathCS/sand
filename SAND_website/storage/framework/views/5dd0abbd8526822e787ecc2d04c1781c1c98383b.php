<?php $__env->startSection('content'); ?>
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

                    <button id="login" class="txt2" onclick="window.location='<?php echo e(url("/")); ?>'">Login</button>
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
                    '/create-student',
                    {
                        idToken: idToken,
                        username: username,
                        password: password,
                        firstName: firstName,
                        lastName: lastName,
                        email: email,
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/milan/Desktop/Bitbucket/repos/Web/Laravel/FirebaseApp/resources/views/signup_students.blade.php ENDPATH**/ ?>