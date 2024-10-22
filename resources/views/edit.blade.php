<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <style>
        .gradient-custom {
            background-color: #1a2b48;

}
.btn{
        background-color: #1a2b48;
        color: white;
    }
    .btn:hover{
        background-color: #4b6794;
        color: white;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark gradient-custom">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="/index">Bazar Osis</a>
                <form class="d-flex">
                    <a href="/logout" onclick="return window.confirm('Apakah anda ingin Logout?')" style="text-decoration: none" class="btn btn-outline-light">
                    <i class="bi bi-box-arrow-right"></i>
                    Logout
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        Form Produk
                    </div>
                    <div class="card-body">
                        <form action="/index/edit/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group pt-2">
                                <label for="productName">Nama Produk</label>
                                <input type="text" class="form-control" id="productName" placeholder="Masukkan nama produk" name="name" value="{{ $produk->name }}">
                            </div>
                            <div class="form-group pt-2">
                                <label for="category">Kategori</label>
                                <input type="text" class="form-control" id="category" placeholder="Masukkan kategori produk" name="kategori" value="{{ $produk->kategori }}">
                            </div>
                            <div class="form-group pt-2">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" id="price" placeholder="Masukkan harga produk" name="harga" value="{{ $produk->harga }}">
                            </div>
                            <div class="form-group pt-2">
                                <label for="quantity">Stok</label>
                                <input type="number" class="form-control" id="quantity" placeholder="Masukkan jumlah produk" name="stok" value="{{ $produk->stok }}">
                            </div>
                            <div class="form-group pt-2">
                                <label for="image">Gambar</label>
                                <input type="file" class="form-control-file" id="image" name="gambar">
                            </div>
                            <input type="submit" class="btn btn-primary w-100 btn-block mt-5"></input>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
