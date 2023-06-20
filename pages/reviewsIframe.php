<?php
require_once '../helpers/connection.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reviews</title>
    <style>
        body {
            color: blue;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
    $q = "SELECT * FROM review NATURAL JOIN user WHERE productId='" . $_GET['x'] . "'";
    $res = mysqli_query($con, $q);
    if ($res) {
        $n = mysqli_num_rows($res);
        if ($n == 0) {
            echo "<p class='text-muted text-info mt-2'>No reviews yet...Be the first one to add yours !";
        } else if ($n > 0) {
            for ($p = 0; $p < $n; $p++) {
                $row = mysqli_fetch_assoc($res);
                $rating ;
                if($row['rating'] > 0){ $rating = strval($row['rating']) . " Stars";}
                else{$rating ="no rating";}
                echo '
                <div class="card text-bg-light mb-3" style="max-width: 25rem;">
  <div class="card-header"><img src="'.$row['profilePicture'].'" alt="" style="height: 2em; width: 2em; margin-right: 2em; border-radius: 5rem;"><span class="">'.$row['firstName']." ".$row['lastName'].'</span><span class="ms-5 fw-bolder text-primary">'.substr($row['creationDate'],0,10).'</span></div>
  <div class="card-body">
    <h5 class="card-title">'.$rating.'</h5>
    <p class="card-text">'.$row['comment'].'.</p>
  </div>
</div>';
            }
        }
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>