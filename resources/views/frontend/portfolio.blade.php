<x-guest-layout>
{{-- @section('meta-keywords', "$seo->blog_meta_key")
@section('meta-description', "$seo->blog_meta_desc") --}}

    <header class="container-fluid header">
        <div class="mouse-scroll"></div>
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
    </header>
    <div class="container-fluid box-content">
        <div class="row">
            @foreach ($portfolios as $item)
                <div class="col-md-6">
                    <div class="boxy img-box">
                        <div class="img"><img
                                style="background-image: url({{ asset('assets/front/img/portfolio/' . $item->featured_image) }})"
                                alt=""></div>
                        <div class="bottom-text">
                            {{-- <div class="link">VIEW THIS PROJECT</div> --}}
                            <div class="text">{{ $item->service->title }}</div>
                        </div>
                        <a href="{{ route('front.portfolioDetails', $item->slug) }}" class="project-link-full"></a>
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
    <div class="container-fluid other-content">
        <div class="row">
            <div class="col">
                <div class="lg-text">have a project<br>for us?</div>
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