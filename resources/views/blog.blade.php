@extends('layouts.app')

@section('title', __('Blog') . ' || ' . ($settings['site_title'] ?? 'Teknokimya'))

@section('content')
    <!-- breadcrumb area start -->
    <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
        <div class="rs-breadcrumb-bg" data-background="{{ asset($settings['breadcrumb_bg_image'] ?? 'assets/images/bg/breadcrumb-bg-01.png') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-8 col-lg-8">
                    <div class="rs-breadcrumb-content-wrapper">
                        <div class="rs-breadcrumb-title-wrapper">
                            <h1 class="rs-breadcrumb-title">{{ __('Blog') }}</h1>
                        </div>
                        <div class="rs-breadcrumb-menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ \App\Support\LocalizedRoute::page('home') }}">{{ __('Home') }}</a></span></li>
                                    <li><span>{{ __('Blog') }}</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- postbox area start -->
    <section class="rs-postbox-area section-space">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-8 col-lg-8">
                    <div class="rs-postbox-wrapper">
                        @if(request('category'))
                            <div class="alert alert-light border mb-4 d-flex justify-content-between align-items-center">
                                <span>{{ __('Kategori:') }} <strong>{{ request('category') }}</strong></span>
                                <a href="{{ \App\Support\LocalizedRoute::page('blog') }}" class="btn btn-sm btn-outline-secondary">{{ __('Tümünü Göster') }}</a>
                            </div>
                        @elseif(request('tag'))
                            <div class="alert alert-light border mb-4 d-flex justify-content-between align-items-center">
                                <span>{{ __('Etiket:') }} <strong>{{ request('tag') }}</strong></span>
                                <a href="{{ \App\Support\LocalizedRoute::page('blog') }}" class="btn btn-sm btn-outline-secondary">{{ __('Tümünü Göster') }}</a>
                            </div>
                        @elseif(request('s'))
                            <div class="alert alert-light border mb-4 d-flex justify-content-between align-items-center">
                                <span>{{ __('Arama:') }} <strong>{{ request('s') }}</strong></span>
                                <a href="{{ \App\Support\LocalizedRoute::page('blog') }}" class="btn btn-sm btn-outline-secondary">{{ __('Tümünü Göster') }}</a>
                            </div>
                        @endif

                        @forelse($blogPosts as $post)
                            <article class="rs-postbox-item">
                                <div class="rs-postbox-thumb">
                                    <a href="{{ $post->detailUrl() }}">
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->t('title') }}">
                                    </a>
                                    <div class="rs-postbox-tag">
                                        <a href="{{ \App\Support\LocalizedRoute::page('blog') }}?category={{ urlencode($post->category) }}">{{ $post->t('category') }}</a>
                                    </div>
                                </div>
                                <div class="rs-postbox-content">
                                    <div class="rs-postbox-meta-list">
                                        <div class="rs-postbox-meta-item">
                                            <span class="rs-meta-text">{{ __('By') }} <a class="meta-author" href="{{ $post->detailUrl() }}">{{ $post->author }}</a></span>
                                        </div>
                                        <div class="rs-postbox-meta-item">
                                            <span class="rs-postbox-meta-text"><a href="{{ $post->detailUrl() }}">{{ $post->published_date ?: $post->created_at->format('M d, Y') }}</a></span>
                                        </div>
                                    </div>
                                    <h3 class="rs-postbox-title">
                                        <a href="{{ $post->detailUrl() }}">{{ $post->t('title') }}</a>
                                    </h3>
                                    <div class="rs-postbox-text">
                                        <p>{{ $post->t('excerpt') }}</p>
                                    </div>
                                    <div class="rs-postbox-btn">
                                        <a class="rs-btn has-theme-orange has-icon has-bg" href="{{ $post->detailUrl() }}">{{ __('Continue Reading') }}
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
                            </article>
                        @empty
                            <div class="alert alert-light border text-center p-5">
                                <i class="ri-article-line display-4 text-muted mb-3 d-block"></i>
                                <h5>{{ __('Yazı bulunamadı') }}</h5>
                                <p class="text-muted mb-0">{{ __('Aramanıza veya seçtiğiniz kategoriye uygun blog yazısı bulunamadı.') }}</p>
                            </div>
                        @endforelse
                    </div>

                    @if($blogPosts->hasPages())
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="pagination-wrapper mt-40">
                                    <div class="common-pagination text-start">
                                        {{ $blogPosts->links('partials.pagination') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                @include('partials.blog-sidebar')
            </div>
        </div>
    </section>
    <!-- postbox area end -->
@endsection

