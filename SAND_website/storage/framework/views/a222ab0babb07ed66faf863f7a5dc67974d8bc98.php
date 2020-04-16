<div class="limiter container">
    <br /><br />
    <h1 class="text-center bg-info">Manage Courses</h1>
    <br />
    <div class="row container-row100">
        <!-- Insertion Column -->
        <div class="col-sm-4">
            <div class="wrap-col100">
                <form class="login100-form validate-form" method="post" action="/student_course">
                    <?php echo e(csrf_field()); ?>

                    <span class="col100-form-title p-b-26">
                        Assign Courses to Students
                    </span>
                    <div class="form-group">
                        <label for="stdCourse">Select Course:</label>
                        <select class="form-control" id="stdCourse"  required="required" name="stdCourse">
                            <?php for($i=0; $i<count($courses); $i++): ?>
                                <option value="<?php echo e($courses[$i]->getCode()); ?>"><?php echo e($courses[$i]->getTitle()); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="stdUserName">Select Student:</label>
                        <select class="form-control" id="stdUserName"  required="required" name="stdUserName">
                            <?php for($i=0; $i<count($students); $i++): ?>
                                <option value="<?php echo e($students[$i]->getUid()); ?>"><?php echo e($students[$i]->getFirstName()); ?> <?php echo e($students[$i]->getLastName()); ?></option>
                            <?php endfor; ?>
                        </select>
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
            <h2>Students &amp; Courses</h2>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Courses</th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0; $i<count($students); $i++): ?>
                    <tr>
                        <td><?php echo e($students[$i]->getUserName()); ?></td>
                        <td><?php echo e($students[$i]->getFirstName()); ?></td>
                        <td><?php echo e($students[$i]->getLastName()); ?></td>
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

    <!-- Manage Courses for the Teachers -->
    <br />
    <hr />
    <br />
    <div class="row container-row100">
        <!-- Insertion Column -->
        <div class="col-sm-4">
            <div class="wrap-col100">
                <form class="login100-form validate-form" method="post" action="/tutor_course">
                    <?php echo e(csrf_field()); ?>

                    <span class="col100-form-title p-b-26">
                        Assign Courses To Tutors
                    </span>
                    <div class="form-group">
                        <label for="tutorCourse">Select Course:</label>
                        <select class="form-control" id="tutorCourse"  required="required" name="tutorCourse">
                            <?php for($i=0; $i<count($courses); $i++): ?>
                                <option value="<?php echo e($courses[$i]->getCode()); ?>"><?php echo e($courses[$i]->getTitle()); ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tutorUserName">Select Tutor:</label>
                        <select class="form-control" id="tutorUserName"  required="required" name="tutorUserName">
                            <?php for($i=0; $i<count($tutors); $i++): ?>
                                <option value="<?php echo e($tutors[$i]->getUid()); ?>"><?php echo e($tutors[$i]->getFirstName()); ?> <?php echo e($tutors[$i]->getLastName()); ?></option>
                            <?php endfor; ?>
                        </select>
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
            <h2>Tutors &amp; Courses</h2>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Courses</th>
                </tr>
                </thead>
                <tbody>
                <?php for($i=0; $i<count($tutors); $i++): ?>
                    <tr>
                        <td><?php echo e($tutors[$i]->getUserName()); ?></td>
                        <td><?php echo e($tutors[$i]->getFirstName()); ?></td>
                        <td><?php echo e($tutors[$i]->getLastName()); ?></td>
                        <td>
                            <?php $__currentLoopData = $tutors[$i]->getCourses(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH /Users/milan/Desktop/Bitbucket/repos/Web/Laravel/FirebaseApp/resources/views/subjects_ui.blade.php ENDPATH**/ ?>