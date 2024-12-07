<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Form Register</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color:rgba(153,0,204,0.6);">
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/')}}" style="color:#9900cc;">Bimbel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/')}}" style="color:#9900cc;">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <div id="layoutAuthentication" style="margin-bottom:50px;">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3>
                                    @if (session('error'))
                                        <button class="btn btn-danger btn-block" type="button">{{ session('error') }} </button>
                                    @endif
                                    @if (session('success'))
                                        <button class="btn btn-primary btn-block" type="button">{{ session('success') }} </button>
                                    @endif
                                    </div>
                                    
                                    <div class="card-body">
                                        <form action="{{ route('member.simpan-register') }}" method="POST" id="regForm">
										{{ csrf_field() }}
                                            <div class="form-group">
												<label class="small mb-1" for="inputFirstName">Nama</label>
												<input class="form-control py-4" id="inputFirstName" type="text" name="name" placeholder="Masukkan Nama" />
												 @if ($errors->has('name'))
												  <span class="error">{{ $errors->first('name') }}</span>
												  @endif
                                            </div>
                                            <div class="form-group">
												<label class="small mb-1" for="inputusername">Username</label>
												<input class="form-control py-4" id="inputusername" type="text" name="username" placeholder="Masukkan username" />
												 @if ($errors->has('username'))
												  <span class="error">{{ $errors->first('username') }}</span>
												  @endif
											</div>
                                            <div class="form-group">
												<label class="small mb-1" for="inputEmailAddress">Email</label>
												<input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" placeholder="Masukkan Email" />
												@if ($errors->has('email'))
												  <span class="error">{{ $errors->first('email') }}</span>
												@endif
											</div>
                                            <div class="form-group">
												<label class="small mb-1" for="">Level</label>
												<select class="form-control" name="level">
                                                    <option value="admin">Admin</option>
                                                    <option value="user">User</option>
                                                </select>
											</div>
											<div class="form-group">
												<label class="small mb-1" for="inputPassword">Password</label>
												<input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Masukkan Password" />
												@if ($errors->has('password'))
												  <span class="error">{{ $errors->first('password') }}</span>
												@endif
											</div>
                                            <div class="form-group mt-4 mb-0">
								                <button class="btn btn-primary btn-block" type="submit" style="background-color:#9900cc;">Daftar!</button>
											</div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="{{ route('login.form-login') }}">Sudah Punya Akun? Login!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{url('assets/js/scripts.js')}}"></script>
    </body>
</html>