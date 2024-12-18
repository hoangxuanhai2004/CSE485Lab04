<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Hiển thị danh sách sách
    public function index()
    {
        $books = Book::all(); // Lấy tất cả sách
        return view('books.index', compact('books'));
    }

    // Hiển thị form thêm mới sách
    public function create()
    {
        return view('books.create');
    }

    // Lưu sách mới vào database
    public function store(Request $request)
    {
        // Validate dữ liệu nhập vào
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'year' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        // Tạo sách mới
        Book::create($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Thêm sách thành công.');
    }

    // Hiển thị chi tiết một cuốn sách
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // Hiển thị form chỉnh sửa sách
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Cập nhật thông tin sách
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required',
            'author' => 'required',
            'category' => 'required',
            'year' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Cập nhật sách thành công.');
    }

    // Xóa sách
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Xóa sách thành công.');
    }
}
