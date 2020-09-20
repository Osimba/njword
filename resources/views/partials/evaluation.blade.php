<section class="give-sig">
    <h2 class="text-center mb-4">Add Evaluation</h2>

    <form action="{{ route('evaluation') }}" method="POST" id="eval-form">
        @csrf
        <div class="form-inline justify-content-around">
            <select name="chapter" id="chapter" class="form-control">
                @foreach ($chapters as $chapter)
                    <option value="{{ $chapter->id }}">{{ $chapter->book->short }}: {{ $chapter->title }}</option>
                @endforeach
            </select>
            <input class="form-control col col-sm-1" type="date" name="eval_date" id="eval_date">
            <input type="text" name="from_member" id="from_member" class="form-control col" placeholder="Evaluator">
            <input class="btn btn-success" type="submit" value="Add Evaluation">
        </div>
    </form>
</section>