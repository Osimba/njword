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

@foreach ($book->chapters as $chapter)
    <div class="book-details d-flex flex-wrap align-items-center">

        <h4>Chapter {{ $chapter->number }}</h4>
        <div class="d-flex sig-count">
            <span>{{ auth()->user()->signatureCount($chapter->id) }} sig.</span>
            <span>{{ auth()->user()->evaluationCount($chapter->id) }} eval.</span>
        </div>
        <div class="sig-stars">
            @foreach (auth()->user()->signaturesForChapter($chapter->id) as $signature)
                <i class="fas fa-star fa-2x" style="color: {{ $signature->evaluation ? $color : '#ffe300' }};"></i> 
            @endforeach
        </div>
    </div>
@endforeach