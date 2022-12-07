<?php include "connect.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>
<body>
    <h4>View Uploaded Images</h4>

    <a href="index.php">&#8592;Back</a><br>
    <?php
    $sql ="select * from table1 order by id desc";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        while ($images = mysqli_fetch_assoc($res)){ ?>

        <div class="alb">
            <img src="web/<?=$images['image']; ?>" alt="">
        </div>


        

        <?php } } ?>
    
</body>
</html>