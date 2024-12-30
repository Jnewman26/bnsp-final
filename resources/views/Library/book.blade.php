@extends('layout.template')
@section('content')
    <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="fw-semibold">Book</h1>

        <button type="button" class="btn bg-bnsp text-white" data-bs-toggle="modal" data-bs-target="#createBookModal">
            Create Book
        </button>

        <!-- Modal -->
        <div class="modal fade" id="createBookModal" tabindex="-1" aria-labelledby="createBookModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <form action="{{ url('book') }}" method="POST" class="my-4" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header border-0 px-5">
                            <h1 class="modal-title fs-5" id="createBookModalLabel">Create New Book</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-5">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                    <label for="form-label">Book ISBN <span class="text-danger">*</span></label>
                                    <input type="number" name="book_isbn" class="form-control mt-2" placeholder=""
                                        value="{{ Session::get('book_isbn') }}">
                                    @error('book_isbn')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="form-label">Book Title <span class="text-danger">*</span></label>
                                    <input type="text" name="book_title" min="13" max="13"
                                        class="form-control mt-2" placeholder="" value="{{ Session::get('book_title') }}">
                                    @error('book_title')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="form-label">Book Author <span class="text-danger">*</span></label>
                                    <input type="text" name="book_author" min="13" max="13"
                                        class="form-control mt-2" placeholder="" value="{{ Session::get('book_author') }}">
                                    @error('book_author')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="form-label">Book Publisher <span class="text-danger">*</span></label>
                                    <input type="text" name="book_publisher" min="13" max="13"
                                        class="form-control mt-2" placeholder=""
                                        value="{{ Session::get('book_publisher') }}">
                                    @error('book_publisher')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="form-label">Book Publication Year <span class="text-danger">*</span></label>
                                    <input type="text" name="book_publication_year" min="13" max="13"
                                        class="form-control mt-2" placeholder=""
                                        value="{{ Session::get('book_publication_year') }}">
                                    @error('book_publication_year')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="form-label">Book Category <span class="text-danger">*</span></label>
                                    <select name="book_category" class="form-select mt-2" id="exampleSelect"
                                        aria-label="Pilih Dana">
                                        <option value="">Choose Category...</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->category_name }}">{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('book_category')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="form-label">Book Code <span class="text-danger">*</span></label>
                                    <input type="text" name="book_code" min="13" max="13"
                                        class="form-control mt-2" placeholder="" value="{{ Session::get('book_code') }}">
                                    @error('book_code')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="form-label">Shelf Location <span class="text-danger">*</span></label>
                                    <input type="text" name="book_shelf_location" min="13" max="13"
                                        class="form-control mt-2" placeholder=""
                                        value="{{ Session::get('book_shelf_location') }}">
                                    @error('book_shelf_location')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="form-label">Book Stock <span class="text-danger">*</span></label>
                                    <input type="text" name="book_stock" min="13" max="13"
                                        class="form-control mt-2" placeholder=""
                                        value="{{ Session::get('book_stock') }}">
                                    @error('book_stock')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <label for="form-label">Book Cover <span class="text-danger">*</span></label>
                                    <input type="file" name="book_cover" min="13" max="13"
                                        class="form-control mt-2" placeholder=""
                                        value="{{ Session::get('book_cover') }}">
                                    @error('book_cover')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 px-5">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <span class="fs-5">Book List</span>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body table-responsive">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Cover</th>
                        <th>ISBN</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Publisher</th>
                        <th>Publication Year</th>
                        <th>Category</th>
                        <th>Code</th>
                        <th>Shelf Location</th>
                        <th>Stock</th>
                        <th>Stock on Borrow</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($book as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/book_covers/' . $item->book_cover) }}" alt=""
                                    class="img-fluid">
                            </td>
                            <td>{{ $item->book_isbn }}</td>
                            <td>{{ $item->book_title }}</td>
                            <td>{{ $item->book_author }}</td>
                            <td>{{ $item->book_publisher }}</td>
                            <td>{{ $item->book_publication_year }}</td>
                            <td>{{ $item->book_category }}</td>
                            <td>{{ $item->book_code }}</td>
                            <td>{{ $item->book_shelf_location }}</td>
                            <td>{{ $item->book_stock }}</td>
                            <td>{{ $item->book_stock_borrowing }}</td>
                            <td>
                                @if ($item->book_status === 1)
                                    <span class="badge text-bg-success p-2">Active</span>
                                @endif

                                @if ($item->book_status === 0)
                                    <span class="badge text-bg-warning text-white p-2">Hold</span>
                                @endif
                            </td>
                            <td class="d-flex align-items-center gap-2 py-5">
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $item->book_isbn }}">
                                    <i class="fad fa-pen-to-square text-white"></i>
                                </button>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#editDelete{{ $item->book_isbn }}">
                                    <i class="fad fa-trash text-white"></i>
                                </button>

                                <form action="{{ url('book/' . $item->book_isbn . '/update-status') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    @if ($item->book_status === 1)
                                        <button type="submit" class="btn btn-warning" name="status" value="0">
                                            <i class="fas fa-pause text-white"></i>
                                        </button>
                                    @endif
                                    @if ($item->book_status === 0)
                                        <button type="submit" class="btn btn-success" name="status" value="1">
                                            <i class="fas fa-play text-white"></i>
                                        </button>
                                    @endif

                                </form>
                            </td>
                        </tr>

                        <!-- Modal edit -->
                        <div class="modal fade" id="editModal{{ $item->book_isbn }}" tabindex="-1"
                            aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <form action="{{ url('book/' . $item->book_isbn) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content p-4">
                                        <div class="modal-header border-0">
                                            <h1 class="modal-title fs-5" id="editModalLabel">Edit Book Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12 col-md-6 mb-4">
                                                    <label for="form-label">Book ISBN <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="book_isbn" class="form-control mt-2"
                                                        placeholder="" value="{{ $item->book_isbn }}">
                                                    @error('book_isbn')
                                                        <div class="text-danger mt-2">
                                                            😬 {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-6 mb-4">
                                                    <label for="form-label">Book Title <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="book_title" min="13"
                                                        max="13" class="form-control mt-2" placeholder=""
                                                        value="{{ $item->book_title }}">
                                                    @error('book_title')
                                                        <div class="text-danger mt-2">
                                                            😬 {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-6 mb-4">
                                                    <label for="form-label">Book Author <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="book_author" min="13"
                                                        max="13" class="form-control mt-2" placeholder=""
                                                        value="{{ $item->book_author }}">
                                                    @error('book_author')
                                                        <div class="text-danger mt-2">
                                                            😬 {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-6 mb-4">
                                                    <label for="form-label">Book Publisher <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="book_publisher" min="13"
                                                        max="13" class="form-control mt-2" placeholder=""
                                                        value="{{ $item->book_publisher }}">
                                                    @error('book_publisher')
                                                        <div class="text-danger mt-2">
                                                            😬 {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-6 mb-4">
                                                    <label for="form-label">Book Publication Year <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="book_publication_year" min="13"
                                                        max="13" class="form-control mt-2" placeholder=""
                                                        value="{{ $item->book_publication_year }}">
                                                    @error('book_publication_year')
                                                        <div class="text-danger mt-2">
                                                            😬 {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-6 mb-4">
                                                    <label for="form-label">Book Category <span
                                                            class="text-danger">*</span></label>
                                                    <select name="book_category" class="form-select mt-2"
                                                        id="exampleSelect" aria-label="Pilih Dana">
                                                        <option value="{{ $item->book_category }}" selected>{{ $item->book_category }}</option>
                                                        @foreach ($category as $cateogies)
                                                            <option value="{{ $cateogies->category_name }}">
                                                                {{ $cateogies->category_name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('book_category')
                                                        <div class="text-danger mt-2">
                                                            😬 {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-6 mb-4">
                                                    <label for="form-label">Book Code <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="book_code" min="13" max="13"
                                                        class="form-control mt-2" placeholder=""
                                                        value="{{ $item->book_code }}">
                                                    @error('book_code')
                                                        <div class="text-danger mt-2">
                                                            😬 {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-6 mb-4">
                                                    <label for="form-label">Shelf Location <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="book_shelf_location" min="13"
                                                        max="13" class="form-control mt-2" placeholder=""
                                                        value="{{ $item->book_shelf_location }}">
                                                    @error('book_shelf_location')
                                                        <div class="text-danger mt-2">
                                                            😬 {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12 col-md-6 mb-4">
                                                    <label for="form-label">Book Stock <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="book_stock" min="13"
                                                        max="13" class="form-control mt-2" placeholder=""
                                                        value="{{ $item->book_code }}">
                                                    @error('book_stock')
                                                        <div class="text-danger mt-2">
                                                            😬 {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Modal delete -->
                        <div class="modal fade" id="editDelete{{ $item->book_isbn }}" tabindex="-1"
                            aria-labelledby="editDeleteLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h1 class="modal-title fs-5" id="deletePromoModalLabel">Delete
                                            Book</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ url('book/' . $item->book_isbn) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body text-center py-0">
                                            <div class="alert alert-danger">
                                                <i
                                                    class="fa-duotone fa-light fa-hexagon-exclamation text-danger d-block fs-1 mb-2"></i>
                                                <span style="font-size: 14px">
                                                    Are you sure you want to delete book
                                                    <strong>{{ $item->book_title }}</strong>? <br> This action cannot be
                                                    canceled.
                                                </span>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-muted" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-danger" name="btn_delete_member">
                                                Hapus
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
