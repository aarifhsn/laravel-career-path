@extends('layouts.app')

@section('content')

<section id="portfolio" class="portfolio section">
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="text-center">Projects</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad sequi cupiditate alias quis inventore magnam quaerat ipsa esse nulla fuga culpa aperiam nam, non distinctio. Reprehenderit veritatis autem harum dolor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row gy-4 isotope-container"
            data-aos="fade-up"
            data-aos-delay="200">
            @if(!empty($projects) && is_array($projects))
            @foreach ($projects as $project)
            <div
                class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                <div class="portfolio-content h-100">
                    <img
                        src="{{asset('assets/images/projects/' . $project['image'])}}"
                        class="img-fluid"
                        alt="{{$project['name']}}" />
                    <div class="portfolio-info">
                        <h4>{{$project['name']}}</h4>
                        <p>{{$project['description']}}</p>
                        <a
                            href="#"
                            title="{{$project['name']}}"
                            data-bs-toggle="modal"
                            data-bs-target="#imageModal{{ $project['id'] }}"
                            class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        <a
                            href="{{route('project-details', ['id' => $project['id']]) }}"
                            title="More Details"
                            class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                </div>
            </div>

            <!-- Modal for Enlarging Image -->
            <div class="modal fade" id="imageModal{{ $project['id'] }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $project['id'] }}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <img
                                src="{{ asset('assets/images/projects/' . $project['image']) }}"
                                class="img-fluid"
                                alt="{{ $project['name'] }}">
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

            @else
            <p>No projects found.</p>
            @endif
        </div>
    </div>
</section>
@endsection