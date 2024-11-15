<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link href="{{url("css/styles.css")}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="{{route('register')}}" method="POST">
                                              @csrf
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="inputName" type="text" placeholder="Enter your name" />
                                                        <label for="inputFirstName">Name</label>
                                                        @error('name')
                                                        <div class="invalid-feedback">
                                                        {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" id="inputUsername" type="text" placeholder="Enter your username" />
                                                        <label for="inputUserame">Username</label>
                                                        @error('username')
                                                        <div class="invalid-feedback">
                                                        {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                               
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="inputEmail" type="email" placeholder="name@gmail.com" />
                                                        <label for="inputEmail">Email address</label>
                                                        @error('email')
                                                        <div class="invalid-feedback">
                                                        {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control  @error('password') is-invalid @enderror" name="password" id="inputPassword" type="password" placeholder="Create a password" required />
                                                        <label for="inputPassword">Password</label>
                                                        @error('password')
                                                        <div class="invalid-feedback">
                                                        {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                
                                                {{-- <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" name="confirmpassword" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div> --}}
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary">Creat Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{route('auth.login')}}">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2024</div>
                           
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{url("js/scripts.js")}}"></script>
    </body>
</html>
