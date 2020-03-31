<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Firebase Auth</title>

	    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/menu.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.9.1/firebase-database.js"></script>

        <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyBkVtnKqRP0NuKhm-fE3T-zUxrXDcoMN10",
            authDomain: "fir-auth-1abb3.firebaseapp.com",
            databaseURL: "https://fir-auth-1abb3.firebaseio.com",
            projectId: "fir-auth-1abb3",
            storageBucket: "fir-auth-1abb3.appspot.com",
            messagingSenderId: "3617861763",
            appId: "1:3617861763:web:878dd163ecad12eb2debb6"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        </script>
        <script>
            function isUserLoggedIn() {
                return firebase.auth().currentUser != null;
            }

            function redirectToHome() {
                window.location = "home";
            }

            function redirectToLogin() {
                window.location = "/";
            }

            (function () {
                firebase.database().ref("courses").once("value",snapshot => {
                    if (snapshot.exists()){
                        console.log("courses already exist!");
                        return;
                    }
                    firebase.database().ref("courses").set({
                        "Math101": {
                            "title": "Math 101"
                        },
                        "CS101": {
                            "title": "Introduction to Computing"
                        },
                        "CS102": {
                            "title": "Introduction to Programming"
                        }
                    }, (error) => {

                        if(error) {
                            console.log("Error saving courses data:"+error.message);
                        }
                        else{
                            console.log("courses data saved successfully");
                        }
                    });
                });
            }());
        </script>
        <div class="limiter">
            @yield('content')
        </div>

        <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	    <script src="{{ asset('js/main.js') }}"></script>

    </body>
</html>
