<?php
require('./config.php');

if (isset($_POST['submitbtn'])) {
    $thumbnail = '../uploads/' . basename($_FILES["img"]["name"]);
    $ext = pathinfo($thumbnail, PATHINFO_EXTENSION);
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $release = $_POST['release'];
    $language = $_POST['language'];
    $genre = $_POST['genre'];

    // echo "<script>alert(" . $language . ")</script>";

    if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg')
        echo "<script> alert('Please upload png, jpg or jpeg files only'); location.href='./'; </script>";
    else {
        if (!empty($title) && !empty($description) && !empty($duration) && !empty($release) && !empty($language) && !empty($genre)) {
            $featured_img = $_FILES['img']['name'];
            if (move_uploaded_file($_FILES['img']['tmp_name'], $thumbnail)) {
                // echo "<script> alert('File uploadeds'); </script>";
                $save = "insert into movies.movies(title, featured_img, description, duration, release_date) values ('" . $title . "', '" . $featured_img . "', '" . $description . "', '" . $duration . "', '" . $release . "')";

                $last_id = "select (auto_increment-1) as lastId from information_schema.tables where table_name = 'movies' and table_schema = 'movies'";



                if ($con->query($save) == TRUE) {
                    $lid_res = $con->query($last_id);
                    // if ($lid_res == TRUE) {
                    $row = mysqli_fetch_assoc($lid_res);

                    $movie_last_id = $row['lastId'];

                    // echo $movie_last_id;
                    // }

                    $save_relation = "insert into relation (mov_id, lang_id, gen_id) values ('" . $movie_last_id . "', '" . $language . "', '" . $genre . "')";

                    if ($con->query($save_relation)) {
                        echo "<script> alert('Movie saved successfully'); location.href='./';</script>";
                    } else {
                        echo "<script> alert('Error saving movie'); location.href='./'; </script>";
                    }
                } else
                    echo "<script> alert('Error saving movie');  location.href='./';</script>";
            } else {
                echo "<script> alert('File not uploaded'); location.href='./'; </script>";
            }
        } else {
            echo "<script> alert('Please fill all the details');  location.href='./';</script>";
        }
    }
}
