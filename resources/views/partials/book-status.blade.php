@php
    switch($book->id) {

        case 1:
            $color = '#f7b653';
        break;

        case 2:
            $color = '#448922';
        break;

        case 3:
            $color = '#dc6d37';
        break;

        case 4:
            $color = '#3886d7';
        break;

        case 5:
            $color = '#6c398c';
        break;

        case 6:
            $color = '#0d5897';
        break;

        case 7:
            $color = '#55c9ee';
        break;

    }
@endphp

<div class="d-flex mx-auto book-status">
    <span class="w-10">{{ $book->short }}</span>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" 
            role="progressbar" style="width: {{ auth()->user()->getBookPercentage($book->id) }}%; background-color: {{ $color }};" 
            aria-valuenow="{{ auth()->user()->getBookPercentage($book->id) }}" aria-valuemin="0" 
            aria-valuemax="100">{{ auth()->user()->getBookPercentage($book->id) }}%</div>
    </div>
    <span class="w-10">{{ auth()->user()->getBookPercentage($book->id) / 10 }}/10</span>
</div>