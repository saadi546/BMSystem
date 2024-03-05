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

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">{{$data['page_title']}}</h4>
                        <div style="display: flex; justify-content: flex-end;">
                            <a class="btn btn-primary" href="{{ route('businesses.create') }}">Add Business</a>
                        </div>
                    </div>
                    <div class="card-datatable p-2">
                        <table class="table dynamic_table font-weight-bold">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Business Name</th>
                                    <th>Description</th>
                                    <th>contact_number</th>
                                    <th>Email</th>
                                    <th>Website URL</th>
                                    <th>Status</th>
                                    <th>Operating Hours</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['results'] as $key=>$row)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$row->business_name}}</td>
                                    <td>{{$row->description}}</td>
                                    <td>{{$row->contact_number}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{$row->website_url}}</td>
                                    <td>{{$row->status}}</td>
                                    <td>{{$row->operating_hours}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('businesses.edit', $row->id) }}">
                                                    <i data-feather="edit-2" class="mr-50"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a class="dropdown-item" href="{{ route('delete', $row->id) }}">
                                                    <i data-feather="trash" class="mr-50"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</x-app-layout>
