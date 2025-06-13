<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Alle Bücher holen
    public function index()
    {
        $books = Book::all();
        return response()->json($books);
    }

    // Einzelnes Buch anzeigen
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return response()->json($book);
    }

    // Neues Buch speichern
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    // Buch updaten
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return response()->json($book);
    }

    // Buch löschen
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return response()->json(null, 204);
    }
}