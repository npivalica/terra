@if(session()->has('errorMessage'))
    <div class="my-4">
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('errorMessage')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
@endif
