<div class="col-sm-12">
    <div class="time-item">
        <div class="time-year">
            {{ $time }}
        </div>
        <div class="icon-holder-time wow fadeIn" data-wow-delay=".25s">
            <i class="ion-ios-circle-outline"></i>
        </div>
        <h4 class="time-title">
            {{ $company }}
        </h4>
        <h5 class="time-semitag"> {{ $title }} </h5>
        <p>
        @foreach($details as $detail => $value)
            <strong>{{ ucfirst($detail) }}: </strong>{{ $value }} <br>
        @endforeach
        </p>
    </div>
</div>
