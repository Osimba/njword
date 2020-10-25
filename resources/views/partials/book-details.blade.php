<div class="col-12 col-md-6 list-1">
@foreach ($book->chapters as $chapter)
@if ($loop->iteration == 6)
</div>
<div class="col-12 col-md-6 list-2">
@endif
    <div class="book-details d-flex flex-md-nowrap flex-wrap align-items-center">
        <h4>Chapter {{ $chapter->number }}</h4>
        <div class="d-flex sig-count pl-md-5">
            <span>{{ auth()->user()->signatureCount($chapter->id) }} sig.</span>
            <span>{{ auth()->user()->evaluationCount($chapter->id) }} eval.</span>
        </div>
        <div class="sig-stars">
            @foreach (auth()->user()->signaturesForChapter($chapter->id) as $signature)
                <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="Signature Details" data-placement="top"
                    data-html="true" data-content="<strong>Date:</strong> {{ $signature->sig_date }}<br><strong>Listener:</strong> {{ $signature->from_member }}">
                    <i class="fas fa-star fa-2x {{ $signature->evaluation ? 'book-' . $book->id : 'default' }}-star"></i> 
                </a>
            @endforeach
        </div>
    </div>
@endforeach
</div>