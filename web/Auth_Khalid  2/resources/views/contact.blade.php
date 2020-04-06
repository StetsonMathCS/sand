@extends('layouts.app')

@section('title', 'Contact us')

@section('content')
    <div class="container">

        <form action="{{ route('page.contact', ['utm_source' => 'contact_form']) }}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="card my-3">
                        <div class="card-body">
                            <h1>Contact us</h1>
                            <p></p>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea type="email" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
