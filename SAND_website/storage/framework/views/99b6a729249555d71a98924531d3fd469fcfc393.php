<div class="limiter container">
    <br /><br />
    <h1 class="text-center bg-info">Manage Students</h1>
    <div class="row container-row100">
        <!-- Insertion Column -->
        <div class="col-sm-4">
            <div class="wrap-col100">
                <form class="login100-form validate-form" method="post" action="/students">
                    <?php echo e(csrf_field()); ?>

                    <span class="col100-form-title p-b-26">
                        Create New Student
                    </span>
                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate = "">
                            <input id="userName" class="input100" type="text" name="userName" required="required">
                            <span class="focus-input100" data-placeholder="Username"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate = "">
                            <input id="firstName" class="input100" type="text" name="firstName" required="required">
                            <span class="focus-input100" data-placeholder="First Name"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate = "">
                            <input id="lastName" class="input100" type="text" name="lastName" required="required">
                            <span class="focus-input100" data-placeholder="Last Name"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <span class="btn-show-pass">
                                <i class="zmdi zmdi-eye"></i>
                            </span>
                            <input id="pwd" class="input100" type="password" name="password" required="required">
                            <span class="focus-input100" data-placeholder="Password"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="wrap-input100 validate-input" data-validate = "">
                            <input id="email" class="input100" type="text" name="email" required="required">
                            <span class="focus-input100" data-placeholder="Email"></span>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <!-- Display Column -->
        <div class="col-sm-8">
            <h2>Existing Students</h2>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Courses</th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0; $i<count($students); $i++): ?>
                    <tr>
                        <td><?php echo e($students[$i]->getUserName()); ?></td>
                        <td><?php echo e($students[$i]->getFirstName()); ?></td>
                        <td><?php echo e($students[$i]->getLastName()); ?></td>
                        <td><?php echo e($students[$i]->getEmail()); ?></td>
                        <td>
                            <?php $__currentLoopData = $students[$i]->getCourses(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($key); ?> <br />
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </td>
                    </tr>
                <?php endfor; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH /Users/milan/Desktop/Bitbucket/repos/Web/Laravel/FirebaseApp/resources/views/students_ui.blade.php ENDPATH**/ ?>