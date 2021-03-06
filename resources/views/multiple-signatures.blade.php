@extends('layouts.app')

@section('content')

    <section class="give-sig">
        <h2 class="text-center mb-4">Add Signature</h2>

        <form action="{{ route('signature') }}" method="POST">
            @csrf
            <div class="form-inline justify-content-around">
                <input class="form-control col" type="date" name="sig_date" id="sig_date">
                <input type="text" name="from_member" id="from_member" class="form-control col">
                <select name="chapter" id="chapter" class="form-control">
                    @foreach ($chapters as $chapter)
                        <option value="{{ $chapter->id }}">{{ $chapter->book->short }}: {{ $chapter->title }}</option>
                    @endforeach
                </select>
                <input class="btn btn-success" type="submit" value="Add Signature">
            </div>
        </form>
    </section>
@endsection