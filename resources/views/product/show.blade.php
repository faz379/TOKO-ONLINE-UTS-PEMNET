<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h4 class="mb-4">Detail Produk</h4>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">NAMA PRODUK</label>
                            <p class="form-control">{{ $product->nama_produk }}</p>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">DESKRIPSI</label>
                            <p class="form-control">{{ $product->deskripsi }}</p>
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold">HARGA</label>
                            <p class="form-control">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                        </div>

                        <a href="{{ route('product.index') }}" class="btn btn-md btn-secondary">KEMBALI</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
