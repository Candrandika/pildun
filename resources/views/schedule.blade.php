@extends('layout.layout')

@section('title', 'Jadwal')

@section('content')
    @inject('carbon', 'Carbon\Carbon')

    <div class="container mt-4">
        <div id="carouselIndex" class="carousel slide carousel-fade" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselIndex" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carouselIndex" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carouselIndex" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/assets/image/other/carousel-index-1.jpg" class="d-block w-100" alt="" style="filter: brightness(70%)">
                </div>
                <div class="carousel-item">
                    <img src="/assets/image/other/carousel-index-2.jpg" class="d-block w-100" alt="" style="filter: brightness(70%)">
                </div>
                <div class="carousel-item">
                    <img src="/assets/image/other/carousel-index-3.jpg" class="d-block w-100" alt="" style="filter: brightness(70%)">
                </div>
            </div>
            <button type="button" class="carousel-control-prev" type="button" data-bs-target="#carouselIndex" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button type="button" class="carousel-control-next" type="button" data-bs-target="#carouselIndex" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="text-center h2 fw-bold my-4">
        Jadwal Piala Dunia
    </div>
    <div class="container">
        <div class="row">
            @foreach ($schedule as $sch)
            <div class="col-sm-12 col-md-12 col-lg-6 mb-3">
                <div class="card p-2 px-auto">
                    <div class="row">
                        <div class="col-12 text-center">Group {{ $sch->group }}</div>
                        <div class="col-5 d-flex flex-column" style="place-items: center; place-content: center;">
                            <img src="{{ $sch->team1->image }}" class="border w-50" alt="{{ $sch->team1->name }}">
                            <div class="fw-bold text-center">{{ $sch->team1->name }}</div>
                        </div>
                        <div class="col-2 text-center h3 d-flex" style="place-items:  center; place-content: center;">VS</div>
                        <div class="col-5 d-flex flex-column" style="place-items: center; place-content: center;">
                            <img src="{{ $sch->team2->image }}" class="border w-50" alt="{{ $sch->team2->name }}">
                            <div class="fw-bold text-center">{{ $sch->team2->name }}</div>
                        </div>
                        <div class="col-12">
                            <div class="text-center fw-bold">
                                {{ $carbon->parse($sch->time)->isoFormat('DD-MM-YYYY') }}
                            </div>
                            <div class="text-center">
                                {{ $carbon->parse($sch->time)->isoFormat('HH:mm') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection