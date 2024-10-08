@extends('layouts.app')

@section('content')

<!-- Portfolio Details Section -->
<section id="portfolio-details" class="portfolio-details section">
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="text-center">{{$project['name']}}</h1>
                        <p>{{$project['description']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-8">
                <img src="{{ asset('assets/images/projects/' . $project['image']) }}" alt="{{ $project['name'] }}" class="img-fluid">
            </div>

            <div class="col-lg-4">
                <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                    <h3>Project information</h3>
                    <ul>
                        <li><strong>Project Name</strong>: {{ $project['name'] }}</li>
                        <li><strong>Category</strong>: Web design</li>
                        <li><strong>Client</strong>: ASU Company</li>
                        <li><strong>Project date</strong>: 01 March, 2020</li>
                        <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                        <li><strong>Description</strong>: {{ $project['description'] }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section><!-- /Portfolio Details Section -->

@endsection