<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Businesses on Map</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXg93GWII8iO6RunpZ35bJ6JqMXAxayiE&callback=initMap" async defer></script>
</head>

<body>
    <div class="form-group m-form__group">
        <div id="map" style="height: 300px; margin-top: 10px;"></div>
    </div>

    <script>

        function initMap() {
            var mapCenter = { lat: 30.3753, lng: 69.3451 }; // Center of Pakistan
            var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5, // Adjust the zoom level as needed
            center: mapCenter
            });
    
            // Array of businesses' data fetched from PHP
            var businesses = <?php echo json_encode($data['results']); ?>;
            // Loop through the businesses and add markers for each one
            businesses.forEach(function(business) {
                var position = { lat: parseFloat(business.latitude), lng: parseFloat(business.longitude) };
                var marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: business.business_name // Set marker title to business name
                });
            });
        }
    </script>



</body>
</html>
