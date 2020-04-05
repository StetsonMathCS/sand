
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }

    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('zmdi-eye');
            $(this).find('i').addClass('zmdi-eye-off');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').addClass('zmdi-eye');
            $(this).find('i').removeClass('zmdi-eye-off');
            showPass = 0;
        }

    });
    var config = {
        apiKey: "AIzaSyBn0pry_oaOh5pH9TzG3hbMKzncmtZhD8Y",
        authDomain: "tutor-app-41763.firebaseapp.com",
        databaseURL: "https://tutor-app-41763.firebaseio.com",
        storageBucket: "tutor-app-41763.appspot.com",
    };
    firebase.initializeApp(config);
    var database = firebase.database();
    var lastIndex = 0;
    $('#registerUser').on('click', function(e){
        e.preventDefault();
        var firstName = $('#first_name').val();
        var lastName = $('#last_name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var userID = Math.floor((Math.random() * 1000) + 1);
        firebase.database().ref('users/' + userID ).set({
            first_name: firstName,
            last_name: lastName,
            email: email,
            password: password
        });
        alert('registration successfull');
        window.location = '/login';
    });

    $('#loginUser').on('click', function(e){
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        var userExist = false;
        firebase.database().ref("users").orderByChild("email").equalTo(email).once("value",snapshot => {
            if (snapshot.exists()){
              const userData = snapshot.val();
              $.each(userData, function(index, item) {
                    if(item.password == password) {
                        userExist = true;
                    }
              });
              if (userExist) {
                    alert('credentials are matched');
                    window.location= '/classes';
                }
                else {
                    alert("invalid credentials provided");
                }
            }
        });
        if(userExist == false) {
            alert("invalid credentials provided");
        }
    });

})(jQuery);
