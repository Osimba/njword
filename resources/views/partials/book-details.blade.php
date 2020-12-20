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
                <a class="signature-popovers" data-details="signature-{{ $signature->id }}" tabindex="0" role="button" data-toggle="popover" data-placement="top"
                    data-template="<div class='popover signature-{{ $signature->id }}-popover' role='tooltip'><div class='arrow'></div><h3 class='popover-header'></h3><div class='popover-body'></div></div>">
                    <i class="fas fa-star fa-2x {{ $signature->evaluation ? 'book-' . $book->id : 'default' }}-star"></i> 
                </a>
                
                <div id="signature-{{ $signature->id }}" class="signature-detail-body" style="display: none;">
                    <strong>Date: </strong>
                    <p class="date">{{ $signature->sig_date }}</p>

                    <strong>Listener: </strong>
                    <p class="listener">{{ $signature->from_member }}</p>  
                </div>
            @endforeach
        </div>
    </div>
@endforeach
</div>