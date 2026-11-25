<!-- text slider area start -->
@php
    $marqueeItems = collect($sliders ?? [])
        ->flatMap(fn ($s) => array_filter([$s->t('title'), $s->t('highlight_text'), $s->t('subtitle')]))
        ->merge(collect($services ?? [])->map(fn ($srv) => $srv->t('title')))
        ->filter()
        ->unique()
        ->values();
@endphp
@if($marqueeItems->isNotEmpty())
<div class="rs-text-slide-area rs-text-slide-two">
    <div class="container has-large">
        <div class="row">
            <div class="col-lg-12">
                <div class="rs-text-slide-wrapper">
                    <div class="gsap-marquee right speed-20 move-to-1000">
                        <div class="rs-text-slide-inner">
                            @foreach($marqueeItems as $item)
                                <div class="rs-text-slide-item">
                                    <h2 class="rs-text-slide-title">{{ $loop->first ? '' : '• ' }}{{ $item }}</h2>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- text slider area end -->

