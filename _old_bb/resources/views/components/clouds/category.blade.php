{{--<h5>Categories:</h5>--}}
<div class="our-project project-ms-grid">
<ul class="isotop-menu-wrapper">
    <li class="is-checked" data-filter="*">All</li>
    @foreach($categories as $category)
        <li data-filter=".{{ $category }}" class="{{ ($search == $category) ? 'is-checked' : '' }}">{{ $category }}</li>
    @endforeach
</ul>
</div>
