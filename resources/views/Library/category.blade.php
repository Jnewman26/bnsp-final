@extends('layout.template')
@section('content')
    <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="fw-semibold">Category</h1>

        <form action="{{ url('category') }}" method="POST" class="my-4">
            @csrf
            <div class="search w-50">
                <div class="search-2">
                    <i class='bx bxs-map'></i>
                    <input type="text" name="category_name" value=""
                        placeholder="🪄 Create new category....">
                    <button type="submit">Create</button>
                </div>
            </div>
            @if ($errors->any())
                <div class="list-unstyled text-danger mt-2" role="alert">
                    @foreach ($errors->all() as $item)
                        <li>😬 {{ $item }}</li>
                    @endforeach
                </div>
            @endif
        </form>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <span class="fs-5">Category List</span>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td class="d-flex align-items-center gap-2">
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $item->category_id }}">
                                    <i class="fad fa-pen-to-square text-white"></i>
                                </button>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#editDelete{{ $item->category_id }}">
                                    <i class="fad fa-trash text-white"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modal edit -->
                        <div class="modal fade" id="editModal{{ $item->category_id }}" tabindex="-1"
                            aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <form action="{{ url('category/' . $item->category_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editModalLabel">Edit Category Name</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="category_id" value="{{ $item->category_id }}">
                                            <label for="form-label">Category Name</label>
                                            <input type="text" name="category_name" class="form-control mt-2"
                                                value="{{ $item->category_name }}">
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
                        <div class="modal fade" id="editDelete{{ $item->category_id }}" tabindex="-1"
                            aria-labelledby="editDeleteLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h1 class="modal-title fs-5" id="deletePromoModalLabel">Delete
                                            Category</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ url('category/' . $item->category_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body text-center py-0">
                                            <div class="alert alert-danger">
                                                <i
                                                    class="fa-duotone fa-light fa-hexagon-exclamation text-danger d-block fs-1 mb-2"></i>
                                                <span style="font-size: 14px">
                                                    Are you sure you want to delete category
                                                    <strong>{{ $item->category_name }}</strong>? <br> This action cannot be canceled.
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
                        @php $i++; @endphp
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
