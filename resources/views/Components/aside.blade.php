<!-- Sidebar -->
<div class="position-sticky pt-2 ps-4">
    <h5 class="mt-3 mb-5 fw-semibold">MY LIBRARY</h5>
    <span class="fw-semibold text-body-tertiary">Menu</span>

    <ul class="nav flex-column">
        <li class="nav-item my-4">
            <a class="nav-link active p-0" href="{{ url('/') }}">
                <span class="{{ Request::is('/') ? 'bg-bnsp text-white' : 'bg-body-secondary text-secondary' }} p-2 me-2" style="border-radius: 12px;">🏠</span>
                <span class="{{ Request::is('/') ? 'text-dark' : 'text-body-tertiary' }} fw-semibold">Discover</span>
            </a>
        </li>
        <li class="nav-item mt-4">
            <a class="nav-link p-0" href="{{ url('borrowing') }}">
                <span class="{{ Request::is('borrowing') ? 'bg-bnsp text-white' : 'bg-body-secondary text-secondary' }} p-2 me-2"
                    style="border-radius: 12px;">🫴</span> <span
                    class="{{ Request::is('borrowing') ? 'text-dark' : 'text-body-tertiary' }} fw-semibold">Borrowing</span>
            </a>
        </li>

        <hr class="border border-secondary border-1 rounded w-75" style=" margin-top: 50px; margin-bottom: 40px;">

        <span class="fw-semibold text-body-tertiary">Master</span>
        <li class="nav-item my-4">
            <a class="nav-link p-0" href="{{ url('book') }}">
                <span
                    class="{{ Request::is('book') ? 'bg-bnsp text-white' : 'bg-body-secondary text-secondary' }} p-2 me-2"
                    style="border-radius: 12px;">📖</span> <span
                    class="{{ Request::is('book') ? 'text-dark' : 'text-body-tertiary' }} fw-semibold">Book</span>
            </a>
        </li>
        <li class="nav-item my-4">
            <a class="nav-link p-0" href="{{ url('member') }}">
                <span class="{{ Request::is('member') ? 'bg-bnsp text-white' : 'bg-body-secondary text-secondary' }} p-2 me-2"
                    style="border-radius: 12px;">🪪</span> <span
                    class="{{ Request::is('member') ? 'text-dark' : 'text-body-tertiary' }} fw-semibold">Member</span>
            </a>
        </li>
        <li class="nav-item my-4">
            <a class="nav-link p-0" href="{{ url('category') }}">
                <span class="{{ Request::is('category') ? 'bg-bnsp text-white' : 'bg-body-secondary text-secondary' }} p-2 me-2"
                    style="border-radius: 12px;">📝</span> <span
                    class="{{ Request::is('category') ? 'text-dark' : 'text-body-tertiary' }} fw-semibold">Category</span>
            </a>
        </li>
    </ul>
</div>
