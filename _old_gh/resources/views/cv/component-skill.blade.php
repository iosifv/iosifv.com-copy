<div class="testi-item">
    <h4>{{ $title }}</h4>
    <div class="testi-bottom">
        @foreach ($skills as $skill => $description)
            <p>
                <strong>{{ $skill }}</strong><i class="ion-arrow-right-b" style="margin-left: 8px; margin-right: 6px;"></i>{{ $description }}
            </p>
        @endforeach
    </div>
</div>
