<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ini Judul</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="styles.css" rel="stylesheet" />
        <style>
            .gradient-custom {
                background-color: #0c2c56;
    /* fallback for old browsers */
    /* background: #6a11cb; */

    /* Chrome 10-25, Safari 5.1-6 */
    /* background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)); */

    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    /* background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)) */
    }

        .hidden-content {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            visibility: hidden;
            position: absolute;
        }
        .trigger:hover .hidden-content {
            opacity: 1;
            visibility: visible;
        }


        .shop {
        margin-left: 188vh;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
        background-color: #1f4b85;
        border-radius: 50%;
        width: 70px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 7px 9px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        }

        .shop:hover {
        transform: translateY(-10px);
        }

        .category-dropdown select {
            margin-left: 100vh;
        background-color: #0c2c56;
        color: white;
        border: 1px solid #fff;
        padding: 8px 12px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, color 0.3s ease;
        }

        .category-dropdown select:hover {
        background-color: #ffffff;
        color: #000000;
        border-color: #ddd;
        }

.category-dropdown select:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(255, 255, 255, 0.5);

}
        </style>
    </head>
    <body>
    @include('sweetalert::alert')
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark gradient-custom fixed-top">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/home">Ini Judul</a>
                    <form class="d-flex" action="/home/search" method="POST" style="margin-left: 250px">
                        @csrf
                        <input class="form-control me-2 w-100" type="search" placeholder="Search" name="cari" aria-label="Search">
                        <input class="btn btn-outline-light" value="Cari" type="submit"></input>
                    </form>
                        <a href="/home/cart" style="text-decoration: none" class="btn btn-outline-light" style="margin-left: 50px">
                            <i class="bi-cart me-1"></i>
                            Keranjang
                        </a>
                        <a href="/auth/logout" onclick="return window.confirm('Apakah anda ingin Logout?')" style="text-decoration: none" class="btn btn-outline-light">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                        </a>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <div id="carouselExampleIndicators" class="carousel slide trigger" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="active" aria-current="true" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner gradient-custom">
              <div class="carousel-item active">
                <div class="d-flex p-5 gap-5 align-items-center justify-content-center">
                    <img src="{{ asset('asset/logo/asset5.jpg') }}" width="600px" height="450px" alt="...">
                    {{-- <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos velit architecto enim iste facere maiores eius quas adipisci neque, numquam atque doloremque non! Perspiciatis minus officiis ullam accusamus eos laboriosam amet molestiae qui dolore libero. Deleniti, laboriosam! Optio aliquam dolores qui at incidunt sequi doloremque sit cupiditate, tenetur, excepturi obcaecati?</p> --}}
                </div>
            </div>
              <div class="carousel-item">
                <div class="d-flex p-5 gap-5 align-items-center justify-content-center">
                    <img src="{{ asset('asset/logo/asset6.jpg') }}" width="600px" height="450px" alt="...">
                    {{-- <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos velit architecto enim iste facere maiores eius quas adipisci neque, numquam atque doloremque non! Perspiciatis minus officiis ullam accusamus eos laboriosam amet molestiae qui dolore libero. Deleniti, laboriosam! Optio aliquam dolores qui at incidunt sequi doloremque sit cupiditate, tenetur, excepturi obcaecati?</p> --}}
                </div>
              </div>
              <div class="carousel-item">
                <div class="d-flex p-5 gap-5 align-items-center justify-content-center">
                    <img src="{{ asset('asset/logo/asset7.jpg') }}" width="600px" height="450px" alt="...">
                    {{-- <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos velit architecto enim iste facere maiores eius quas adipisci neque, numquam atque doloremque non! Perspiciatis minus officiis ullam accusamus eos laboriosam amet molestiae qui dolore libero. Deleniti, laboriosam! Optio aliquam dolores qui at incidunt sequi doloremque sit cupiditate, tenetur, excepturi obcaecati?</p> --}}
                </div>
              </div>
            </div>
            <button class="carousel-control-prev hidden-content" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next hidden-content" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
          </div>
          <br><br>
          <div class="category-dropdown">
            <select name="categories" id="categories">
                <option value="alat-tulis">Alat Tulis</option>
                <option value="makanan">Makanan</option>
            </select>
        </div>
        {{-- <form method="GET" action="{{ route('kategori') }}">
            @csrf
            <div class="category-dropdown">
                <select name="categories" id="categories" onchange="this.form.submit()">
                    <option value="">Pilih Kategori</option>
                    <option value="alat-tulis" {{ request('categories') == 'alat-tulis' ? 'selected' : '' }}>Alat Tulis</option>
                    <option value="makanan" {{ request('categories') == 'makanan' ? 'selected' : '' }}>Makanan</option>
                </select>
            </div>
        </form> --}}


          <div class="shop fixed">
            <a href="/home/cart" style="text-decoration: none" style="margin-left: 50px">

                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-cart" viewBox="0 0 16 16">
                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                  </svg>
            </a>
            {{-- <i class="bi bi-cart"></i> --}}
          </div>

        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5" style="padding-bottom: 100px">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($produk as $key => $item)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('storage/'.$item->gambar) }}" alt="" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <!-- Product name-->
                                <h6 class="fw-normal">{{ $item->name }}</h6>
                                <!-- Product price-->
                                <p class="fw-bolder">Rp.{{ $item->harga }}</p>
                                <p class="fw-light text-secondary" style="margin-top: -10px">Kategori : {{ $item->kategori }}</p>
                                <p class="fw-light text-secondary" style="margin-top: -10px">Stok : {{ $item->stok }}</p>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent" style="margin-top: -25px">
                                <form action="/home/tambah/{{ $item->id }}" method="post">
                                    @csrf
                                    <input type="submit" class="btn btn-outline-dark mt-auto" name="input" value="Tambah">
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 gradient-custom">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Januardi 2024</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    </body>
</html>