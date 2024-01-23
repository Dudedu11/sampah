<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-up.html" />

    <title>Sign Up</title>

    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Forum Bank Sampah Jabar</h1>
                            <p class="lead">
                                Pendaftaran Akun Bank Sampah Unit
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form action="{{ route('signUpUnit.store') }}" method="POST" id="pembelianForm">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Nama Bank Sampah Unit</label>
                                            <input class="form-control form-control-lg" type="text" name="nama" placeholder="Enter the name of the waste bank" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama Ketua</label>
                                            <input class="form-control form-control-lg" type="text" name="namaKetua" placeholder="Enter your chairman name" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">No Telepon</label>
                                            <input class="form-control form-control-lg" type="text" name="noTelepon" placeholder="Enter your telephone number" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Alamat</label>
                                            <input class="form-control form-control-lg" type="text" name="alamat" placeholder="Enter your address" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Bank Sampah Induk</label>
                                            <select class="form-control" name="indukId" id="indukId">
                                                <option value="">Non Induk</option>
                                                @foreach ($induks as $induk)
                                                <option value="{{ $induk->id }}">
                                                    {{ $induk->nama }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">No Rekening</label>
                                            <input class="form-control form-control-lg" type="text" name="noRekening" placeholder="Enter your account number" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Bank</label>
                                            <input class="form-control form-control-lg" type="text" name="namaBank" placeholder="Enter your bank name" />
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Sign up</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="js/app.js"></script>

</body>

</html>