@php
    use Carbon\Carbon;
    use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Users</title>
        
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{url("css/styles.css")}}" rel="stylesheet" />
        <link href="{{url("css/new.css")}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
     
      @include('layout.navbar')
      @include('layout.sidenavbar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 mb-4">Users</h1>
                       
                       {{-- notifikasi sukses --}}
                       @if ($sukses = Session::get('sukses'))
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                       <strong>{{ $sukses }}</strong>
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       </div>
                       @endif                                                                                                
                       
                       <div class="shadow p-3 mb-5 bg-white rounded">
                       
                            <div class="card-header mr-3">
                            
                           
                                <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data" autocomplete="off">

                                    @csrf
                            
                                    @method('PUT')
                            
                                    <input type="hidden" name="id" value="{{ old('id', $user->id) }}">
                            
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                               value="{{ old('name', $user->name) }}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                            
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                               value="{{ old('email', $user->email) }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                            
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Profile Image (Optional)</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                        @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                            
                                        <p class="d-inline-flex gap-1 pt-3">
                                            <button class="btn btn-sm btn-secondary" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseImage" aria-expanded="false" aria-controls="collapseImage">
                                                Show Current Profile Image
                                            </button>
                                        </p>
                                        <div class="collapse pt-2" id="collapseImage">
                                            <div class="card card-body">
                                                <img src="{{ url('storage/image/user/' . $user->image) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="mb-3">
                                        <label for="category" class="form-label">User Role</label>
                                        <select class="form-select @error('role') is-invalid @enderror" id="role" name="role"
                                                required>
                                            <option value="user" @if($user->role == 'user') selected @endif>User</option>
                                            <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                        </select>
                                        @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                            
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Password (Optional)</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                                   value="" autocomplete="new-password">
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                            <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"
                                                   value="">
                                            @error('password_confirmation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <button type="submit" class="btn btn-primary">Edit User</button>
                                </form>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2024</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{url("js/scripts.js")}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        
    </body>
</html>
