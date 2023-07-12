@if ($errors->any())
    <div class="alert alert-danger alert-dismissible position-relative">
        {{-- <button type="button " class="contact-alert-btn close p-2 d-flex align-items-center justify-content-center" data-bs-dismiss="alert" aria-label="Close">
            <i class="fa-solid fa-xmark me-0"></i>

        </button> --}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        {{-- <button type="button " class="contact-alert-btn close p-2 d-flex align-items-center justify-content-center" data-bs-dismiss="alert" aria-label="Close">

            <span aria-hidden="true">&times;</span>
        </button> --}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('email'))
    <div class="alert alert-danger alert-warning alert-dismissible fade show  d-flex justify-content-between my-4" role="alert">
        <div>
            <strong>Success!</strong>  {{ session()->get('email') }}
        </div>
        <div>
            <button type="button"  data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
@if(session()->has('custom_error'))
    <div class="alert alert-danger">
        <div>
            <button type="button"  data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div>
            <strong>Error!</strong>  {{ session()->get('custom_error') }}
        </div>
    </div>
@endif
