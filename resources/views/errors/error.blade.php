@if ($errors->any())
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div id="error-alert" style="display: none; background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; padding: 0.75rem 1.25rem; border: 1px solid transparent; border-radius: 0.25rem; position: relative;">
        <button type="button" style="position: absolute; top: 0.5rem; right: 0.75rem; padding: 0.25rem 0.5rem; background-color: transparent; border: none;" onclick="hideErrorAlert()">
            <span aria-hidden="true" style="font-size: 1.25rem;">&times;</span>
        </button>
        <ul style="margin-bottom: 0;">
            @foreach ($errors->all() as $error)
                <li style="list-style: disc; margin-left: 1rem;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <script>
        $(document).ready(function() {
            $("#error-alert").fadeIn();
        });

        function hideErrorAlert() {
            $("#error-alert").fadeOut();
        }
    </script>
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
