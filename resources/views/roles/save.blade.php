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
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('roles.index') }}">Roles Management</a>
              </li>
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
</head>

<body>
    @if(isset($data['results']->id))
    @php
    $action=route('roles.update',$data['results']->id); @endphp
    @else
    @php $action=route('roles.store'); @endphp
    @endif
    <form action="{{$action}}" class="" id="form_submit" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if(isset($data['results']->id))
        @method('PUT')
        @endif
        <div class="col-md-12 text-right mb-2">
            @if($data['page_title']=="Update Role")
            <!-- <a href="{{url('admin/userprofile/'.$data['results']->id)}}" class="btn btn-primary ">User Details</a> -->

            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
            <a href="{{url('roles')}}" class="btn btn-outline-secondary">Back</a>
            @else
            <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
            <a href="{{url('roles')}}" class="btn btn-outline-secondary">Back</a>
            @endif
        </div>


        <div class="card">
            
            <div class="row">

                <div class="col-md-4">

                    <div class="form-group">
                        
                        <label>Role Title</label>
                        <input type="text" name="role_title"
                            class="form-control m-input m-input--square"
                            value="{{(isset($data['results']->role_title) ? $data['results']->role_title : '')}}"
                            required>

                    </div>

                </div>

            </div>

          <input class="form-control" name="id" type="hidden" value="{{(isset($data['results']->id) ? $data['results']->id : '')}}">
        </div>
      </div>
    </form>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
</x-app-layout>