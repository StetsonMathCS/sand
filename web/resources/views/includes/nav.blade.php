<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    @if ($role == 1)
        <!-- Brand -->
        <a class="navbar-brand" href="/students">Students</a>
    @endif


    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            @if ($role == 1)
                <li class="nav-item">
                    <a class="nav-link" href="/tutors">Tutors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/subjects">Subjects</a>
                </li>
            @endif

            @if ($role == 1 || $role == 2 || $role == 3)
                <li class="nav-item">
                    <a class="nav-link" href="/requests">Requests</a>
                </li>
            @endif

            @if ($role == 2 ||$role == 3)
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>
