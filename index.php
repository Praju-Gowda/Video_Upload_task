<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style\css\bootstrap.min.css">
        <title>Display All Videos</title>
<style>
body{
    background:#d4b4b4;
}
</style>
</head>
<body>
    <div class="container mt-3 mb-3">
        <h1><b>Display All Videos from database</b></h1>
<hr/>
<a href="upload.php" class="btn btn-primary mt-3">Upload a New Video</a>
<hr/>
<div class="row">
    <?php
    include("dp.php");
    $q = "SELECT * FROM video";
    $query = mysqli_query($conn,$q);
    while($row=mysqli_fetch_array($query)){
        ?>
        <div class="col-md-4">
            <video id="myVideo" width="100%" controls>
                <source src="<?php echo 'upload/'.$row['name'];?>">
    </video>
    </div>

    <?php }
    ?>
    </div>
    </div>
    </body>
    </html>