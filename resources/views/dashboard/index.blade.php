
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="container">
        <h1>Doctors</h1>
        <div class="row">
            @foreach ($doctors as $doctor)
                <div class="col-md-5 mb-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $doctor->name }}</h5>
                            <p class="card-text"><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
                            <a href="#" class="btn btn-primary">View Profile</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>
