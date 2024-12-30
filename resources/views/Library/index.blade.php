@extends('layout.template')

@section('content')
    <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="fw-semibold">Discover</h1>

        <form action="{{ url('/') }}" method="GET">
            <div class="search w-50 my-4">
                <div class="search-2">
                    <i class='bx bxs-map'></i> <input type="text" name="search" placeholder="🔍 find the book you like...."
                        value="{{ Request::get('search') }}">
                    <button type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <span class="fs-5">Fresh From the Writter</span>
        {{-- <button class="btn btn-light btn-sm rounded-3">View All ></button> --}}
    </div>
    <div class="row">
        @foreach ($book as $index => $item)
            <div class="col-md-3 mb-4 d-flex justify-content-center"> <!-- Kolom untuk 4 item per row -->
                <img src="{{ asset('storage/book_covers/' . $item->book_cover) }}" alt=""
                    class="img-fluid rounded-4 shadow-sm" style="height: 300px; object-fit: cover;" data-bs-toggle="modal"
                    data-bs-target="#bookDetailModal{{ $item->book_isbn }}">
            </div>

            <div class="modal fade" id="bookDetailModal{{ $item->book_isbn }}" tabindex="-1"
                aria-labelledby="bookDetailModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <form action="{{ url('borrowing') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h1 class="modal-title fs-5" id="bookDetailModalLabel">{{ $item->book_title }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="{{ asset('storage/book_covers/' . $item->book_cover) }}" alt=""
                                            class="img-fluid rounded-2" style="height: 450px; object-fit: cover;">
                                    </div>
                                    <div class="col-6 row">
                                        <div class="col-6">
                                            <label for="form-label">ISBN</label>
                                            <strong class="d-block">{{ $item->book_isbn }}</strong>
                                        </div>
                                        <div class="col-6">
                                            <label for="form-label">Title</label>
                                            <strong class="d-block">{{ $item->book_title }}</strong>
                                        </div>

                                        <div class="col-6">
                                            <label for="form-label">Author</label>
                                            <strong class="d-block">{{ $item->book_author }}</strong>
                                        </div>
                                        <div class="col-6">
                                            <label for="form-label">Publisher</label>
                                            <strong class="d-block">{{ $item->book_publisher }}</strong>
                                        </div>

                                        <div class="col-6">
                                            <label for="form-label">Publication Year</label>
                                            <strong class="d-block">{{ $item->book_publication_year }}</strong>
                                        </div>
                                        <div class="col-6">
                                            <label for="form-label">Category / Genre</label>
                                            <strong class="d-block">{{ $item->book_category }}</strong>
                                        </div>

                                        <div class="col-6">
                                            <label for="form-label">Code</label>
                                            <strong class="d-block">{{ $item->book_code }}</strong>
                                        </div>
                                        <div class="col-6">
                                            <label for="form-label">Shelf Location</label>
                                            <strong class="d-block">{{ $item->book_shelf_location }}</strong>
                                        </div>

                                        <div class="col-6">
                                            <label for="form-label">Stock</label>
                                            <strong class="d-block">{{ $item->book_stock }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h4>Borrower data</h4>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="form-label">Member <span class="text-danger">*</span></label>
                                        <select name="member_id" class="form-select mt-2" id="exampleSelect">
                                            @foreach ($members as $member)
                                                <option value="{{ $member->member_id }}">
                                                    {{ $member->member_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-6">
                                        <label for="form-label">Qty <span class="text-danger">*</span></label>
                                        <input type="number" name="borrowing_qty" class="form-control mt-2" min="1" max="{{ $item->book_stock }}" value="1">
                                    </div>
                                </div>
                                <input type="hidden" name="book_isbn" value="{{ $item->book_isbn }}">
                            </div>
                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Borrow</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    {{ $book->links() }}
@endsection
