<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class discoveryMemberController extends Controller
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

        return view('LibraryMember.index')->with('book', $book)->with('members', $members);
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

        // $borrowing_end_date = Carbon::now()->addDays(7);
        $borrowing_end_date = Carbon::now()->subDays(1);

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

        return redirect()->to('/discoveryMember')->with('success', 'Successfully borrowed a book named "' . $book_title . '"');
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
