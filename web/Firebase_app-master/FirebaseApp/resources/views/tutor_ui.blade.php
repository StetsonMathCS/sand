<div class="main" role="main">
    <div class="col-md-10 offset-sm-1">
        <br/><br/>
        <h1 class="text-center bg-info">Manage Tutors</h1>
        <div class="row">
            <!-- Insertion Column -->
            <div class="col-md-4">
                <h2>Create New Tutor</h2>

                <form method="post" action="/tutors">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="userName">UserName:</label>
                        <input type="text" class="form-control" placeholder="Enter Username"  required="required" name="userName"
                               id="userName">
                    </div>

                    <div class="form-group">
                        <label for="firstName">FirstName:</label>
                        <input type="text" class="form-control" placeholder="Enter Firstname"  required="required" name="firstName"
                               id="firstName">
                    </div>

                    <div class="form-group">
                        <label for="lastName">LastName:</label>
                        <input type="text" class="form-control" placeholder="Enter Lastname"  required="required" name="lastName"
                               id="lastName">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter password"  required="required" name="password"
                               id="pwd">
                    </div>

                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" placeholder="Enter email"  required="required" name="email" id="email">
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
                        <label for="streetAddress">Street Address:</label>
                        <input type="text" class="form-control"  required="required" placeholder="Enter Address Address" name="streetAddress"
                               id="streetAddress">
                    </div>

                    <div class="form-group">
                        <label for="city">city:</label>
                        <input type="text" class="form-control"  required="required" placeholder="Enter City" name="city" id="city">
                    </div>

                    <div class="form-group">
                        <label for="state">State:</label>
                        <input type="text" class="form-control"  required="required" placeholder="Enter State" name="state" id="state">
                    </div>

                    <div class="form-group">
                        <label for="zipCode">Zip Code:</label>
                        <input type="text" class="form-control"  required="required" placeholder="Enter zipCode" name="zipCode" id="zipCode">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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
                    @for($i=0; $i<count($tutors); $i++)
                        <tr>
                            <td>{{ $tutors[$i]->getUserName() }}</td>
                            <td>{{ $tutors[$i]->getFirstName() }}</td>
                            <td>{{ $tutors[$i]->getLastName() }}</td>
                            <td>{{ $tutors[$i]->getEmail() }}</td>
                            <td>{{ $tutors[$i]->getRating() }}</td>
                            <td>
                                @foreach($tutors[$i]->getCourses() as $key => $course)
                                    {{ $key}} <br/>
                                @endforeach
                            </td>
                            <td>
                                {{$tutors[$i]->getLocation()->getStreetAddress()}} <br/>
                                {{$tutors[$i]->getLocation()->getCity()}},
                                {{$tutors[$i]->getLocation()->getState()}} {{$tutors[$i]->getLocation()->getZipCode()}}
                                <br/><br/><br/>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>