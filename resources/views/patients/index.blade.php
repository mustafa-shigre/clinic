<!DOCTYPE html>
<html>
<head>
    <title>Patients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<nav class="navbar sticky-top bg-body-tertiary mb-3">
    <div class="container-fluid ">
        <a class="navbar-brand" ><h5>Patients</h5></a>
    </div>
</nav>
<body>
    <div class="container">
        @foreach ($bookings as $booking)
        <div class="col-md-4 mb-5">
            <div class="card bg-body-tertiary">
                <div class="card-body">

                    <h5 class="card-title bg-secondary-subtle">Patient Name:  {{ $booking->patient->name }}</h5>
                    <h6 class="card-text"> dob:  {{ $booking->patient->dob }} </h6>
                    <h6 class="card-text"> sex:  {{ $booking->patient->sex }} </h6>
                    <h6>booking_time : {{ $booking->availableDate->time }}</h6>
                    <form action="{{ route('patients.destroy', $booking->patient) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>


                </div>
            </div>
        </div>
        @endforeach
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>
