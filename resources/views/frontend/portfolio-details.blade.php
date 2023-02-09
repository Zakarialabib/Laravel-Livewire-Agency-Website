<x-guest-layout>
    @section('title', $portfolio->title )
    @section('meta-keywords', "$portfolio->meta_keywords")
@section('meta-description', "$portfolio->meta_description")

    <header class="container-fluid header"
    style="background-color:{{ $theme_color }};">
        <div class="row">
            <div class="col">
                <div class="xl:text-6xl lg:text-5xl md:text-5xl sm:text-4xl lg-text">
                    <span>{{ $portfolio->title }}</span>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid project-info">
        <div class="row">
            <div class="col">
                <div class="normal-text">
                    <p>{!! $portfolio->content !!}</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid project-info">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="text-box">
                    <div class="title">{{ __('Client') }}</div>
                    <p>{{ $portfolio->client_name }}</p>
                </div>
            </div>
            @if ($portfolio->link)
                <div class="col-sm-6 col-md-3">
                    <div class="text-box">
                        <div class="title">{{ __('Website') }}</div>
                        <p><a href="{{ $portfolio->link }}">{{ $portfolio->link }}</a></p>
                    </div>
                </div>
            @endif
            <div class="col-sm-6 col-md-3">
                <div class="text-box">
                    <div class="title">Sector</div>
                    <p>{{ $portfolio->service->title }}</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="text-box">
                    <div class="title">Deliverables</div>
                    <p>Branding<br>
                        Branding Strategy<br>
                        Naming & verbal identity<br>
                        Launch & brand campaigns</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid project-imgs">
        <div class="row">
            @if (empty($portfolio->gallery))
                <div class="col">
                    <div class="img-holder">
                        <img src="images/project1-img1.png" alt="">
                    </div>
                    <div class="img-holder">
                        <img src="images/project1-img2.png" alt="">
                    </div>
                    <div class="img-holder">
                        <img src="images/project1-img3.png" alt="">
                    </div>
                </div>
            @else
                <div class="col">
                    @php
                        $images = json_decode($portfolio->gallery, true);
                    @endphp
                    @foreach ($images as $photo)
                        <div class="img-holder">
                            <img src="{{ asset('uploads/' . $photo) }}" alt="">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    <div class="container-fluid other-content">
        <div class="row">
            <div class="col">
                <div class="xl:text-5xl lg:text-xl md:text-lg sm:text-lg lg-text">have a project<br>for us?</div>
                <div class="normal-text">
                    <p>Contact us and we’ll send you the brief form to fill.<br>
                        Then we’ll contact you within 24 hours.</p>
                </div>
                <div class="btn-holder">
                    <a href="#" class="cr-btn ex-padding">let’s cre8</a>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
