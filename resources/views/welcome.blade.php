@extends('layouts.app')

@section('content')

    <h1 class="text-center mt-3">New Jerusalem with the Word of God Festival</h1>

    <section class="my-5">
        <Status 
            v-for="book in {{ $books }}" :key="book.id"
            ref="books" :book="book"
        ></Status>
    </section>

    <hr>

    <section class="books-nav my-5 px-4">
        <tab-list>
            @foreach ($books as $book)
                <Tab name="{{ $book->name }}" color="book-{{ $book->id }}-color"
                    :selected="{{ ($book->id == auth()->user()->currentBook()) ? 'true' : 'false' }}">
                    <h1>Content for {{ $book->name }}</h1>
                </Tab>
            @endforeach
        </tab-list>
        {{-- <nav>
            <div class="nav nav-pills nav-fill mb-3" role="tablist">
                @foreach ($books as $book)
                    <a @click="selectBook" class="nav-link book-{{ $book->id }}-color {{ ($book->id == auth()->user()->currentBook()) ? 'active' : '' }}" id="{{ $book->id }}" 
                        data-toggle="tab" href="#book-{{ $book->id }}" role="tab"  aria-controls="book-{{ $book->id }}" aria-selected="true">
                        {{ $book->name }}
                    </a>
                @endforeach
            </div>
        </nav>
        <section class="tab-content book-details-list" id="nav-tabContent">
            @foreach ($books as $book)
                <article class="tab-pane fade {{ ($book->id == auth()->user()->currentBook()) ? 'show active' : '' }}" 
                    id="book-{{ $book->id }}" role="tabpanel" aria-labelledby="book-{{ $book->id }}-tab">
                    @include('partials.book-details', ['book' => $book])
                </article>
            @endforeach
            <article v-for="book in {{ $books }}" :key="book.id"
                class="tab-pane fade" id="book-{ book.id }" role="tabpanel"
                aria-labelledby="book-{ book.id }-tab" ref="details" v-show="">
                <chapter-details :bookcolor="book.color"></chapter-details>
            </article>
        </section> --}}
    </section>
    <div class="signatureWrap">
        <Signature v-on:signature-added="updateBookStatus($event)"></Signature>
    </div>

    <transition name="fade">
        <Toast title="" message=""></Toast>
    </transition>

@endsection