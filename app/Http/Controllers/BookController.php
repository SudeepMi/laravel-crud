<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->paginate(5);
        return view('books.index', compact('books'));
    }
    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'no_of_pages' => 'required|numeric',
            'publish_date' => 'required|date',
        ]);
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->no_of_pages = $request->no_of_pages;
        $book->publish_date = $request->publish_date;
        $book->save();
        return redirect()->route('book.index')->with('success', 'Book created successfully');
    }
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }
    public function update(Request $request, Book $book)
    {
        // validate the data
        $this->validate($request, [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'no_of_pages' => 'required|numeric',
            'publish_date' => 'required|date',
        ]);
        $book->title = $request->title;
        $book->author = $request->author;
        $book->no_of_pages = $request->no_of_pages;
        $book->publish_date = $request->publish_date;
        $book->save();
        return redirect()->route('book.index')->with('success', 'Book updated successfully');
    }
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success', 'Book deleted successfully');
    }

}
