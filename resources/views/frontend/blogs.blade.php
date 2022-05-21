<x-guest-layout>
@section('title', {{$sectiontitle->title}} )
@section('meta-keywords', {{$sectiontitle->title}} )
@section('meta-description', {{ Str::limit($sectiontitle->content, 50, '...') }})

    <header class="container-fluid header"
    style="background-image: url({{ asset('/uploads/sectiontitles/' . $sectiontitle->image) }});background-size: cover;">
        @if (empty($sectiontitle))
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
                    <span>{{ $sectiontitle->title }}</span>
                    <span class="other-color">{{ $sectiontitle->subtitle }}</span>
                </div>
                <div class="normal-text">
                    <p>{!! $sectiontitle->content !!}</p>
                </div>
            </div>
        </div>
        @endif
    </header>

    <!--====== BLOG STANDARD PART START ======-->
    <div class="container-fluid blog-section">
        {{-- <div class="row">
            <div class="col">
                <div class="col-lg-8"> --}}
        <div class="blog-standard">
            @if (count($blogs) == 0)
                <div class="col-md-12">
                    <div class="bg-light py-5">
                        <h3 class="text-center">{{ __('NO BLOG FOUND') }}</h3>
                    </div>
                </div>
            @else
                <div class="row">
                    @forelse ($blogs as $blog)
                        <div class="post-box">
                            <div class="text-holder">
                                <a href="{{ route('front.blogdetails', $blog->slug) }}"
                                    class="title">{{ Str::title($blog->title) }}</a>
                                <div class="text">{{ __('Read More') }}</div>
                                <time datetime="{{ $blog->created_at->format('y-m-d') }}">
                                    {{ $blog->created_at->diffForHumans() }}
                                </time>
                            </div>

                            <div class="img-holder">
                                <img src="{{ asset('uploads/' . $blog->image) }}" alt="">
                            </div>
                        </div>                    
                    @endforeach
                </div>
            @endif
        </div>
        <div class="row mt-30">
            <div class="col-lg-12 text-center">
                <div class="d-inline-block">
                    {{ $blogs->appends(['language' => request()->input('language')])->links() }}
                </div>
            </div>
        </div>
    </div>

    <!--====== BLOG STANDARD PART End ======-->
</x-guest-layout>
