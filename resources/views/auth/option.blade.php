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

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

    <title>Sign In</title>

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

                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row" style=" padding-bottom: 10px;">
                                    <a href="{{ route('signUpUnit.index') }}" class="btn btn-primary btn-block" style="text-align: center;">Register Bank Sampah Unit</a>
                                </div>
                                <div class="row" style=" padding-bottom: 10px;">
                                    <a href="{{ route('signUpInduk.index') }}" class="btn btn-primary btn-block" style="text-align: center;">Register Bank Sampah Induk</a>
                                </div>
                                <div class="row" style=" padding-bottom: 10px;">
                                    <a href="{{ route('signUpIndustri.index') }}" class="btn btn-primary btn-block" style="text-align: center;">Register Industri</a>
                                </div>
                                <div class="row" style=" padding-bottom: 10px;">
                                    <a href="{{ route('edukasi') }}" class="btn btn-primary btn-block" style="text-align: center;">Informasi</a>
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