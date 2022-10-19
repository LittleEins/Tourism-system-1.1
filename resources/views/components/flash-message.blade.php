@if (Session::get('success'))
    <div class=" mb-2">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <a class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    </div>
@endif

@if (Session::get('fails'))
    <div class="mb-2">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('fails') }}</strong>
            <a class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    </div>
@endif


    {{-- <div class=" mb-2">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Send success</strong>
            <a class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    </div> --}}
