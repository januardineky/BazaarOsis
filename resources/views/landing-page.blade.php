<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .navbar {
            /* background-color: transparent; */
            background-color: #0c2c56;
            padding-top: 20px;
        }

        .navbar-brand {
            color: white;
        }

        .navbar-nav .nav-link {
            color: white;
            margin-right: 30px;
            font-size: 18px;
        }

        .navbar-nav .btn {
            background-color: #f0ad4e;
            color: white;
            border-radius: 10px;
            font-size: 18px;
            padding: 8px 20px;
        }

        .navbar-nav .nav-item:last-child {
            margin-left: 20px;
        }

        .section-dark {
            background-color: #0c2c56;
            padding: 60px 0;
            color: white;
        }

        .section-gray {
            background-color: #f0f0f0;
            padding: 60px 0;
        }

        .section-white {
            background-color: #fff;
            padding: 60px 0;
        }

        .main-content h1 {
            /* background-color: #0c2c56; */
            font-size: 40px;
        }

        .main-content p {
            font-size: 18px;
        }

        .img-section {
            text-align: center;
        }

        .img-section img {
            width: 200px;
            margin-bottom: 20px;
        }

        .img-responsive {
            width: 100%;
            height: auto;
        }

        .contact-form {
            padding: 20px;
            border-radius: 8px;
        }

        .contact-form .btn {
            background-color: #ffb84d;
            border: none;
            color: #fff;
        }

        .contact-form .btn:hover {
            background-color: #e69a3a;
        }

        .main-content {}

        .logo {
            width: 200px;
            height: auto;

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

        .logo {
            margin-top: 30px;
            width: 100%;
            /* Adjust width as needed */
            max-width: 400px;
            /* Set a maximum width */
            height: auto;
            /* Maintain aspect ratio */
        }

        footer {
            background-color: #333d49;
            color: #fff;
            padding: 10px 0;
        }

        footer a {
            color: #fff;
            text-decoration: none;
            margin-left: 10px;
        }

        footer a:hover {
            color: #ffb84d;
        }

        .big-text {
            font-size: 2.5rem;
            /* Adjust font size for big text */
            margin-bottom: 20px;
            /* Space below the heading */
        }

        .small-text {
            font-size: 1rem;
            /* Adjust font size for small text */
            /* color: #666; Optional: Change color for small text */
        }

        .section-dark {
            /* background-color: #333; Example background color */
            color: white;
            /* Text color */
            padding: 40px 0;
            /* Padding for top and bottom */
        }

        /* Optional: Add responsiveness */
        @media (max-width: 768px) {
            .big-text {
                font-size: 2rem;
                /* Smaller size on mobile */
            }

            .small-text {
                font-size: 0.9rem;
                /* Smaller size on mobile */
            }

            .logo {
                max-width: 300px;
                /* Smaller max width on mobile */
            }
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <nav class="navbar navbar-expand-lg fixed-top"><br>
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#carouselExampleIndicators">Documentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn" href="/login">Order</a>
                    </li>
                </ul>
            </div>
        </div>
     </nav>
        <div class="section-dark">
         <div class="container main-content">
            <div class="row align-items-center"> <!-- Use align-items-center for vertical alignment -->
                <div class="col-lg-6">
                    <h1 class="big-text">Bazar Osis SMK YPC</h1><br><br><br>
                    <h3 class="small-text" id="about">Bergabunglah dalam Bazar OSIS! Belanja Seru, Ayo Dukung Sekolah!</h3>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('asset/logo/logo3.png') }}" alt="Logo" class="logo">
                </div>
            </div>
        </div>
    </div>
    <svg style="background-color:#f0f0f0;" width="100%" height="70" viewBox="0 0 100 100"
        preserveAspectRatio="none">
        <path id="wavepath" d="M0,0  L110,0C35,150 35,0 0,100z" fill="#0c2c56"></path>
    </svg>
    <div class="section-gray">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 img-section">
                    <img src="{{ asset('asset/logo/osis.png') }}" alt="Logo" class="logo">
                </div>
                <div class="col-md-8">
                    <p>Bazar OSIS adalah acara yang diorganisir oleh OSIS untuk mengumpulkan warga sekolah dalam suasana yang penuh keceriaan dan kebersamaan. Di sini, Anda dapat menemukan berbagai produk kreatif, makanan lezat, dan beragam hiburan menarik yang disajikan oleh siswa.</p>
                </div>
            </div>
        </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide trigger carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="active"
                aria-current="true" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="active"
                aria-current="true" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner gradient-custom">
            <div class="carousel-item active">
                <div class="d-flex p-5 gap-5 align-items-center justify-content-center">
                    <img src="{{ asset('asset/logo/dokumentasi4.jpeg') }}" width="600px" height="450px" alt="..."
                        style="object-fit: cover">
                    {{-- <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos velit
                        architecto enim iste facere maiores eius quas adipisci neque, numquam atque doloremque non!
                        Perspiciatis minus officiis ullam accusamus eos laboriosam amet molestiae qui dolore libero.
                        Deleniti, laboriosam! Optio aliquam dolores qui at incidunt sequi doloremque sit cupiditate,
                        tenetur, excepturi obcaecati?</p> --}}
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex p-5 gap-5 align-items-center justify-content-center">
                    <img src="{{ asset('asset/logo/dokumentasi2.jpeg') }}" width="600px" height="450px" alt="..."
                        style="object-fit: cover">
                    {{-- <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos velit
                        architecto enim iste facere maiores eius quas adipisci neque, numquam atque doloremque non!
                        Perspiciatis minus officiis ullam accusamus eos laboriosam amet molestiae qui dolore libero.
                        Deleniti, laboriosam! Optio aliquam dolores qui at incidunt sequi doloremque sit cupiditate,
                        tenetur, excepturi obcaecati?</p> --}}
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex p-5 gap-5 align-items-center justify-content-center">
                    <img src="{{ asset('asset/logo/dokumentasi3.jpeg') }}" width="600px" height="450px" alt="..."
                        style="object-fit: cover">
                    {{-- <p class="text-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos velit
                        architecto enim iste facere maiores eius quas adipisci neque, numquam atque doloremque non!
                        Perspiciatis minus officiis ullam accusamus eos laboriosam amet molestiae qui dolore libero.
                        Deleniti, laboriosam! Optio aliquam dolores qui at incidunt sequi doloremque sit cupiditate,
                        tenetur, excepturi obcaecati?</p> --}}
                </div>
            </div>
        </div>
        <button class="carousel-control-prev hidden-content" type="button"
            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next hidden-content" type="button"
            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="section-dark" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="contact-form text-center">
                        <h2 class="kontak">Contact Us</h2>
                        <br>
                        <form action="/contact" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Full Name">
                            </div><br>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div><br>

                            <div class="form-group">
                                <input type="text" class="form-control" name="no"
                                    placeholder="Contact Number">
                            </div><br>
                            <div class="form-group">
                                <textarea class="form-control" rows="4" name="message" placeholder="Message"></textarea>
                            </div><br>
                            <button type="submit" class="btn btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <p style="margin-top: 5vh;">Copyright All Right Reserved 2024, SMK YPC Tasikmalaya</p>
            <div class="icon" style="margin-left: 10vh;">
                <a href="https://www.youtube.com/@smkypctasikmalaya">
                    <i class="bi bi-youtube"></i>
                    <svg style="margin-left: 120vh; margin-top: -70px;" xmlns="http://www.w3.org/2000/svg"
                        width="45" height="35" fill="currentColor" class="bi bi-youtube"
                        viewBox="0 0 16 16">
                        <path
                            d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" />
                    </svg>
                </a>
                <a href="https://www.facebook.com/smkypc/?locale=id_ID">
                    <i class="bi bi-facebook"></i>
                    <svg style="margin-left: 5vh; margin-top: -70px;" xmlns="http://www.w3.org/2000/svg"
                        width="45" height="35" fill="currentColor" class="bi bi-facebook"
                        viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                    </svg>
                </a>
                <a href="https://www.instagram.com/officialsmkypc/?hl=en">
                    <i class="bi bi-instagram"></i>
                    <svg style="margin-left: 5vh; margin-top: -70px;" xmlns="http://www.w3.org/2000/svg"
                        width="45" height="35" fill="currentColor" class="bi bi-instagram"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                    </svg>
                </a>
            </div>
        </div>
    </footer>






</body>

</html>
<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
