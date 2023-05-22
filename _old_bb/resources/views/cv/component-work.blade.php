<div class="col-sm-12">
    <div class="time-item">
        <div class="time-year">
            {{ substr($startDate, 0, 7) }} - {{ empty($endDate) ? 'present' : substr($endDate, 0, 7) }}
        </div>
        <div class="icon-holder-time wow fadeIn" data-wow-delay=".25s">
            <i class="ion-ios-circle-outline"></i>
        </div>
        <h4 class="time-title">
            {{ $company }}
        </h4>
        <h5 class="time-semitag"> {{ $title }} </h5>
        <p>
        <span>
            {{ $summary }}
        </span>
        <ul>
            @foreach($highlights as $highlight)
                <li>
                    <i class="ion-arrow-right-b" style="margin-left: 8px; margin-right: 6px;"></i>
                    {{ $highlight }}
                </li>
            @endforeach
        </ul>
        </p>
    </div>
</div>
