<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
                .login-container {
            display: flex;
            height: 100vh;
        }
        .login-logo {
            background-color: #1a2b48;
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
        }
        .login-logo img {
            max-width: 80%;
            height: auto;
        }
        .login-form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .form-container {
            width: 100%;
            max-width: 350px;
        }
        .btn-custom {
            background-color: #f0a500;
            color: white;
            border: none;
            width: 55vh;
        }
        .btn-custom:hover {
            background-color: #e69500;
        }

        .btninput {
            background-color: #f0a500;
            color: white;
            border: none;
            width: 44vh;
            border-radius: 20px;
        }
        .btninput:hover {
            background-color: #3e3420;
        }

        /*nu kita


        @media (min-width: 1025px) {
            .gradient-custom {
    /* fallback for old browsers */

.h-custom {
height: 100vh !important;
}
.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}

.bg-indigo {
background-color: #4835d4;
}
@media (min-width: 992px) {
.card-registration-2 .bg-indigo {
border-top-right-radius: 15px;
border-bottom-right-radius: 15px;
}
}
@media (max-width: 991px) {
.card-registration-2 .bg-indigo {
border-bottom-left-radius: 15px;
border-bottom-right-radius: 15px;
}
}
    </style>
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
</head>
<body>
    @include('sweetalert::alert')
    <section class="h-100 h-custom gradient-custom">
        <div class="container-fluid login-container">
            <div class="login-logo">
                <img src="{{ asset('asset/logo/logo3.png') }}" alt="School Logo">
            </div>
            <div class="login-form">
                <div class="form-container">
                    <h3 class="text-center">Register</h3><br><br>
                    <form action="/createuser" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" class="form-control" name="name" id="username" placeholder="Enter your username">
                        </div><br>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        </div><br>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        </div><br>
                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input type="contact" class="form-control" id="contact" name="no" placeholder="Enter your number">
                        </div><br>
                        <br><br>
                    {{-- <button type="submit" class="btn btn-custom btn-block">
                        <input type="submit" value="Register" class="btn btn-block" style="width: 44vh;">
                    </button> --}}
                    {{-- <input data-mdb-button-init data-mdb-ripple-init class="btn btn-custom btn-md btn-block w-100" type="submit"></input> --}}
                    <div class="btninput">
                        <input type="submit" value="Register" class="btn btn-block" style="width: 44vh; color: white">
                             {{-- <input type="submit" value="Register" class="btn btn-outline-light w-100">Register</input> --}}
                        </input>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </body>

     {{-- nu kita diatas --}}
        {{-- <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
              <div class="card card-registration card-registration-2 bg-transparent" style="border-radius: 15px;">
                <div class="card-body p-0">
                  <div class="row g-0">
                    <div class="col-lg-6">
                      <div class="p-5">
                        <form action="/createuser" method="post">
                            @csrf
                            <h3 class="fw-normal mb-5 text-white">Informasi Umum</h3>

                            <div class="mb-4 pb-2">
                                <div data-mdb-input-init class="form-outline">
                                <input type="text" id="form3Examplev4" name="name" class="form-control form-control-lg" required/>
                                <label class="form-label text-white"  for="form3Examplev4">Nama Lengkap</label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div data-mdb-input-init class="form-outline form-white">
                                <input type="email" id="form3Examplea9" name="email" class="form-control form-control-lg" required/>
                                <label class="form-label text-white" for="form3Examplea9">Email</label>
                                </div>
                            </div>

                            <div class="mb-4 pb-2">
                                <div data-mdb-input-init class="form-outline form-white">
                                <input type="number" id="form3Examplea6" name="no" class="form-control form-control-lg" required/>
                                <label class="form-label text-white"  for="form3Examplea6">Nomor Telpon</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-4 pb-2">
                                    <div data-mdb-input-init class="form-outline form-white">
                                    <input type="password" id="form3Examplea6" name="password" class="form-control form-control-lg" required />
                                    <label class="form-label text-white"  for="form3Examplea6">Password</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </div>
                        <div class="col-lg-6 bg-transparent text-white">
                        <div class="p-5">
                            <h3 class="fw-normal mb-5">Informasi Tambahan</h3>
                            <div class="mb-4 pb-2">
                            <div data-mdb-input-init class="form-outline form-white">
                                <input type="text" id="form3Examplea2" name="jalan" class="form-control form-control-lg" required/>
                                <label class="form-label" for="form3Examplea2">Nama Jalan</label>
                            </div>
                            </div>

                            <div class="mb-4 pb-2">
                            <div data-mdb-input-init class="form-outline form-white">
                                <input type="text" id="form3Examplea3" name="kab" class="form-control form-control-lg" required/>
                                <label class="form-label" for="form3Examplea3">Kabupaten/Kota</label>
                            </div>
                            </div>

                            <div class="row">
                            <div class="col-md-5 mb-4 pb-2">

                                <div data-mdb-input-init class="form-outline form-white">
                                <input type="text" id="form3Examplea4" name="pos" class="form-control form-control-lg" required/>
                                <label class="form-label" for="form3Examplea4">Kode Pos</label>
                                </div>

                            </div>
                            <div class="col-md-7 mb-4 pb-2">

                                <div data-mdb-input-init class="form-outline form-white">
                                <input type="text" id="form3Examplea5" name="kec" class="form-control form-control-lg" required/>
                                <label class="form-label"  for="form3Examplea5">Kecamatan</label>
                                </div>

                            </div>
                            </div>

                            <div class="mb-4">
                                <div data-mdb-input-init class="form-outline form-white">
                                <input type="text" id="form3Examplea9" name="detail" class="form-control form-control-lg" required/>
                                <label class="form-label" for="form3Examplea9">Detail Tambahan</label>
                                </div>
                            </div>

                            <div class="form-check d-flex justify-content-start mb-4 pb-3">
                            <input class="form-check-input me-3" type="checkbox" value="" id="form2Example3c" />
                            <label class="form-check-label text-white" for="form2Example3">
                                Saya Menerima <a href="#!" class="text-white"><u>Syarat dan Ketentuan</u></a> Situs Ini
                            </label>
                            </div>

                            <input type="submit" value="Register" class="btn btn-outline-light w-100"></input>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </section>
</body>
<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
</html>
