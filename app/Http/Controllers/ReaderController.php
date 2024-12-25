<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reader;

class ReaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
{ 
    $reader = Reader::orderBy('created_at', 'desc')->paginate(10);
    return view('readers.index', compact('reader')); 
}

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
{ 
    return view('readers.create'); 
} 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
{ 
    $reader = Reader::create($request->all()); 
    return redirect()->route('readers.index') ->with('success', 'Added readers successfully!'); 
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reader = Reader::findOrFail($id);
        return view('readers.show', compact('reader'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reader = Reader::findOrFail($id);
        return view('readers.edit', compact('reader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reader = Reader::findOrFail($id);
        $reader->update($request->all());
        return redirect()->route('readers.index') ->with('success','Updated readers successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reader = Reader::findOrFail($id);
        $reader->delete();
        return redirect()->route('readers.index') ->with('success','Deleted readers successfully!');
    }
}
