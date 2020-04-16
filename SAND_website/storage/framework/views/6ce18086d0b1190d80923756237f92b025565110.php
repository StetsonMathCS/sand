<div class="limiter" role="main">
    <div class="col-md-10 offset-sm-1">
        <br/><br/>
        <h1 class="text-center bg-info">Manage Tutors</h1>
        <div class="row container-row100">
            <!-- Insertion Column -->
            <div class="col-md-4">
                <div class="wrap-col100">
                    <form class="login100-form validate-form" method="post" action="/tutors">
                        <?php echo e(csrf_field()); ?>

                        <span class="col100-form-title p-b-26">
                            Create New Tutor
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

                        <div class="form-group">
                            <label for="rating">Select Rating:</label>
                            <select class="form-control" id="rating"  required="required" name="rating">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="wrap-input100 validate-input" data-validate = "">
                                <input id="streetAddress" class="input100" type="text" name="streetAddress" required="required">
                                <span class="focus-input100" data-placeholder="Enter Street Address"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="wrap-input100 validate-input" data-validate = "">
                                <input id="city" class="input100" type="text" name="city" required="required">
                                <span class="focus-input100" data-placeholder="Enter City"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="wrap-input100 validate-input" data-validate = "">
                                <input id="state" class="input100" type="text" name="state" required="required">
                                <span class="focus-input100" data-placeholder="Enter State"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="wrap-input100 validate-input" data-validate = "">
                                <input id="zipCode" class="input100" type="text" name="zipCode" required="required">
                                <span class="focus-input100" data-placeholder="Enter ZipCode"></span>
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
            <div class="col-md-8">
                <h2>Existing Tutors</h2>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Rating</th>
                        <th>Courses</th>
                        <th>Location</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for($i=0; $i<count($tutors); $i++): ?>
                        <tr>
                            <td><?php echo e($tutors[$i]->getUserName()); ?></td>
                            <td><?php echo e($tutors[$i]->getFirstName()); ?></td>
                            <td><?php echo e($tutors[$i]->getLastName()); ?></td>
                            <td><?php echo e($tutors[$i]->getEmail()); ?></td>
                            <td><?php echo e($tutors[$i]->getRating()); ?></td>
                            <td>
                                <?php $__currentLoopData = $tutors[$i]->getCourses(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($key); ?> <br/>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php echo e($tutors[$i]->getLocation()->getStreetAddress()); ?> <br/>
                                <?php echo e($tutors[$i]->getLocation()->getCity()); ?>,
                                <?php echo e($tutors[$i]->getLocation()->getState()); ?> <?php echo e($tutors[$i]->getLocation()->getZipCode()); ?>

                                <br/><br/><br/>
                            </td>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/muhannadnasser/Desktop/turkiPhase1/FirebaseApp/resources/views/tutor_ui.blade.php ENDPATH**/ ?>