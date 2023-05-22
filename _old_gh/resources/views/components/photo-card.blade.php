<?php
/** @var \App\Photo $photo */
$is_showcase = in_array(
    Route::current()->getName(),
    ['photos.show', 'photos.show-slug']
);
?>
<div class="card hoverable center-align" style="height: 100%; width: 100%">
    <a href="{{ route('photos.show-slug', ['slug' => $photo->slug]) }}">
        <img src="{{ $photo->storage_path }}" class="responsive-img">
    </a>
    <div class="card-content">
        <span class="card-title activator grey-text text-darken-4 truncate">
            {{ $photo->name }}
            <i class="material-icons right">more_vert</i>
        </span>
    </div>
    <div class="card-reveal">
        <span class="card-title grey-text text-darken-4">
            {{ $photo->name }}
            <i class="material-icons right">close</i>
        </span>
        <p>{{ $photo->description }}</p>
        <div class="chips">
            @forelse($photo->tags as $tag)
                <div class="chip">
                    {{ $tag->name }}
                </div>
            @empty
                No tags
            @endforelse
        </div>
        @if (!$is_showcase)
            <p>
                <a href="{{ route('photos.show-slug', ['slug' => $photo->slug]) }}">
                    Showcase
                </a>
            </p>
        @endif
    </div>
</div>
