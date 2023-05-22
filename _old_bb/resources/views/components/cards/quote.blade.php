<?php
/** @var \App\Quote $quote */
$tagClassList = $quote->tags
    ->pluck('name')
    ->map(function ($item) {
        return str_replace(' ', '-', $item);
    })->implode(' ');
?>

<div class="col-lg-4 single-block isotop-item  {{ $quote->category }} {{ $tagClassList }}" data-aos="fade-up">
    <div class="service-block" style="padding-top: 120px;">
        <span class="snow-dot"></span>
        <span class="snow-dot"></span>
        <span class="snow-dot"></span>
        <span class="snow-dot"></span>
        <span class="snow-dot"></span>
        <span class="snow-dot"></span>
        <span class="snow-dot"></span>
        <div class="hover-content"></div>
        <i class="flaticon-value icon-s" style="top: 0px;"></i>
        <h5 class="title icon-s" style="text-align: left; top: 40px;">
            <a href="#">{{ $quote->getAuthorName() }}</a>
        </h5>
        <p>{{ $quote->text }}</p>
        {{--        <a href="#" class="detail-button">--}}
        {{--            <i class="flaticon-next-1"></i>--}}
        {{--        </a>--}}

        <span>
            {{ $quote->description }}
        </span>

        <div>
            @forelse($quote->tags as $tag)
                <a href="{{ route('quotes.index', ['search' =>  $tag->name]) }}">
            <span class="badge badge-pill badge-light">
                {{ $tag->name }}
            </span>
                </a>
            @empty
                No tags
            @endforelse
        </div>
    </div> <!-- /.service-block -->
</div> <!-- /.single-block -->








