@extends('layouts.app')

@section('title', $post->t('title') . ' || ' . ($settings['site_title'] ?? 'Teknokimya'))

@section('content')
    <!-- breadcrumb area start -->
    <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
        <div class="rs-breadcrumb-bg" data-background="{{ asset($settings['breadcrumb_bg_image'] ?? 'assets/images/bg/breadcrumb-bg-01.png') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-8 col-lg-8">
                    <div class="rs-breadcrumb-content-wrapper">
                        <div class="rs-breadcrumb-title-wrapper">
                            <h1 class="rs-breadcrumb-title">{{ $post->t('title') }}</h1>
                        </div>
                        <div class="rs-breadcrumb-menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ \App\Support\LocalizedRoute::page('home') }}">{{ __('Home') }}</a></span></li>
                                    <li><span><a href="{{ \App\Support\LocalizedRoute::page('blog') }}">{{ __('Blog') }}</a></span></li>
                                    <li><span>{{ $post->t('title') }}</span></li>
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
                    <div class="rs-postbox-details-wrapper">
                        <div class="rs-postbox-details-thumb">
                            <img src="{{ asset($post->image) }}" alt="{{ $post->t('title') }}">
                        </div>
                        <div class="rs-postbox-content">
                            <div class="rs-postbox-meta-list">
                                <div class="rs-postbox-meta-item">
                                    <span class="rs-meta-text">{{ __('By') }} <a class="meta-author" href="#">{{ $post->author }}</a></span>
                                </div>
                                <div class="rs-postbox-meta-item">
                                    <span class="rs-postbox-meta-text">{{ $post->published_date ?: $post->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                            <h3 class="rs-postbox-details-title">
                                {{ $post->t('title') }}
                            </h3>
                        </div>
                        <div class="rs-postbox-details-content">
                            @if($post->t('content'))
                                {!! $post->t('content') !!}
                            @else
                                <p>{{ $post->t('excerpt') }}</p>
                                <p>Teknokimya olarak endüstriyel kimya, yüzey işlem teknolojileri ve galvano kimyasalları alanında modern üretim tekniklerini ve yüksek kalite standartlarını sunmaya devam ediyoruz.</p>
                                <div class="rs-postbox-quote quote-two">
                                    <blockquote>
                                        <p>“Sürdürülebilir kimya ve yüksek verimlilik sunan yüzey kaplama proseslerimizle endüstrinin ihtiyaçlarına değer katıyoruz.”</p>
                                        <cite>Teknokimya Ar-Ge ve Laboratuvar Ekibi</cite>
                                    </blockquote>
                                </div>
                                <p>Yüksek korozyon dayanımı, üstün parlaklık ve homojen kaplama kalınlığı sağlayan çözümlerimiz; otomotivden beyaz eşyaya, savunma sanayisinden elektronik bileşenlere kadar geniş bir yelpazede güvenle tercih edilmektedir.</p>
                            @endif

                            @if(!empty($post->tags_array))
                                <div class="rs-postbox-details-tags tagcloud mt-4">
                                    @foreach($post->tags_array as $tag)
                                        <a href="{{ \App\Support\LocalizedRoute::page('blog') }}?tag={{ urlencode($tag) }}">{{ $tag }}</a>
                                    @endforeach
                                </div>
                            @endif

                            <div class="rs-postbox-comment-form">
                                <div class="rs-postbox-comments-title mt-45 mb-30">
                                    <h4 class="mb-15">{{ __('Leave a Comment') }}</h4>
                                    <p>{{ __('Your email address will not be published. Required fields are marked *') }}</p>
                                </div>
                                <form action="#" method="POST" onsubmit="event.preventDefault(); alert('{{ __('Yorumunuz incelenmek üzere iletildi.') }}');">
                                    <div class="row g-4">
                                        <div class="col-xl-6">
                                            <div class="input-box">
                                                <input type="text" placeholder="{{ __('Name') }} *" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="input-box">
                                                <input type="email" placeholder="{{ __('Email') }} *" required>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="input-box">
                                                <textarea cols="30" rows="6" placeholder="{{ __('Type Comment here') }} *" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="rs-postbox-comment-btn">
                                                <button class="rs-btn has-theme-orange" type="submit">{{ __('Post Comment') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @include('partials.blog-sidebar')
            </div>
        </div>
    </section>
    <!-- postbox area end -->
@endsection

