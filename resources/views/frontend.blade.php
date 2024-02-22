<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Businesses</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    {{-- <a class="navbar-brand" href="#">Your Logo</a> --}}
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- Add any other navbar items here -->
        </ul>
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card-header">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search..." oninput="searchByName()">
                    {{-- <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Search</button>
                    </div> --}}
                </div>
            </div>
            
            <div class="container mt-5">
                <div class="row" id="businessList">
                    @foreach($data['results'] as $key=>$row)
                    <div class="col-md-4 mb-4 business-card">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$row->business_name}}</h5>
                                <p class="card-text">{{$row->description}}</p>
                                <a href="#" class="btn btn-primary" onclick="showDetails({{$key}})">Show Details</a>
                                <div id="details{{$key}}" style="display: none;">
                                    <p>Contact Number: {{$row->contact_number}}</p>
                                    <p>Website URL: {{$row->website_url}}</p>
                                    <p>Address: {{$row->address}}</p>
                                    <p>Operating Hours: {{$row->operating_hours}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
                
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function showDetails(key) {
        var detailsDiv = document.getElementById('details' + key);
        if (detailsDiv.style.display === 'none') {
            detailsDiv.style.display = 'block';
        } else {
            detailsDiv.style.display = 'none';
        }
    }

    function searchByName() {
        var input, filter, cards, card, title, i;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        cards = document.getElementsByClassName("business-card");
        for (i = 0; i < cards.length; i++) {
            card = cards[i];
            title = card.getElementsByClassName("card-title")[0];
            if (title.innerHTML.toUpperCase().indexOf(filter) > -1) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        }
    }
</script>
</body>
</html>
