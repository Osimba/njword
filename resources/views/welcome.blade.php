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
        <Tab-List>
            <Tab v-for="book in {{ $books }}" :key="book.id"
                :name="book.name" :color="'book-' + book.id + '-color'"
                :selected="(book.id === {{ auth()->user()->currentBook() }})">
                <div class="col-12 col-md-6 list-1">
                    <Chapter-Details v-for="(chapter, i) in book.chapters.slice(0,5)" :key="i"
                        :chapter="chapter"
                        :bookcolor="book.color"></Chapter-Details>
                </div>
                <div class="col-12 col-md-6 list-2">
                    <Chapter-Details v-for="(chapter, i) in book.chapters.slice(5)" :key="i"
                        :chapter="chapter"
                        :bookcolor="book.color"></Chapter-Details>
                </div>
            </Tab>
        </Tab-List>
    </section>
    <div class="signatureWrap">
        <Signature v-on:signature-added="updateBookStatus($event)"></Signature>
    </div>
    
    <Toast title="" message=""></Toast>
@endsection