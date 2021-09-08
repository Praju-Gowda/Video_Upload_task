<?php
include("dp.php");
if(isset($_POST['upload'])) {

    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $temp_name = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_destination = "upload/".$file_name;

    if (move_uploaded_file($temp_name,$file_destination)) {
        $q = "INSERT INTO video (name) VALUES ('$file_name')";
        if(mysqli_query($conn,$q)) {
            $success = "video uploaded successfully.";
        }
        else{
            $failed = "something went wrong??";
        }
    }
    else{
        $msz = "Please select a video to upload..!";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Upload Video into the Database</title>
        <link rel="stylesheet" type="text/css" href="style\css\bootstrap.min.css">
<style>
body{
    background:#d4b4b4;
}
</style>
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center mb-5"><b>Upload Video into the Database Using Php</b></h1>
        <div class="col-lg-8 m-auto">
            <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label><strong>Upload a Video: </strong></label>
                <input type="file" name="file" name="file" class="form-control">
</div>
<?php if(isset($success)) { ?>
<div class="alert alert-success">

<?php echo $success;?>

</div>
<?php } ?>
<?php if(isset($failed)) { ?>
<div class="alert alert-danger">

<?php echo $failed;?>

</div>
<?php } ?>

<?php if(isset($msz)) { ?>
<div class="alert alert-danger">
    <?php echo $msz;?>

</div>
<?php } ?><br>
<input type="submit" name="upload" value="Upload" class="btn btn-success ml-3">
<div id="view">
<a href="index.php" class="btn btn-primary mt-3">View Videos</a>
</div>
</form>
</div>
</div>
</body>
</html>
