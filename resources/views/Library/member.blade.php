@extends('layout.template')
@section('content')
    <div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3 border-bottom">
        <h1 class="fw-semibold">Member</h1>

        <button type="button" class="btn bg-bnsp text-white" data-bs-toggle="modal" data-bs-target="#createMemberModal">
            Create Member
        </button>

        <!-- Modal -->
        <div class="modal fade" id="createMemberModal" tabindex="-1" aria-labelledby="createMemberModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ url('member') }}" method="POST" class="my-4">
                        <div class="modal-header border-0 px-5">
                            <h1 class="modal-title fs-5" id="createMemberModalLabel">Create New Member</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body px-5">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label for="form-label">ID Card / Passport Number <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="member_id" class="form-control mt-2" placeholder=""
                                        value="{{ Session::get('member_id') }}">
                                    @error('member_id')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="col-12 mb-4">
                                    <label for="form-label">Member Name <span class="text-danger">*</span></label>
                                    <input type="text" name="member_name" class="form-control mt-2" placeholder=""
                                        value="{{ Session::get('member_name') }}">
                                    @error('member_name')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="col-12 mb-4">
                                    <label for="form-label">Member Email <span class="text-danger">*</span></label>
                                    <input type="text" name="member_email" class="form-control mt-2" placeholder=""
                                        value="{{ Session::get('member_email') }}">
                                    @error('member_email')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="col-12">
                                    <label for="form-label">Member Password <span class="text-danger">*</span></label>
                                    <input type="text" name="member_password" class="form-control mt-2" placeholder=""
                                        value="{{ Session::get('member_password') }}">
                                    @error('member_password')
                                        <div class="text-danger mt-2">
                                            😬 {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 px-5">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <span class="fs-5">Member List</span>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Member ID</th>
                        <th>Member Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>
                                @if ($item->member_status === 1)
                                    <span class="badge text-bg-success p-2">Active</span>
                                @endif

                                @if ($item->member_status === 0)
                                    <span class="badge text-bg-warning text-white p-2">Hold</span>
                                @endif
                            </td>
                            <td>{{ $item->member_id }}</td>
                            <td>{{ $item->member_name }}</td>
                            <td>{{ $item->member_email }}</td>
                            <td class="d-flex align-items-center gap-2">
                                <button class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $item->member_id }}">
                                    <i class="fad fa-pen-to-square text-white"></i>
                                </button>
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#editDelete{{ $item->member_id }}">
                                    <i class="fad fa-trash text-white"></i>
                                </button>
                                <form action="{{ url('member/' . $item->member_id . '/update-status') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    @if ($item->member_status === 1)
                                        <button type="submit" class="btn btn-warning" name="status" value="0">
                                            <i class="fas fa-pause text-white"></i>
                                        </button>
                                    @endif
                                    @if ($item->member_status === 0)
                                        <button type="submit" class="btn btn-success" name="status" value="1">
                                            <i class="fas fa-play text-white"></i>
                                        </button>
                                    @endif

                                </form>

                            </td>
                        </tr>

                        <!-- Modal edit -->
                        <div class="modal fade" id="editModal{{ $item->member_id }}" tabindex="-1"
                            aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <form action="{{ url('member/' . $item->member_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editModalLabel">Edit Member Data</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="form-label">Member ID</label>
                                            <strong class="d-block mb-4">{{ $item->member_id }}</strong>

                                            <label for="form-label">Member Email</label>
                                            <strong class="d-block mb-4">{{ $item->member_email }}</strong>

                                            <label for="form-label">Member Name</label>
                                            <input type="text" name="member_name" class="form-control mt-2"
                                                value="{{ $item->member_name }}">
                                            @error('member_name')
                                                <div class="text-danger mt-2">
                                                    😬 {{ $message }}
                                                </div>
                                            @enderror
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
                        <div class="modal fade" id="editDelete{{ $item->member_id }}" tabindex="-1"
                            aria-labelledby="editDeleteLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h1 class="modal-title fs-5" id="deletePromoModalLabel">Delete
                                            Member</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ url('member/' . $item->member_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body text-center py-0">
                                            <div class="alert alert-danger">
                                                <i
                                                    class="fa-duotone fa-light fa-hexagon-exclamation text-danger d-block fs-1 mb-2"></i>
                                                <span style="font-size: 14px">
                                                    Are you sure you want to delete member
                                                    <strong>{{ $item->member_name }}</strong>? <br> This action cannot be
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
