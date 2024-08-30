@extends('layouts.app')

@section('content')

<!-- Resume Section -->
<section id="resume" class="resume section">

    <div class="container">

        <div class="row">

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3 class="resume-title">Summary</h3>

                <div class="resume-item pb-4">
                    <h4>{{$experiences['summary']['name']}}</h4>
                    <p><em>{{$experiences['summary']['description']}}</em></p>
                    <ul>
                        @foreach ($experiences['summary']['contact'] as $contact)
                        <li>{{ $contact }}</li>
                        @endforeach
                    </ul>
                </div><!-- Edn Resume Item -->

                <h3 class="resume-title">Education</h3>
                @foreach ($experiences['education'] as $edu)
                <div class="resume-item pb-4">
                    <h4>{{$edu['degree']}}</h4>
                    <h5>{{$edu['years']}}</h5>
                    <p><em>{{$edu['institution']}}</em></p>
                    <p>{{$edu['details']}}</p>
                </div><!-- Edn Resume Item -->
                @endforeach

            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <h3 class="resume-title">Professional Experience</h3>

                @foreach ($experiences['experience'] as $experience)
                <div class="resume-item pb-4">
                    <h4>{{$experience['title']}}</h4>
                    <h5>{{$experience['years']}}</h5>
                    <p><em>{{$experience['company']}}</em></p>
                    <ul>
                        @foreach ($experience['details'] as $exp)
                        <li>{{$exp}}</li>
                        @endforeach

                    </ul>
                </div><!-- Edn Resume Item -->
                @endforeach
            </div>

        </div>

    </div>

</section><!-- /Resume Section -->

@endsection