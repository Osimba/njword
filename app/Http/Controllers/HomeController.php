<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        return view('home');
    }

    public function getBook() {
        $books = Book::all();
        return $books->toArray();
    }

    public function getBookChapters(Book $book) {
        $chapters = $book->chapters;
        return $chapters->toArray();
    }
}
