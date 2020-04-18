<div class="limiter" role="main">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form">
                <span class="login100-form-title p-b-26">
                    Profile
                </span>
                <div class="profile">
                    <div class="avatar">
                        <a href="#"><img src="{{ asset('images/user.jpg') }}" alt="" class="img-raised rounded-circle img-fluid"></a>
                    </div>
                    <div class="name">
                        @if ($role == 2)
                            <h3 class="title">{{ $student->getFirstName() }}</h3>
                            <h6>Student</h6>
                            <h6 class="gap1"><strong>Username</strong> : {{ $student->getUserName() }}</h6>
                            <h6 class="gap1"><strong>Email</strong> : {{ $student->getEmail() }}</h6>
                            <h6 class="gap1"><strong>Courses</strong> :
                                @foreach($student->getCourses() as $key => $course)
                                    {{ $key }} <br/>
                                @endforeach
                            </h6>
                        @endif
                        @if ($role == 3)
                            <h3 class="title">{{ $tutor->getFirstName() }}</h3>
                            <h6>Tutor</h6>
                            <h6 class="gap1"><strong>Username</strong> : {{ $tutor->getUserName() }}</h6>
                            <h6 class="gap1"><strong>Email</strong> : {{ $tutor->getEmail() }}</h6>
                            <h6 class="gap1"><strong>Availability</strong> : {{ $tutor->getAvailability() }}</h6>
                            <h6 class="gap1"><strong>Courses</strong> :
                                @foreach($tutor->getCourses() as $key => $course)
                                    {{ $key }} <br/>
                                @endforeach
                            </h6>
                        @endif
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
