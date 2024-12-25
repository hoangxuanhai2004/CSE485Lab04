<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Reader;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = 1;
        $borrows = Borrow::with('reader', 'book')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view("borrows.index", compact("borrows", "index"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $readers = Reader::all();
        $books = Book::all();
        return view("borrows.create", compact("readers", "books"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $borrow = $request->validate([
            "book_id" => "required",
            "reader_id" => "required",
            'borrow_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:borrow_date',
        ]);

        Borrow::create($borrow);
        return redirect()->route("borrows.index")->with("success", "You have added a borrow book successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrow = Borrow::with('reader', 'book')
            ->findOrFail($id);
        return view("borrows.show", compact("borrow"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->update(['status' => 1]);
        return redirect()->route('borrows.index')->with('success', 'Return book successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
