@extends('layouts.app')

@section('content')

    <div id="home-page-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            @for ($i = 0; $i < 3; $i++)
                @php($id = mt_rand(10, 50))
                <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                    <img class="d-block w-100 h-auto"
                         src="https://picsum.photos/id/{{ $id }}/1400/440"
                         width="1400"
                         height="440">
                </div>
            @endfor
        </div>
        <a class="carousel-control-prev" href="#home-page-carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#home-page-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-sm-6 text-center">
                <h1>Welcome to <span class="text-primary">SAND</span></h1>
                <p></p>
                <a class="btn btn-secondary mr-2"
                   href="{{ route('page.about', ['utm_source' => 'home_cta']) }}">Know more</a>
                <a class="btn btn-primary"
                   href="{{ route('page.contact', ['utm_source' => 'home_cta']) }}">Contact us</a>
            </div>
        </div>
    </div>


    <div class="pt-5 pb-4 bg-secondary">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-sm-3 mb-3 d-flex align-items-stretch">
                    <a class="card d-flex align-items-stretch" href="{{ route('student.profile') }}">
                        <div class="card-body text-center">
                            <div class="image mb-3">
                                <img class="img-thumbnail rounded-circle" src="https://picsum.photos/id/237/80/80" alt="">
                            </div>
                            PROFILE
                        </div>
                    </a>
                </div>
                <div class="col-sm-3 mb-3 d-flex align-items-stretch">
                    <div class="card d-flex align-items-stretch">
                        <div class="card-body text-center">
                            <div class="image mb-3">
                                <img class="img-thumbnail rounded-circle" src="https://picsum.photos/id/90/80/80" alt="">
                            </div>
                            CLASSES
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3 d-flex align-items-stretch">
                    <div class="card d-flex align-items-stretch">
                        <div class="card-body text-center">
                            <div class="image mb-3">
                                <img class="img-thumbnail rounded-circle" src="https://picsum.photos/id/340/80/80" alt="">
                            </div>
                            CALENDAR
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-3 d-flex align-items-stretch">
                    <div class="card d-flex align-items-stretch">
                        <div class="card-body text-center">
                            <div class="image mb-3">
                                <img class="img-thumbnail rounded-circle" src="https://picsum.photos/id/242/80/80" alt="">
                            </div>
                            LOGIN
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
