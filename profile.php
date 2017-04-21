<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: joseph-->
<!-- * Date: 19/04/2017-->
<!-- * Time: 21:21-->
<!-- *-->

<?php
    require_once ('dbconnect.php');
    $id=$_SESSION['username'];
    $query = mysqli_query("SELECT * FROM user where username='$id'");
    while($result = mysqli_fetch_array($query))
    {
        $firstname=$result['firstname'];
        $lastname=$result['lastname'];
        $username=$result['username'];
        $age=$result['age'];
        $playerposition=$result['playerposition'];
        $email=$result['email'];
    }
    ?>


<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile Page</title>

    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body class="mainstylee">
<div width="398" border="0" align="center" cellpadding="0">
    <div>
        <label height="26" colspan="2">Your Profile Information </label>
        <label><div align="right"><a href="index.php"><input type="button" value="logout"></a></div></label>
    </div>

    <div>
        <label width="129" rowspan="5"><img src="profilepic.bmp" width="129" height="129" alt="no image found"/></label>
        <label width="82" valign="top"><div align="left">FirstName:</div></label>
        <label width="165" valign="top"><?php echo $firstname ?></label>
    </div>

    <div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>








   <div>
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <label for="file"><span>video:</span></label>
        <input type="file" name="file" id="file" />
        <br />
        <input type="submit" name="submit" value="Submit" />
    </form>
   </div>



    <div>
        <label valign="top"><div align="left">LastName:</div></label>
        <label valign="top"><?php echo $lastname ?></label>
    </div>
    <div>
        <label valign="top"><div align="left">username:</div></label>
        <label valign="top"><?php echo $username ?></label>
    </div>
    <div>
        <label valign="top"><div align="left">Age:</div></label>
        <label valign="top"><?php echo $age ?></label>
    </div>
    <div>
        <label valign="top"><div align="left">playerposition: </div></label>
        <label valign="top"><?php echo $playerposition?></label>
    </div>
</div>
<p align="center"><a href="index.php"></a></p>
</body>
</html>