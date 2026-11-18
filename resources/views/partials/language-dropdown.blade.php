@php
    $current = app()->getLocale();
    $languages = [
        'tr' => ['code' => 'TR', 'name' => 'Türkçe', 'flag' => '🇹🇷'],
        'en' => ['code' => 'EN', 'name' => 'English', 'flag' => '🇬🇧'],
        'ar' => ['code' => 'AR', 'name' => 'العربية', 'flag' => '🇸🇦'],
    ];
    $activeLang = $languages[$current] ?? $languages['tr'];
@endphp

<div class="tk-lang-dropdown">
    <button type="button" class="tk-lang-toggle" aria-expanded="false" title="{{ __('Dil Seçimi / Language') }}">
        <span class="tk-lang-flag">{{ $activeLang['flag'] }}</span>
        <span class="tk-lang-current">{{ $activeLang['code'] }}</span>
        <i class="ri-arrow-down-s-line tk-arrow-icon"></i>
    </button>
    <ul class="tk-lang-menu">
        @foreach($languages as $loc => $data)
            <li>
                <a href="{{ route('locale.switch', $loc) }}" class="tk-lang-item {{ $current === $loc ? 'active' : '' }}">
                    <span class="d-flex align-items-center gap-2">
                        <span class="tk-flag-emoji">{{ $data['flag'] }}</span>
                        <span class="tk-lang-name">{{ $data['name'] }}</span>
                    </span>
                    <span class="d-flex align-items-center gap-2">
                        <span class="tk-lang-code-badge">{{ $data['code'] }}</span>
                        @if($current === $loc)
                            <i class="ri-check-line tk-check-icon"></i>
                        @endif
                    </span>
                </a>
            </li>
        @endforeach
    </ul>
</div>

