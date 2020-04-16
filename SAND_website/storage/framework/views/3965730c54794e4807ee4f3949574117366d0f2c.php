<?php $__env->startSection('content'); ?>

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
        function onUserLoggedIn() {
            ///log user out
            firebase.auth().signOut().then(() => {
                // Sign-out successful.
            }).catch((error) => {
                // An error happened.
                var errorCode = error.code;
                var errorMessage = error.message;
                alert(errorMessage);
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/muhannadnasser/Desktop/gggggg/untitled folder/FirebaseApp/resources/views/logout.blade.php ENDPATH**/ ?>