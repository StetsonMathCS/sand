<div class="container">
    <br /><br />
    <h1 class="text-center bg-info">Manage Students</h1>
    <div class="row">
        <!-- Insertion Column -->
        <div class="col-sm-4">
            <h2>Create New Student</h2>

            <form method="post" action="/students">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label for="userName">UserName:</label>
                    <input type="text" class="form-control" required="required" placeholder="Enter Username" name="userName" id="userName">
                </div>

                <div class="form-group">
                    <label for="firstName">FirstName:</label>
                    <input type="text" class="form-control"  required="required" placeholder="Enter Firstname" name="firstName" id="firstName">
                </div>

                <div class="form-group">
                    <label for="lastName">LastName:</label>
                    <input type="text" class="form-control"  required="required" placeholder="Enter Lastname" name="lastName"  id="lastName">
                </div>

                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control"  required="required" placeholder="Enter password" name="password"  id="pwd">
                </div>

                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control"  required="required" placeholder="Enter email" name="email"  id="email">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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
</div><?php /**PATH /Users/muhannadnasser/Desktop/gggggg/untitled folder/FirebaseApp/resources/views/students_ui.blade.php ENDPATH**/ ?>