<div class="testi-item">
    <h4>{{ $title }}</h4>
    <div class="testi-bottom">
        @foreach ($achievements as $achievement => $description)
            <p>
                <strong>{{ trim($achievement) }}</strong><i class="ion-arrow-right-b" style="margin-left: 8px; margin-right: 6px;"></i>{{ $description }}
            </p>
        @endforeach
    </div>
</div>
