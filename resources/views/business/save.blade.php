<x-app-layout>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('businesses.index') }}">Business Management</a>
              </li>
              @auth
              @if(auth()->user()->role_id == 1)
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('roles.index') }}">Roles Management</a>
              </li>
              <li>
                <a class="nav-link active" aria-current="page" href="{{ route('roles.map') }}">All Businesses Map</a>
              </li>
              @endif
              @endauth
            </ul>
          </div>
        </div>
      </nav>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Business Management</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXg93GWII8iO6RunpZ35bJ6JqMXAxayiE&libraries=places"></script>
</head>

<body>
    @if(isset($data['results']->id))
    @php
    $action=route('businesses.update',$data['results']->id); @endphp
    @else
    @php $action=route('businesses.store'); @endphp
    @endif
    <form action="{{$action}}" class="" id="form_submit" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if(isset($data['results']->id))
        @method('PUT')
        @endif
        <div class="col-md-12 text-right mb-2">
            @if($data['page_title']=="Update Business")
            <!-- <a href="{{url('admin/userprofile/'.$data['results']->id)}}" class="btn btn-primary ">User Details</a> -->

            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
            <a href="{{url('businesses')}}" class="btn btn-outline-secondary">Back</a>
            @else
            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
            <a href="{{url('businesses')}}" class="btn btn-outline-secondary">Back</a>
            @endif
        </div>


        <div class="card">
            <div class="card-body">
                <div class="row">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @auth
                    @if(auth()->user()->role_id == 2)
                    <input type="hidden" name="status" value="pending">
                    @endif
                    @endauth

                    <div class="col-md-3">
                        <div class="form-group m-form__group">
                            <label>Business Name</label>
                            <input type="text" name="business_name" class="form-control m-input m-input--square"
                                value="{{(isset($data['results']->id) ? $data['results']->business_name : '')}}"
                                >
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group m-form__group">
                            <label>Description</label>
                            <textarea name="description" class="form-control m-input m-input--square" rows="4" >{{ (isset($data['results']->description) ? $data['results']->description : '') }}</textarea>
                        </div>
                    </div>
                    

                    <div class="col-md-3">
                        <div class="form-group m-form__group">
                            <label>Contact Number</label>
                            <input type="text" name="contact_number" class="form-control m-input m-input--square"
                                value="{{(isset($data['results']->contact_number) ? $data['results']->contact_number : '')}}"
                                >
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group m-form__group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control m-input m-input--square"
                                value="{{(isset($data['results']->email) ? $data['results']->email : '')}}"
                                >
                        </div>
                    </div>

                    
                </div>
                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group m-form__group">
                            <label>Website Url</label>
                            <input type="text" name="website_url" class="form-control m-input m-input--square"
                                value="{{(isset($data['results']->website_url) ? $data['results']->website_url : '')}}">
                        </div>
                    </div>

                    {{-- <div class="col-md-3">
                        <div class="form-group m-form__group">
                            <label>Address</label>
                            <textarea name="address" class="form-control m-input m-input--square" rows="4" >{{ (isset($data['results']->address) ? $data['results']->address : '') }}</textarea>
                        </div>
                    </div> --}}

                    <div class="col-md-3">
                        <div class="form-group m-form__group">
                            <label for="address">Enter Address:</label>
                            <input type="text" id="address" name="address" placeholder="Enter your address" class="form-control m-input m-input--square" value="{{ (isset($data['results']->address) ? $data['results']->address : '') }}">
                            <input type="hidden" id="latitude" name="latitude" class="form-control m-input m-input--square" value="{{ (isset($data['results']->latitude) ? $data['results']->latitude : '') }}">
                            <input type="hidden" id="longitude" name="longitude" class="form-control m-input m-input--square" value="{{ (isset($data['results']->longitude) ? $data['results']->longitude : '') }}">
                        </div>

                        <div >
                            <div class="form-group m-form__group">
                                <div id="map" style="height: 300px; margin-top: 10px;"></div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    

                    <div class="col-md-3">
                        <div class="form-group m-form__group">
                            <label>Operating Hours</label>
                            <input type="text" name="operating_hours"
                                class="form-control m-input m-input--square"
                                value="{{(isset($data['results']->operating_hours) ? $data['results']->operating_hours : '')}}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group m-form__group">
                            <label>Employee Detail</label>
                            <input type="text" name="employee_detail"
                                class="form-control m-input m-input--square"
                                value="{{(isset($data['results']->employee_detail) ? $data['results']->employee_detail : '')}}">
                        </div>
                    </div>
                    @auth
                    @if(auth()->user()->role_id == 1)
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group m-form__group">
                                <label>Status</label>
                                <select name="status" class="form-control m-input m-input--square">
                                    <option value="Accepted" {{ (isset($data['results']->status) && $data['results']->status == 'approved') ? 'selected' : '' }}>Approved</option>
                                    <option value="Rejected" {{ (isset($data['results']->status) && $data['results']->status == 'rejected') ? 'selected' : '' }}>Rejected</option>
                                </select>
                            </div>
                        </div>
                    @endif
                    @endauth
                
                </div>
        </div>
      </div>
    </form>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the map
        const map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 0, lng: 0},
            zoom: 2
        });

        let marker; // Declare marker variable globally

        // Initialize the Places Autocomplete service
        const autocomplete = new google.maps.places.Autocomplete(document.getElementById('address'));
        autocomplete.bindTo('bounds', map);

        // Listen for the 'place_changed' event when a user selects an address from the dropdown
        autocomplete.addListener('place_changed', function () {
            const place = autocomplete.getPlace();
            if (!place.geometry) {
                console.error('Invalid address selected.');
                return;
            }

            // Clear existing marker if it exists
            if (marker) {
                marker.setMap(null);
            }

            // Update the map and hidden input fields with the selected location
            map.setCenter(place.geometry.location);
            map.setZoom(15);
            document.getElementById('latitude').value = place.geometry.location.lat();
            document.getElementById('longitude').value = place.geometry.location.lng();

            // Create a new marker at the selected location
            marker = new google.maps.Marker({
                position: place.geometry.location,
                map: map,
                title: 'Selected Location',
                draggable: true // Allow marker to be draggable
            });

            // Update input fields with marker's position when marker is dragged
            marker.addListener('dragend', function() {
                document.getElementById('latitude').value = marker.getPosition().lat();
                document.getElementById('longitude').value = marker.getPosition().lng();
            });
        });

        // Function to initialize the map with a given latitude and longitude
        function initMap(latitude, longitude) {
            // Create a map centered at the specified location
            const shopMap = new google.maps.Map(document.getElementById('map'), {
                center: { lat: latitude, lng: longitude },
                zoom: 15
            });

            // Add a marker at the specified location
            marker = new google.maps.Marker({
                position: { lat: latitude, lng: longitude },
                map: shopMap,
                title: 'Shop Location',
                draggable: true // Allow marker to be draggable
            });

            // Update input fields with marker's position when marker is dragged
            marker.addListener('dragend', function() {
                document.getElementById('latitude').value = marker.getPosition().lat();
                document.getElementById('longitude').value = marker.getPosition().lng();
            });
        }

        // Retrieve latitude and longitude values from PHP and call initMap
        <?php
        if(isset($data['results'])) {
            $latitude = $data['results']->latitude;
            $longitude = $data['results']->longitude;
            echo "initMap($latitude, $longitude);";
        }
        ?>

        // Listen for the form submission
        document.getElementById('registrationForm').addEventListener('submit', function (event) {
            event.preventDefault();

            // Collect and process the registration data
            const formData = new FormData(this);
            formData.forEach(function (value, key) {
                console.log(key, value);
            });

            // Here, you can send the registration data to your server using AJAX or any other method.
        });
    });
</script>



</body>
</html>
</x-app-layout>