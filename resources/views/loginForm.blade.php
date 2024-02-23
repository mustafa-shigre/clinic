<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>

    #carouselExampleDark {
        width: 600px;
        height: 200px;
    }


    #carouselExampleDark .carousel-item img {
        width: 100%;
        height: 100%;

    }

</style>

<nav class="navbar sticky-top bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><h3>clinic</h3></a>
        <a href="{{ route('login') }}"><Button class="btn btn-primary">login as the doctor</Button></a>
    </div>
</nav>
<div class=" container">
<div id="carouselExampleDark" class="carousel carousel-dark slide container mt-2 mb-2">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="http://127.0.0.1:8000/images/image1.jpg" class="d-block w-100" >
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="http://127.0.0.1:8000/images/image2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">

            </div>
        </div>
        <div class="carousel-item">
            <img src="http://127.0.0.1:8000/images/image3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">

            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="bg-light">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<form  method="POST" action="{{ route('store-data') }}" class="container">
    @csrf
    <fieldset >
    <legend>Please log in to view the information listed</legend>
    <div class="mb-3">
        <label for="disabledTextInput" class="form-label">Name</label>
        <input type="text" id="disabledTextInput" class="form-control" name="name" placeholder="enter name">
    </div>
        <div class="mb-3">
    <label for="ageInput" class="form-label">dob</label>
    <input type="number" class="form-control" id="ageInput" name="dob" placeholder="Enter your age" min="0">
</div>
<div class="mb-3">
            <label for="gender" class="form-label ">Gender :</label>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="sex" id="genderMale" value="male" checked>
                <label class="form-check-label" for="genderMale">
                    Male
                </label>

            </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sex" id="genderMale" value="male" checked>
                <label class="form-check-label" for="genderMale">
                    female
                </label>

            </div>
    <div class="mb-3">
        <label for="disabledSelect" class="form-label">specialization_doctors</label>
        <select id="specialization" name="specialization" class="form-select">
            <option value="">select specialization</option>
            @foreach($specializations as $specialization)
                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
            @endforeach
       </select>
    </div>
    <div class="mb-3">
        <label for="doctor" class="form-label"  >Doctor</label>
        <select id="doctor" class="form-select" name="doctor">
             <option value="">Select Doctor</option>

        </select>
    </div>

     <div class="mb-3">
      <label for="available_time" class="form-label" name="" >booking date</label>
      <select id="available_time" class="form-select" name="available_time">
         <option value="">Select Available Time</option>

      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('#specialization').change(function() {


        var specialization_id = $(this).val();

        if (specialization_id) {
            $.ajax({
                type: "GET",
                url: "{{ url('get-doctors') }}/"+specialization_id,
                success: function(res) {
                    if (res) {
                        $("#doctor").empty();
                        $("#doctor").append('<option>Select Doctor</option>');
                        $.each(res, function(key, value) {
                            $("#doctor").append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
                }
            });
        }
    });

    $('#doctor').change(function() {
        var doctor_id = $(this).val();
        if (doctor_id) {
            $.ajax({
                type: "GET",
                url: "{{ url('get-available-time') }}/"+doctor_id,
                success: function(res) {
                    if (res) {
                        $("#available_time").empty();
                        $("#available_time").append('<option>Select Available Time</option>');
                        $.each(res, function(key, value) {
                            $("#available_time").append('<option value="'+value.id+'">'+value.time+'</option>');
                        });
                    }
                }
            });
        }
    });
});
</script>

