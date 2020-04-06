@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-5 mb-5">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center">
                            <div class="fa-2x text-primary">
                                <i class="fa fa-user-circle fa-2x"></i>
                            </div>
                            <h1 class="h2 text-center my-3">
                                {{ auth()->user()->firstName }}
                                {{ auth()->user()->lastName }}
                            </h1>
                        </div>

                        <table class="table">
                            <tbody>
                            <tr>
                                <th>Username</th>
                                <td>{{ auth()->user()->userName }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ auth()->user()->email }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ back()->getTargetUrl() }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-2"></i> Go Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 mb-5">
                <div class="card">
                    <div class="card-header">
                        Courses
                    </div>
                    <div class="card-body">
                        @php($courses = auth()->user()->courses(true))
                        <table class="table mb-0">
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <th>{{ $course->id }}</th>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->creditHours }} hrs</td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
