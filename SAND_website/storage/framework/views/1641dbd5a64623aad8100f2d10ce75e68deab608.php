<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <?php if($role == 1 || $role == 2): ?>
        <!-- Brand -->
        <a class="navbar-brand" href="/students">Students</a>
    <?php endif; ?>


    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <?php if($role == 1 || $role == 3): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/tutors">Tutors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/subjects">Subjects</a>
                </li>
            <?php endif; ?>

            <?php if($role == 1 || $role == 2): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/requests">Requests</a>
                </li>
            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH /Users/milan/Desktop/Bitbucket/repos/Web/Laravel/FirebaseApp/resources/views/includes/nav.blade.php ENDPATH**/ ?>