<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = Book::orderBy('book_isbn', 'desc')->get();
        $category = Category::orderBy('category_id', 'desc')->get();
        return view('Library.book')->with('book', $book)->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Menyimpan session data
        Session::flash('book_isbn', $request->book_isbn);
        Session::flash('book_title', $request->book_title);
        Session::flash('book_author', $request->book_author);
        Session::flash('book_publisher', $request->book_publisher);
        Session::flash('book_publication_year', $request->book_publication_year);
        Session::flash('book_category', $request->book_category);
        Session::flash('book_code', $request->book_code);
        Session::flash('book_shelf_location', $request->book_shelf_location);
        Session::flash('book_stock', $request->book_stock);

        // Validasi input
        $request->validate([
            'book_isbn' => 'numeric|required|digits:13|unique:book,book_isbn',
            'book_title' => 'required',
            'book_author' => 'required',
            'book_publisher' => 'required',
            'book_publication_year' => 'required',
            'book_category' => 'required',
            'book_code' => 'required|unique:book,book_code',
            'book_shelf_location' => 'required',
            'book_cover' => 'nullable|mimes:jpg,png,webp|max:2048'
        ]);

        // Validasi dan upload gambar
        if ($request->hasFile('book_cover') && $request->file('book_cover')->isValid()) {
            $coverImage = $request->file('book_cover');
            $coverImageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->storeAs('book_covers', $coverImageName, 'public');
            $data['book_cover'] = $coverImageName;
        } else {
            return back()->withErrors(['book_cover' => 'The book cover image is required and must be a valid image.']);
        }

        // Menyusun data yang akan disimpan
        $status = 1;
        $book_stock_borrowing = 0;
        $data = [
            'book_isbn' => $request->book_isbn,
            'book_title' => $request->book_title,
            'book_author' => $request->book_author,
            'book_publisher' => $request->book_publisher,
            'book_publication_year' => $request->book_publication_year,
            'book_category' => $request->book_category,
            'book_code' => $request->book_code,
            'book_shelf_location' => $request->book_shelf_location,
            'book_stock' => $request->book_stock,
            'book_stock_borrowing' => $book_stock_borrowing,
            'book_status' => $status,
            'book_cover' => $data['book_cover'],
            'book_updated_at' => DB::raw('NOW()'),
            'book_created_at' => DB::raw('NOW()')
        ];

        // Menyimpan data ke database
        Book::create($data);

        return redirect()->to('book')->with('success', 'Successfully added a new book named "' . $request->book_title . '"');
    }

    public function updateBookStatus(Request $request, $id)
    {
        $data = [
            'book_status' => $request->status,
            'book_updated_at' => DB::raw('NOW()')
        ];
        Book::where('book_isbn', $id)->update($data);
        return redirect()->to('book')->with('success', 'Successfully updated member status');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'book_isbn' => 'numeric|required|digits:13|unique:book,book_isbn,' . $id . ',book_isbn',
            'book_title' => 'required',
            'book_author' => 'required',
            'book_publisher' => 'required',
            'book_publication_year' => 'required',
            'book_category' => 'required',
            'book_code' => 'required|unique:book,book_code,' . $id . ',book_isbn',
            'book_shelf_location' => 'required',
            'book_cover' => 'nullable|mimes:jpg,png,webp|max:2048'
        ]);
        $data = [
            'book_isbn' => $request->book_isbn,
            'book_title' => $request->book_title,
            'book_author' => $request->book_author,
            'book_publisher' => $request->book_publisher,
            'book_publication_year' => $request->book_publication_year,
            'book_category' => $request->book_category,
            'book_code' => $request->book_code,
            'book_shelf_location' => $request->book_shelf_location,
            'book_stock' => $request->book_stock,
            'book_updated_at' => DB::raw('NOW()')
        ];
        Book::where('book_isbn', $id)->update($data);
        return redirect()->to('book')->with('success', 'Successfully update a category named "' . $request->book_title . '"');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $book = Book::where('book_isbn', $id)->first();

        if ($book) {
            $bookDeleted = Book::where('book_isbn', $id)->delete();

            if ($bookDeleted) {
                if ($book->book_cover && $book->book_cover !== 'default.jpg') {
                    Storage::disk('public')->delete('book_covers/' . $book->book_cover);
                }
                return redirect()->to('book')->with('success', 'Successfully deleted the book and its cover image.');
            } else {
                return redirect()->to('book')->with('error', 'Failed to delete the book from the database.');
            }
        }

        return redirect()->to('book')->with('error', 'Book not found.');
    }
}
