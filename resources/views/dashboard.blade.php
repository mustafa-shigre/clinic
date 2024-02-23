



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<nav class="navbar sticky-top bg-body-tertiary">
    <div class="container-fluid ">
        <a class="navbar-brand" href="#">Sticky top</a>
        <div class="d-flex justify-content-end">
            <a href="{{ route('patients.index') }}"><Button class="btn btn-primary ">dashboard me</Button></a>
            <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn btn-primary ms-1">Logout</button>
</form>
        </div>
    </div>
</nav>
    <div class="container">
        <h1 class="mb-4">Doctors</h1>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $user->name }}</h3>
                            <p class="card-text"><strong>Specialization:</strong>
                                @foreach($specializations as $specialization)
                                    @if($specialization->id == $user->specialization_id)
                                        {{ $specialization->name }}
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>

