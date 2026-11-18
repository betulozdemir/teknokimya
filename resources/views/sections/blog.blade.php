<!-- blog area start -->
@php
    $featuredPost = ($blogPosts ?? collect())->first();
    $sidePosts = ($blogPosts ?? collect())->skip(1);
@endphp
<section id="{{ \App\Support\LocalizedRoute::sectionId('blog') }}" class="rs-blog-area section-space rs-blog-one has-theme-light-blue">
    <div class="container has-large">
        <div class="row">
            <div class="col-lg-12">
                <div class="rs-section-subtitle-wrapper">
                    <span class="rs-section-subtitle has-theme-light-blue justify-content-start">
                        {{ __('Current Affairs') }}
                    </span>
                    <div class="rs-section-border-line"></div>
                </div>
            </div>
        </div>
        <div class="row g-5 section-title-space align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="rs-section-title-wrapper">
                    <h2 class="rs-section-title has-theme-light-blue rs-split-text-enable split-in-fade">{{ __('Latest News and Blog') }}</h2>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="rs-blog-btn">
                    <a class="rs-btn has-theme-light-blue has-icon has-bg" href="{{ \App\Support\LocalizedRoute::page('blog') }}">{{ __('Read More Post') }}
                        <span class="icon-box">
                            <svg class="icon-first" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z"></path>
                            </svg>
                            <svg class="icon-second" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z"></path>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row g-5">
            @if($featuredPost)
                <div class="col-xl-6 col-lg-6">
                    <div class="rs-blog-item has-thumb-height wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="1s">
                        <div class="has-bg rs-blog-bg-thumb" data-background="{{ asset($featuredPost->image) }}"></div>
                        <div class="rs-blog-content has-position">
                            <div class="rs-blog-meta">
                                <div class="rs-blog-meta-item has-white">
                                    <span>{{ __('By') }} <a class="rs-blog-meta-author" href="#">{{ $featuredPost->author }}</a></span>
                                </div>
                                @if($featuredPost->published_date)
                                    <div class="rs-blog-meta-item has-white">
                                        <span>{{ $featuredPost->published_date }}</span>
                                    </div>
                                @endif
                            </div>
                            <h3 class="rs-blog-title has-white has-big underline">
                                <a href="{{ $featuredPost->detailUrl() }}">{{ $featuredPost->t('title') }}</a>
                            </h3>
                            <p class="rs-blog-description has-white">{{ $featuredPost->t('excerpt') }}</p>
                            <div class="rs-blog-tag has-white has-theme-blue">
                                <a href="{{ \App\Support\LocalizedRoute::page('blog') }}?category={{ urlencode($featuredPost->category) }}">{{ $featuredPost->t('category') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-xl-6 col-lg-6">
                <div class="row g-5 wow fadeInRight" data-wow-delay=".3s" data-wow-duration="1s">
                    @foreach($sidePosts as $post)
                        <div class="col-12">
                            <div class="rs-blog-item has-grid">
                                <div class="rs-blog-content has-padding order-1 order-sm-0">
                                    <div class="rs-blog-meta">
                                        <div class="rs-blog-meta-item">
                                            <span>{{ __('By') }} <a class="rs-blog-meta-author" href="#">{{ $post->author }}</a></span>
                                        </div>
                                        @if($post->published_date)
                                            <div class="rs-blog-meta-item">
                                                <span>{{ $post->published_date }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <h5 class="rs-blog-title underline has-black">
                                        <a href="{{ $post->detailUrl() }}">{{ $post->t('title') }}</a>
                                    </h5>
                                    <p class="rs-blog-description">{{ $post->t('excerpt') }}</p>
                                    <div class="rs-blog-tag has-theme-blue">
                                        <a href="{{ \App\Support\LocalizedRoute::page('blog') }}?category={{ urlencode($post->category) }}">{{ $post->t('category') }}</a>
                                    </div>
                                </div>
                                <div class="rs-blog-thumb order-0 order-sm-1">
                                    <a href="{{ $post->detailUrl() }}">
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->t('title') }}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- blog area end -->
