<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class borrowingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Borrowing::orderBy('borrowing_start_date', 'desc')->get();
        return view('Library.borrowing')->with('data', $data);
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
        $member_id = $request->member_id;
        $book_isbn = $request->book_isbn;

        $member = Member::where('member_id', $member_id)->first(['member_name']);
        $book = Book::where('book_isbn', $book_isbn)->first(['book_title', 'book_code', 'book_shelf_location', 'book_cover', 'book_stock']);

        if ($member) {
            $member_name = $member->member_name;
        } else {
            dd('Member tidak ditemukan.');
        }

        if ($book) {
            $book_title = $book->book_title;
            $book_code = $book->book_code;
            $book_shelf_location = $book->book_shelf_location;
            $book_cover = $book->book_cover;
            $book_stock = $book->book_stock;
        } else {
            dd('Buku tidak ditemukan.');
        }

        if ($book_stock < $request->borrowing_qty) {
            return redirect()->back()->with('error', 'Stok buku tidak mencukupi.');
        }

        $now = now();
        $formattedTime = $now->format('Y-m-d H:i:s');
        $randint = rand(10, 100);

        $borrowing_id = 'B' . $formattedTime . $randint;
        $borrowing_id = preg_replace('/[^a-zA-Z0-9]/', '', $borrowing_id);

        $borrowing_end_date = Carbon::now()->addDays(7);
        // $borrowing_end_date = Carbon::now()->subDays(1);

        $status = 1;

        $data = [
            'borrowing_id' => $borrowing_id,
            'member_id' => $member_id,
            'book_isbn' => $book_isbn,
            'member_name' => $member_name,
            'book_title' => $book_title,
            'book_code' => $book_code,
            'book_shelf_location' => $book_shelf_location,
            'book_cover' => $book_cover,
            'borrowing_qty' => $request->borrowing_qty,
            'borrowing_start_date' => DB::raw('NOW()'),
            'borrowing_end_date' => $borrowing_end_date,
            'borrowing_status' => $status,
            'borrowing_updated_at' => DB::raw('NOW()'),
            'borrowing_created_at' => DB::raw('NOW()')
        ];
        Borrowing::create($data);

        $new_book_stock = $book_stock - $request->borrowing_qty;
        $book->where('book_isbn', $book_isbn)->update([
            'book_stock' => $new_book_stock,
            'book_stock_borrowing' => $request->borrowing_qty
        ]);

        return redirect()->to('/')->with('success', 'Successfully borrowed a book named "' . $book_title . '"');
    }

    public function cancelledBorrowing(Request $request, $id)
    {
        $book_isbn = $request->book_isbn;
        $borrowing_qty = $request->borrowing_qty;
        $book = Book::where('book_isbn', $book_isbn)->first(['book_stock', 'book_stock_borrowing']);

        if ($book) {
            $book_stock = $book->book_stock;
            $book_stock_borrowing = $book->book_stock_borrowing;
        } else {
            dd('Book stock tidak ditemukan.');
        }

        $total_book_stock = $book_stock + $borrowing_qty;
        $total_book_stock_borrowing = $book_stock_borrowing - $borrowing_qty;

        $status = '0';
        $data = [
            'borrowing_status' => $status,
            'borrowing_updated_at' => DB::raw('NOW()')
        ];

        $book->where('book_isbn', $book_isbn)->update([
            'book_stock' => $total_book_stock,
            'book_stock_borrowing' => $total_book_stock_borrowing
        ]);

        Borrowing::where('borrowing_id', $id)->update($data);

        return redirect()->to('borrowing')->with('success', 'Successfully cancelled borrowing');
    }

    public function returnBorrowing(Request $request, $id)
    {
        $book_isbn = $request->book_isbn;
        $borrowing_qty = $request->borrowing_qty;
        $book = Book::where('book_isbn', $book_isbn)->first(['book_stock', 'book_stock_borrowing']);

        if ($book) {
            $book_stock = $book->book_stock;
            $book_stock_borrowing = $book->book_stock_borrowing;
        } else {
            dd('Book stock tidak ditemukan.');
        }

        $total_book_stock = $book_stock + $borrowing_qty;
        $total_book_stock_borrowing = $book_stock_borrowing - $borrowing_qty;

        $status = '2';
        $data = [
            'borrowing_status' => $status,
            'borrowing_updated_at' => DB::raw('NOW()')
        ];

        $book->where('book_isbn', $book_isbn)->update([
            'book_stock' => $total_book_stock,
            'book_stock_borrowing' => $total_book_stock_borrowing
        ]);

        Borrowing::where('borrowing_id', $id)->update($data);

        return redirect()->to('borrowing')->with('success', 'Successfully return borrowing');
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
