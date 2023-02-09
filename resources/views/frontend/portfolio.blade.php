<x-guest-layout>
    @section('title', $section->title )
    @section('meta-keywords', $section->title )
@section('meta-description', {{ Str::limit($section->content, 20, '...') }})

    <header class="container-fluid header"
    style="background-image: url({{ asset('/uploads/sections/' . $section->image) }});background-size: cover;">
        @if (empty($section))
            <div class="row">
                <div class="col">
                    <div class="extra-lg-text">
                        <span>perfection is</span><br>
                        <span>not a myth</span><br>
                        <span class="other-color">check our</span><br>
                        <span class="other-color">work.</span>
                    </div>
                </div>
            </div>
        @else
            <div>
                <div class="flex-grow">
                    <div class="lg-text">
                        <span>{{ $section->title }}</span>
                        <span class="other-color">{{ $section->subtitle }}</span>
                    </div>
                    <div class="normal-text">
                        <p>{!! $section->content !!}</p>
                    </div>
                </div>
            </div>
        @endif
    </header>
    <div class="container-fluid box-content">
        <div class="flex flex-wrap">
            @foreach ($portfolios as $portfolio)
                <div class="my-4 px-4 sm:w-full md:w-full lg:w-full xl:w-1/3">
                    <div class="boxy img-box">
                        <div class="img">
                            <img style="background-image: url({{ asset('uploads/portfolios/' . $portfolio->featured_image) }})"
                                alt="{{ $portfolio->title }}">
                        </div>
                        <div class="bottom-text">
                            <a href="{{ route('front.portfolioDetails', $portfolio->slug) }}">
                                <div class="link">{{ $portfolio->title }}</div>
                                <div class="text">{{ $portfolio->service->title }}</div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="d-inline-block"> {{ $portfolios->links() }}</div>
        </div>
    </div>
    <div class="container-fluid clients-section">
        <div class="row">
            <div class="col">
                <div class="lg-text">
                    <span>DELIGHTING OUR</span><br>
                    <span>CLIENTS IS OUR</span><br>
                    <span>MISSION.</span>
                </div>
                <div class="normal-text">
                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising<br> pain
                        was born and I will give you a complete account of the system.</p>
                </div>
                <div class="clients-logos">
                    <div class="logo-holder"><img src="images/client1.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client2.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client3.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client4.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client5.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client6.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client7.png" alt=""></div>
                    <div class="logo-holder"><img src="images/client8.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
