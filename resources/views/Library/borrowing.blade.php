@extends('layout.template')
@section('content')
    <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="fw-semibold">Book</h1>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <span class="fs-5">Borrowing List</span>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body table-responsive">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>Borrowing ID</th>
                        <th>Member ID</th>
                        <th>Book ISBN</th>
                        <th>Member Name</th>
                        <th>Book Title</th>
                        <th>Book Code</th>
                        <th>Book Shelf Location</th>
                        <th>Borrowing QTY</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                        <th>Overdue</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/book_covers/' . $item->book_cover) }}" alt=""
                                    class="img-fluid">
                            </td>
                            <td>{{ $item->borrowing_id }}</td>
                            <td>{{ $item->member_id }}</td>
                            <td>{{ $item->book_isbn }}</td>
                            <td>{{ $item->member_name }}</td>
                            <td>{{ $item->book_title }}</td>
                            <td>{{ $item->book_code }}</td>
                            <td>{{ $item->book_shelf_location }}</td>
                            <td>{{ $item->borrowing_qty }}</td>
                            <td>{{ $item->borrowing_start_date }}</td>
                            <td>{{ $item->borrowing_end_date }}</td>
                            <td>
                                @if ($item->borrowing_overdue === 'YES')
                                    {{ $item->borrowing_overdue }}
                                @else
                                    NO
                                @endif
                            </td>
                            <td>
                                @if ($item->borrowing_status === 1)
                                    <span class="badge text-bg-warning p-2 text-white">Borrowed</span>
                                @endif

                                @if ($item->borrowing_status === 0)
                                    <span class="badge text-bg-danger text-white p-2">Cancelled</span>
                                @endif

                                @if ($item->borrowing_status === 2)
                                    <span class="badge text-bg-success p-2">Returned</span>
                                @endif
                            </td>
                            <td class="d-flex align-items-center gap-2 py-5">
                                @if ($item->borrowing_status !== 0 && $item->borrowing_status !== 2)
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $item->borrowing_id }}">
                                        <i class="fa-solid fa-turn-down-left text-white"></i>
                                    </button>
                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#editDelete{{ $item->borrowing_id }}">
                                        <i class="fa-duotone fa-solid fa-ban text-white"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>

                        <!-- Modal edit -->
                        <div class="modal fade" id="editModal{{ $item->borrowing_id }}" tabindex="-1"
                            aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <form action="{{ url('borrowing/' . $item->borrowing_id . '/return') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header border-0">
                                            <h1 class="modal-title fs-5" id="deletePromoModalLabel">Return Borrowing</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ url('borrowing/' . $item->borrowing_id . '/cancelled') }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body text-center py-0">
                                                <div class="alert alert-warning">
                                                    <i
                                                        class="fa-duotone fa-light fa-hexagon-exclamation text-warning d-block fs-1 mb-2"></i>
                                                    <span style="font-size: 14px">
                                                        Are you sure you want to cancel this booking
                                                        <strong>{{ $item->borrowing_id }}</strong>? <br> This action cannot
                                                        be
                                                        canceled.
                                                    </span>
                                                </div>
                                            </div>
                                            <input type="hidden" name="book_isbn" value="{{ $item->book_isbn }}">
                                            <input type="hidden" name="borrowing_qty" value="{{ $item->borrowing_qty }}">
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-muted" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-warning text-white"
                                                    name="btn_delete_member">
                                                    Yes
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Modal delete -->
                        <div class="modal fade" id="editDelete{{ $item->borrowing_id }}" tabindex="-1"
                            aria-labelledby="editDeleteLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h1 class="modal-title fs-5" id="deletePromoModalLabel">Cancel Borrowing</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ url('borrowing/' . $item->borrowing_id . '/cancelled') }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body text-center py-0">
                                            <div class="alert alert-danger">
                                                <i
                                                    class="fa-duotone fa-light fa-hexagon-exclamation text-danger d-block fs-1 mb-2"></i>
                                                <span style="font-size: 14px">
                                                    Are you sure you want to cancel this booking
                                                    <strong>{{ $item->borrowing_id }}</strong>? <br> This action cannot be
                                                    canceled.
                                                </span>
                                            </div>
                                        </div>
                                        <input type="hidden" name="book_isbn" value="{{ $item->book_isbn }}">
                                        <input type="hidden" name="borrowing_qty" value="{{ $item->borrowing_qty }}">
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-muted" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-danger" name="btn_delete_member">
                                                Yes
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
