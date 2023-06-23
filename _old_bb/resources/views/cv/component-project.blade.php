<div class="testi-item">
    <h4>{{ !$hide ? $title : 'hidden title' }}</h4>
    @if( isset($url) && !$hide )
        <a href="{{ $url }}">{{ $url }}</a>
    @else
        <p>[private repository]</p>
    @endif
    <div class="testi-bottom-slim">
        <ul>
            @foreach($highlights as $highlight)
                <li>
                    <i class="ion-arrow-right-b" style="margin-left: 8px; margin-right: 6px;"></i>
                    {{ $highlight }}</li>
            @endforeach
        </ul>
    </div>
</div>
