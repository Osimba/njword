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
                <Tab v-for="book in {{ $books }}" :key="book.id"
                    :name="book.name" :color="'book-' + book.id + '-color'"
                    :selected="(book.id === {{ auth()->user()->currentBook() }})">
                    <chapter-details v-for="chapter in book.chapters"
                        :chapter="chapter"
                        :bookcolor="book.color"></chapter-details>
                </Tab>
        </tab-list>
    </section>
    <div class="signatureWrap">
        <Signature v-on:signature-added="updateBookStatus($event)"></Signature>
    </div>

    <transition name="fade">
        <Toast title="" message=""></Toast>
    </transition>

@endsection