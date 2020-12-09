<?php
require('./config.php');

$lang = "select * from languages";
$result = $con->query($lang);

// while ($row = mysqli_fetch_assoc($result)) {
//     echo $row['lang_id'];
// }

$genre = "select * from genre";
$res = $con->query($genre);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Home</title>
</head>
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <!-- <img class="logo-img" width="20%" src="./images/logo.gif" alt="" srcset=""> -->
            <img src="../images/logo.gif" width="150" class="d-inline-block align-top" alt="" loading="lazy">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../movies.php?page=1">Movies</a>
                </li>
                </li>
            </ul>
        </div>
    </nav>
    <div align="center">

        <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-8 mt-5">
            <div class="card" style="text-align: left;">
                <div class="card-header">
                    Add Movies
                </div>
                <div class="card-body">
                    <span id="statusmsg"></span>
                    <span id="featured-img"></span>

                    <form action="upload.php" method="POST" enctype="multipart/form-data" id="form">
                        <div class="form-group">
                            <input class="form-control" type="file" name="img" id="thumbnail">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Title" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control " placeholder="Description" name="description" id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control col-3 col-xl-4 col-lg-4 col-md-4 col-sm-4" placeholder="Duration" name="duration" id="Duration" style="display: inline;"><span style="display: inline;">(in minutes)</span>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control col-3 col-xl-4 col-lg-4 col-md-4 col-sm-4" name="release" id="release" style="display: block;">
                        </div>
                        <div class="form-group">
                            <select class="form-control col-3 col-xl-4 col-lg-4 col-md-4 col-sm-4" name="language">
                                <option value="" selected disabled hidden>--Language--</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo ' <option value="' . $row['lang_id'] . '">' . $row['languages'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control col-3 col-xl-4 col-lg-4 col-md-4 col-sm-4" name="genre">
                                <option value="" selected disabled hidden>--Genre--</option>
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) {
                                    echo ' <option value="' . $row['gen_id'] . '">' . $row['genre'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-primary" id="submit" name="submitbtn" type="submit">Add Movie</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../css/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/js.js"></script>

</body>

</html>