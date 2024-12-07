<<!DOCTYPE html>
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
    <body style="background-color:#9900cc;">
        <div id="layoutAuthentication">
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
                                        <form action="{{ route('admin.edit-data', $getDataId->id) }}" method="post" id="regForm">
										{{ csrf_field() }}
                                            <div class="form-group">
												<label class="small mb-1" for="inputFirstName">Nama</label>
												<input class="form-control py-4" id="inputFirstName" type="text" name="name" value="{{ $getDataId->name }}" />
												 @if ($errors->has('name'))
												  <span class="error">{{ $errors->first('name') }}</span>
												  @endif
                                            </div>
                                            <div class="form-group">
												<label class="small mb-1" for="inputEmailAddress">Email</label>
												<input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" value="{{ $getDataId->email }}" />
												@if ($errors->has('email'))
												  <span class="error">{{ $errors->first('email') }}</span>
												@endif
											</div>
                                            <div class="form-group">
												<label class="small mb-1" for="paket">Paket</label>
												<select class="form-control" name="paket">
                                                    <option value="1 bulan">1 bulan</option>
                                                    <option value="2 bulan">2 bulan</option>
                                                </select>
											</div>
                                            <div class="form-group">
												<label class="small mb-1" for="kategori">Paket</label>
												<select class="form-control" name="kategori">
                                                    <option value="matematika">Matematika</option>
                                                    <option value="fisika">Fisika</option>
                                                    <option value="kimia">Kimia</option>
                                                </select>
											</div>
                                            <div class="form-group mt-4 mb-0">
								                <button class="btn btn-primary btn-block" type="submit" style="background-color:#9900cc;">Buat</button>
											</div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="{{ route('admin.admin-beranda') }}">kembali</a></div>
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