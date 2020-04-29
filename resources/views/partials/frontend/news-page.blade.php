<div class="news-page">
    <h5 class="header">
        <a href="{{ $newsItem->url }}" target="_blank">{{ $newsItem->title }}</a>
    </h5>
    <div class="sub text-muted">
        <span>{{ $newsItem->date->format('jS F, Y') }}</span>
        @if($newsItem->source)
        <span>Source: <i class="text-primary">{{ $newsItem->source }}</i></span>
        @endif
    </div>

    @if($newsItem->teaser)
    <div class="teaser">{{ $newsItem->teaser }}</div>
    @endif
</div>
