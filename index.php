<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <!-- <img class="logo-img" width="20%" src="./images/logo.gif" alt="" srcset=""> -->
            <img src="./images/logo.gif" width="150" class="d-inline-block align-top" alt="" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="./">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="movies.php">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./admin/">Add Movies</a>
                </li>
                </li>
            </ul>
        </div>
    </nav>
    <div class="banner">
        <video autoplay muted loop id="myVideo" class="d-block w-100">
            <source src="./video_bg/LandingVideo.mp4" type="video/mp4">
        </video>
    </div>


    <script src="../js/jquery.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/js.js"></script>
</body>

</html>