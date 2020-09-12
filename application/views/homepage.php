<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kantigniter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</head>

<body style="background-image: url('assets/banner.jpg');background-size: cover;">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFE5E5;">
        <a class="navbar-brand" href="#"><a class="pengaduan" style="color: #FF0000;">PENGADUAN</a><a class="masyarakat"
                style="color: #000000;">MASYARAKAT</a></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link mt-2 mr-1" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('LoginController/index'); ?>"><button type="button"
                            class="btn btn-warning">Login</button></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid h-100"
        style="text-align: center; display: inline-block; font-size: 30pt; font-weight: bold; margin-top: 100px;">
        MELAKUKAN PENGADUAN<br>SEKARANG JADI LEBIH GAMPANG<br>
        <button type="button" class="btn btn-lg btn-danger mt-5 font-weight-bold">Adukan Sekarang</button>
    </div>
</body>

</html>