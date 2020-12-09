<?php
require('./admin/config.php');

$results_per_page = 2;

$select = "select count(*) as count from movies.movies";
$count = $con->query($select);

$row = mysqli_fetch_assoc($count);

$count = $row['count'];
// echo 'here' . $count;

$select_mov = "select * from movies.movies";
$res = $con->query($select_mov);


?>

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
                    <a class="nav-link" href="movies.php?page=1">Movies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./admin/">Add Movies</a>
                </li>
                </li>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid mt-5 ml-5 mr-5">

        <?php
        // $data = array(
        //     'featured_img' => "",
        //     'description' => ""
        // );
        // while ($row = mysqli_fetch_assoc($res)) {

        //     // array_push($data['featured_img'], $row['featured_img'], $row['description']);
        //     // array_push($data['description'], $row['description']);

        //     // echo sizeof($row);
        //     echo '<div class="card col-xl-4">
        //                 <img src="./uploads/' . $row['featured_img'] . '" class="card-img-top">
        //                 <div class="card-body">
        //                     <p class="card-text">' . $row['description'] . '</p>
        //                 </div>
        //            </div>';
        // }

        // echo $data;

        // for ($i = 0; $i < $count; $i++) {
        //     echo "<div class='row'>";
        //     while ($row = mysqli_fetch_assoc($res)) {


        //         echo '<div class="col">
        //                 <div class="card ">
        //                     <img src="./uploads/' . $row['featured_img'] . '" class="card-img-top img-thumbnail">
        //                     <div class="card-body">
        //                         <p class="card-text">' . $row['description'] . '</p>
        //                     </div>
        //             </div>

        //             </div>';
        //     }
        //     echo "</div>";
        // }

        $num_of_pages = ceil($count / $results_per_page);

        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        $first_page_result = ($page - 1) * $results_per_page;

        $sql = "select * from movies.movies LIMIT " . $first_page_result . ',' . $results_per_page;
        $result = $con->query($sql);

        // for ($i = 0; $i < $count; $i++) {
        echo "<div class='row'>";
        while ($row = mysqli_fetch_array($result)) {


            echo '<div class="col">
                        <div class="card ">
                            <img src="./uploads/' . $row['featured_img'] . '" class="card-img-top img-thumbnail">
                            <div class="card-body">
                                <p class="card-text">' . $row['description'] . '</p>
                            </div>
                    </div>
                    
                    </div>';
        }
        echo "</div>";
        // }
        echo '<nav aria-label="Page navigation example">
            <ul class="pagination">';

        if ($num_of_pages == 1) {
            echo '<li class="page-item"><a class="page-link" href="' . $page . '">' . $page . '</a></li>';
        } else {

            for ($page = 1; $page <= $num_of_pages; $page++) {
                // echo "<a class='page-link' href='movies.php?page=" . $page . "'>" . $page . "</a>";
                if (($_GET['page']) == 1) {
                    echo '<li class="page-item"><a class="page-link" href="movies.php?page=' . $page . '">' . $page . '</a></li>';
                }
            }
        }
        ?>
        </ul>
        </nav>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>


    </div>

    <script src="./js/jquery.min.js"></script>
    <script src="./css/bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/js.js"></script>
</body>

</html>