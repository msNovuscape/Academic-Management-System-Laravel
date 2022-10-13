@if(session()->has('success'))
    <div class="alert alert-success alert-warning alert-dismissible fade show  d-flex justify-content-between my-4" role="alert">
        <div>
        <strong>Success!</strong>  {{ session()->get('success') }}
        </div>
        <div>
            <button type="button"  data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
@if(session()->has('status'))
    <div class="alert alert-success alert-warning alert-dismissible fade show  d-flex justify-content-between my-4" role="alert">
        <div>
            <strong>Success!</strong>  {{ session()->get('status') }}
        </div>
        <div>
            <button type="button"  data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
@if(session()->has('custom_success'))
    <div class="alert alert-danger alert-warning alert-dismissible fade show  d-flex justify-content-between my-4" role="alert">
        <div>
            <strong>Success!</strong>  {{ session()->get('custom_success') }}
        </div>
        <div>
            <button type="button"  data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif

