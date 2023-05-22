<?php
/** @var \App\Photo $photo */

$tagClassList = $photo->tags
    ->pluck('name')
    ->map(function ($item) {
        return str_replace(' ', '-', $item);
    })->implode(' ');
?>

<div class="isotop-item development {{ $photo->category }} {{ $tagClassList }}">
    <div class="effect-zoe">
        <img src="{{ $photo->getThumbnail() }}" alt="{{ $photo->name }}">
        <div class="inner-caption">
            <h2 style="font-size: medium; text-transform: none!important;">
                <a href="{{ $photo->storage_path }}" class="icon zoom fancybox" data-fancybox="images">
                    {{ $photo->name }}
                </a>
            </h2>
            <p class="icon-links">
                <a href="{{ $photo->storage_path }}" class="icon zoom fancybox" data-fancybox="images">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
            </p>
            <p class="description" style="padding: 0;">
                {{ $photo->description }}
                <br>
                @forelse($photo->tags as $tag)
                    <a href="{{ route('photos.index', ['search' =>  $tag->name]) }}">
                        <span class="badge badge-pill badge-dark">
                            {{ $tag->name }}
                        </span>
                    </a>
                @empty
                    No tags
                @endforelse
            </p>
        </div>
    </div>
</div> <!-- /.isotop-item -->


