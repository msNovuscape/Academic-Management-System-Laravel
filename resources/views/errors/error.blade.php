@if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
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
