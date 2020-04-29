<div class="news-section">
    <h5 class="heading">
        {{ $newsItem->title }}
        <br>
        <small>
            {{ $newsItem->date->format('jS M, Y') }}
            @if($newsItem->source)
                | Source: <span class="text-bold">{{ $newsItem->source }}</span>
            @endif
        </small>
    </h5>
</div>
