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
                            
                            </div>
                            
                            <div class="table-responesive">
                            
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="col-2">User</th>
                                            <th scope="col" class="col-1">Role</th>
                                            <th scope="col" class="col-2">Email</th>
                                            <th scope="col" class="col-2 text-center">Registered At</th>
                                            <th scope="col" class="col-2 text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($users->isEmpty())
                                        <tr>
                                            <td colspan="5" class="text-center">No User Data to Update</td>
                                        </tr>
                                        @else
                                        @foreach($users as $user)
                                        <tr>
                                            <td class="align-content-center d-flex align-items-center">
                                                <img src="{{ url('storage/image/user/' . $user->image) }}"
                                                     class="image-profile-md ml-15 mr-25"
                                                     alt="{{ "content-image-" . $user->name }}" loading="lazy">
                                                {{ $user->name }}
                                            </td>
                                            <td class="align-content-center">
                                                @if($user->level == 'admin')
                                                    <span class="badge bg-info">Admin</span>
                                                @else
                                                    <span class="badge bg-secondary">User</span>
                                                @endif
                                            </td>
                                            <td class="align-content-center">
                                                {{ $user->email }}
                                            </td>
                                            <td class="text-center align-content-center">
                                                {{ Carbon::parse($user->created_at)->format('d F Y - H:i') }}
                                            </td>
                                            <td class="text-center align-content-center">
                                                @if(Auth::user()->id == $user->id)
                                                    <a href="#" class="btn btn-primary btn-sm disabled">Edit</a>
                                                @else
                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $users->links('pagination::bootstrap-4') }}
                            </div>
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
