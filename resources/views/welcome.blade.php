@extends('layouts.app')

@section('content')

    <h1 class="text-center mt-3">New Jerusalem with the Word of God Festival</h1>
    {{-- <div class="home-banner">
        <div class="home-header"></div>
    </div> --}}

    <section class="my-5">
        @foreach ($books as $book)
            @include('partials.book-status', ['book' => $book])
            
        @endforeach
    </section>

    <hr>

    <section class="books-nav my-5 px-4">
        <nav>
            <div class="nav nav-pills nav-fill mb-3" role="tablist">
                @foreach ($books as $book)
                    <a class="nav-link book-{{ $book->id }}-color {{ ($book->id == auth()->user()->currentBook()) ? 'active' : '' }}" id="book-{{ $book->id }}-tab" 
                        data-toggle="tab" href="#book-{{ $book->id }}" role="tab"  aria-controls="book-{{ $book->id }}" aria-selected="true">
                        {{ $book->name }}
                    </a>
                @endforeach
            </div>
        </nav>
        <section class="tab-content" id="nav-tabContent">
            @foreach ($books as $book)
                <article class="tab-pane fade {{ ($book->id == auth()->user()->currentBook()) ? 'show active' : '' }}" id="book-{{ $book->id }}" role="tabpanel" aria-labelledby="book-{{ $book->id }}-tab">
                    @include('partials.book-details', ['book' => $book])
                </article>
            @endforeach
            
        </section>
    </section>

    <hr>

    @include('partials.signature')

    <hr>

    @include('partials.evaluation')

    <transition name="fade">
        <toast title="" message=""></toast>
    </transition>

@endsection