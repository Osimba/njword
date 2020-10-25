<?php

namespace App\Http\Controllers;

use App\Book;
use App\Chapter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $books = Book::all();
        $chapters = Chapter::all();
        return view('welcome', compact('books', 'chapters'));
    }

    public function getBook() {
        $books = Book::all();
        return $books->toArray();
    }

    public function getBookChapters(Book $book) {
        $chapters = $book->chapters;
        return $chapters->toArray();
    }

    public function getStatus(Book $book) {
        $status = request()->user()->getBookPercentage($book->id);
        return response()->json([
            'status' => $status
        ]);
    }
}
