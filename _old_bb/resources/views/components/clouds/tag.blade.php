{{--<h5>Tags:</h5>--}}
<div class="our-project project-ms-grid">
    <ul class="isotop-menu-wrapper">
        <li class="is-checked" data-filter="*">All</li>
        @foreach($tags as $tag)
            <li data-filter=".{{ str_replace(' ', '-', $tag->name) }}" class="{{ ($search == $tag->name) ? 'is-checked' : '' }}">{{ $tag->name }}</li>
        @endforeach
    </ul>
</div>
