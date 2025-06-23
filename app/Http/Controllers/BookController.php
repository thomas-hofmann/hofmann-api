<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json($book);
    }

    // Neues Buch speichern
    public function store(Request $request)
    {
        // Optional: Validierung hier ergänzen

        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    // Buch updaten
    public function update(Request $request, $id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->update($request->all());
        return response()->json($book);
    }

    // Buch löschen
    public function destroy($id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();
        return response()->json(null, 204);
    }
}