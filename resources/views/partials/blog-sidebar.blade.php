<div class="col-xl-4 col-lg-4">
    <div class="rs-sidebar-wrapper rs-sidebar-sticky">
        <div class="sidebar-widget mb-30">
            <div class="sidebar-search">
                <form action="{{ \App\Support\LocalizedRoute::page('blog') }}" method="GET">
                    <div class="sidebar-search-input">
                        <input type="text" name="s" value="{{ request('s') }}" placeholder="{{ __('Searching...') }}">
                        <button type="submit">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.11111 15.2222C12.0385 15.2222 15.2222 12.0385 15.2222 8.11111C15.2222 4.18375 12.0385 1 8.11111 1C4.18375 1 1 4.18375 1 8.11111C1 12.0385 4.18375 15.2222 8.11111 15.2222Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M16.9995 17L13.1328 13.1333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @if(!empty($categories) && count($categories) > 0)
            <div class="sidebar-widget widget-categories-two mb-30">
                <h5 class="sidebar-widget-title">{{ __('Categories') }}</h5>
                <div class="sidebar-widget-content">
                    <div class="list">
                        <ul>
                            @foreach($categories as $categoryName => $count)
                                <li>
                                    <a href="{{ \App\Support\LocalizedRoute::page('blog') }}?category={{ urlencode($categoryName) }}" class="{{ (request('category') === $categoryName) ? 'active' : '' }}">
                                        {{ $categoryName }} ({{ $count }})
                                        <i class="ri-arrow-right-line"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        @if(!empty($recentPosts) && count($recentPosts) > 0)
            <div class="sidebar-widget mb-30">
                <h5 class="sidebar-widget-title">{{ __('Recent Posts') }}</h5>
                <div class="sidebar-widget-content">
                    <div class="sidebar-blog-item-wrapper">
                        @foreach($recentPosts as $rPost)
                            <div class="sidebar-blog-item">
                                <div class="sidebar-blog-thumb">
                                    <a href="{{ $rPost->detailUrl() }}">
                                        <img src="{{ asset($rPost->image) }}" alt="{{ $rPost->t('title') }}">
                                    </a>
                                </div>
                                <div class="sidebar-blog-content">
                                    <h6 class="sidebar-blog-title">
                                        <a href="{{ $rPost->detailUrl() }}">{{ $rPost->t('title') }}</a>
                                    </h6>
                                    <div class="sidebar-blog-meta">
                                        <i class="ri-calendar-line"></i>
                                        <span>{{ $rPost->published_date ?: $rPost->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        @if(!empty($popularTags) && count($popularTags) > 0)
            <div class="sidebar-widget">
                <h5 class="sidebar-widget-title">{{ __('Popular Tags') }}</h5>
                <div class="sidebar-widget-content tagcloud">
                    @foreach($popularTags as $pTag)
                        <a href="{{ \App\Support\LocalizedRoute::page('blog') }}?tag={{ urlencode($pTag) }}" class="{{ (request('tag') === $pTag) ? 'active' : '' }}">{{ $pTag }}</a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

