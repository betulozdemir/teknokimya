<!-- team area start -->
<section id="{{ \App\Support\LocalizedRoute::sectionId('team') }}" class="rs-team-area rs-team-one has-theme-light-blue">
    <div class="container has-large">
        <div class="row">
            <div class="col-lg-12">
                <div class="rs-section-subtitle-wrapper">
                    <span class="rs-section-subtitle has-theme-light-blue justify-content-start">
                        {{ __('Our Engineer') }}
                    </span>
                    <div class="rs-section-border-line"></div>
                </div>
            </div>
        </div>
        <div class="row g-5 section-title-space align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="rs-section-title-wrapper">
                    <h2 class="rs-section-title has-theme-light-blue rs-split-text-enable split-in-fade">{{ __('The best industry experts') }}</h2>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="rs-team-btn">
                    <a class="rs-btn has-theme-light-blue has-icon has-bg" href="#{{ \App\Support\LocalizedRoute::sectionId('team') }}">{{ __('View More Member') }}
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
            @foreach($teamMembers ?? [] as $member)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="rs-team-item wow fadeInUp" data-wow-delay=".{{ 3 + ($loop->index * 2) }}s" data-wow-duration="1s">
                        <div class="rs-team-thumb">
                            <a href="#{{ \App\Support\LocalizedRoute::sectionId('team') }}"><img src="{{ asset($member->image) }}" alt="{{ $member->t('name') }}"></a>
                            <div class="rs-theme-social rs-team-social has-transparent">
                                @if($member->twitter_url)
                                    <a href="{{ $member->twitter_url }}"><i class="ri-twitter-x-line"></i></a>
                                @endif
                                @if($member->facebook_url)
                                    <a href="{{ $member->facebook_url }}"><i class="ri-facebook-fill"></i></a>
                                @endif
                                @if($member->linkedin_url)
                                    <a href="{{ $member->linkedin_url }}"><i class="ri-linkedin-fill"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="rs-team-content-wrapper">
                            <div class="rs-team-content-box">
                                <h5 class="rs-team-title"><a href="#{{ \App\Support\LocalizedRoute::sectionId('team') }}">{{ $member->t('name') }}</a></h5>
                                <span class="rs-team-designation">{{ $member->t('designation') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- team area end -->
