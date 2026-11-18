<!-- feature area start -->
<section class="rs-feature-area rs-feature-five section-space">
    <div class="container has-large">
        <div class="row g-5">
            @foreach($features ?? [] as $feature)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="rs-feature-item wow fadeInUp" data-wow-delay=".{{ 3 + ($loop->index * 2) }}s" data-wow-duration="1s">
                        <div class="rs-feature-bg-thumb" data-background="{{ asset('assets/images/bg/features-bg-02.png') }}"></div>
                        <div class="rs-feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                                <path d="M25 50C11.1929 50 0 38.8071 0 25C0 11.1929 11.1929 0 25 0C38.8071 0 50 11.1929 50 25C50 38.8071 38.8071 50 25 50ZM25 47.9167C37.6565 47.9167 47.9167 37.6565 47.9167 25C47.9167 12.3435 37.6565 2.08333 25 2.08333C12.3435 2.08333 2.08333 12.3435 2.08333 25C2.08333 37.6565 12.3435 47.9167 25 47.9167Z" fill="white"></path>
                                <path d="M28.125 29.166C29.8509 29.166 31.25 27.7669 31.25 26.041C31.25 24.3151 29.8509 22.916 28.125 22.916C26.3991 22.916 25 24.3151 25 26.041C25 27.7669 26.3991 29.166 28.125 29.166Z" fill="white"></path>
                            </svg>
                        </div>
                        <h5 class="rs-feature-title">{{ $feature->t('title') }}</h5>
                        <div class="rs-feature-descrip">
                            <p>{{ $feature->t('description') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- feature area end -->
