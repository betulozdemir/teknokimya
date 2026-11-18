<!-- services area start -->
<section id="{{ \App\Support\LocalizedRoute::sectionId('services') }}" class="rs-services-area section-space-top rs-services-six">
    <div class="container has-large">
        <div class="row">
            <div class="col-lg-12">
                <div class="rs-section-subtitle-wrapper">
                    <span class="rs-section-subtitle has-theme-light-blue justify-content-start">
                        {{ __('Our Services') }}
                    </span>
                    <div class="rs-section-border-line"></div>
                </div>
            </div>
        </div>
        <div class="row g-5 section-title-space align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-7">
                <div class="rs-section-title-wrapper">
                    <h2 class="rs-section-title has-theme-light-blue rs-split-text-enable split-in-fade">
                        {{ __('Creative features form production industry') }}
                    </h2>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-5">
                <div class="rs-services-btn">
                    <a class="rs-btn has-theme-light-blue has-icon has-bg" href="{{ \App\Support\LocalizedRoute::page('services') }}">{{ __('More Services') }}
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
        <div class="row g-5 process-counts">
            @foreach(($services ?? collect())->take(4) as $service)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="rs-services-item wow fadeInUp" data-wow-delay=".{{ 3 + ($loop->index * 2) }}s" data-wow-duration="1s">
                        <div class="rs-services-bg-thumb" data-background="{{ asset('assets/images/shape/service-shape.png') }}"></div>
                        <h4 class="rs-services-title underline has-theme-blue">
                            <a href="{{ $service->detailUrl() }}">{{ $service->t('title') }}</a>
                        </h4>
                        <p class="descrip">{{ $service->t('description') }}</p>
                        <div class="rs-services-icon">
                            <a class="rs-btn has-icon has-transparent-btn" href="{{ $service->detailUrl() }}">
                                <span class="icon-box">
                                    <svg class="icon-first" xmlns="http://www.w3.org/2000/svg" width="26" height="12" viewBox="0 0 26 12" fill="none">
                                        <path opacity="0.6" d="M25.5303 6.53033C25.8232 6.23743 25.8232 5.76256 25.5303 5.46967L20.7574 0.696697C20.4645 0.403804 19.9896 0.403804 19.6967 0.696697C19.4038 0.989591 19.4038 1.46446 19.6967 1.75736L23.9393 6L19.6967 10.2426C19.4038 10.5355 19.4038 11.0104 19.6967 11.3033C19.9896 11.5962 20.4645 11.5962 20.7574 11.3033L25.5303 6.53033ZM6.55671e-08 6.75L25 6.75L25 5.25L-6.55671e-08 5.25L6.55671e-08 6.75Z" fill="#616161"></path>
                                    </svg>
                                    <svg class="icon-second" xmlns="http://www.w3.org/2000/svg" width="26" height="12" viewBox="0 0 26 12" fill="none">
                                        <path opacity="0.6" d="M25.5303 6.53033C25.8232 6.23743 25.8232 5.76256 25.5303 5.46967L20.7574 0.696697C20.4645 0.403804 19.9896 0.403804 19.6967 0.696697C19.4038 0.989591 19.4038 1.46446 19.6967 1.75736L23.9393 6L19.6967 10.2426C19.4038 10.5355 19.4038 11.0104 19.6967 11.3033C19.9896 11.5962 20.4645 11.5962 20.7574 11.3033L25.5303 6.53033ZM6.55671e-08 6.75L25 6.75L25 5.25L-6.55671e-08 5.25L6.55671e-08 6.75Z" fill="#616161"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        @if($service->image)
                            <div class="rs-services-thumb">
                                <img src="{{ asset($service->image) }}" alt="{{ $service->t('title') }}">
                            </div>
                        @endif
                        <div class="rs-services-number"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- services area end -->
