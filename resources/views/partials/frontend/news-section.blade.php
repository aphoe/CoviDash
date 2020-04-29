<div class="news-section">
    <h6 class="heading">
        <a href="{{ $newsItem->url }}" target="_blank">{{ $newsItem->title }}</a>
        <small>
            {{ $newsItem->date->format('jS M, Y') }}
            @if($newsItem->source)
                | Source: <span class="text-bold">{{ $newsItem->source }}</span>
            @endif
        </small>
    </h6>
</div>
