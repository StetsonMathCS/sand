@extends('layouts.app')
@section('content')
    <div class="container-login100">
        <div class="wrap-login100">
                <span class="login100-form-title p-b-26">
                    Home
                </span>

                <div>
                    <p>UserName: <span id="username" class="txt3"></span></p>
                    <p>First Name: <span id="firstname" class="txt3"></span></p>
                    <p>Last Name: <span id="lastname" class="txt3"></span></p>
                    <p>Email: <span id="email" class="txt3"></span></p>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button id="sign-out" class="login100-form-btn">
                            Sign Out
                        </button>
                    </div>
                </div>
        </div>
    </div>

    <script>
        firebase.auth().onAuthStateChanged(function(user) {
            if(user) {
                 console.log('User is signed in');
                 onUserLoggedIn();
            }
            else {
                console.log('User is logged out');
                redirectToLogin();
            }
        });
    </script>
    <script>
        document.querySelector('#sign-out').addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            firebase.auth().signOut().then(() => {
                // Sign-out successful.
            }).catch((error) => {
                // An error happened.
                var errorCode = error.code;
                var errorMessage = error.message;
                alert(errorMessage);
            });
        });

    </script>
    <script>
        function onUserLoggedIn() {
            //Get the user data
            var studentRef = firebase.database().ref('students/'+firebase.auth().currentUser.uid);
            studentRef.once("value",snapshot => {
                if (snapshot.exists()){
                    console.log("User data fetched!");
                    document.querySelector('#username').textContent = snapshot.val().username;
                    document.querySelector('#firstname').textContent = snapshot.val().firstName;
                    document.querySelector('#lastname').textContent = snapshot.val().lastName;
                    document.querySelector('#email').textContent = snapshot.val().email;
                    return;
                }
            });
        }
    </script>
@endsection
