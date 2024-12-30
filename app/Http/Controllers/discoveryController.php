<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Member;
use Illuminate\Http\Request;

class discoveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rowCount = 10;
        $search = $request->search;

        if (strlen($search)) {
            $book = Book::where('book_status', 1)
                ->where(function ($query) use ($search) {
                    $query->where('book_title', 'like', "%$search%")
                        ->orWhere('book_isbn', 'like', "%$search%")
                        ->orWhere('book_category', 'like', "%$search%")
                        ->orWhere('book_publisher', 'like', "%$search%")
                        ->orWhere('book_code', 'like', "%$search%")
                        ->orWhere('book_author', 'like', "%$search%");
                })
                ->paginate($rowCount);
        } else {
            $book = Book::where('book_status', 1)
                ->orderBy('book_created_at', 'desc')
                ->paginate($rowCount);
        }

        $members = Member::where('member_status', 1)
            ->orderBy('member_id', 'desc')
            ->get();

        return view('library.index')->with('book', $book)->with('members', $members);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
