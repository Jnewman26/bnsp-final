@if (Session::has('success'))
    <div class="position-fixed bottom-0 end-0 p-3">
        <div class="alert alert-success" role="alert">
            🎉 {{ Session::get('success') }}
        </div>
    </div>
@endif

@if ($errors->any())
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050;">
        <div class="alert alert-danger pb-0 mb-0">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
