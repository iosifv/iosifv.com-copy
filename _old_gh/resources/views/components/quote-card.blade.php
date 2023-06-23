<?php
/** @var \App\Quote $quote */
$is_showcase = in_array(
    Route::current()->getName(),
    ['quotes.show', 'quotes.show-slug']
);
?>
<div class="card hoverable" style="height: 100%; width: 100%">
    <div class="card-content waves-effect waves-block waves-light activator" style="text-indent: 2em;">
        {{ $quote->text }}
    </div>
    <div class="card-content">
        <span class="card-title activator grey-text text-darken-4 truncate">
            {{ $quote->getAuthorName() }}
            <i class="material-icons right">more_vert</i>
        </span>
    </div>
    <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">
            {{ $quote->getAuthorName() }}
            <i class="material-icons right">close</i>
        </span>
        <p>{{ $quote->description }}</p>
        <div class="chips">
            @forelse($quote->tags as $tag)
                <div class="chip">
                    {{ $tag->name }}
                </div>
            @empty
                No tags
            @endforelse
        </div>
        @if (!$is_showcase)
            <p>
                <a href="{{ route('quotes.show-slug', ['slug' => $quote->slug]) }}">
                    Showcase
                </a>
            </p>
        @endif
    </div>
</div>
