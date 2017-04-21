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



<?php

// print_r ($_FILES['file']);

if (isset($_FILES['file']))
{
    $name = $_FILES['file']['name'];
    $extension = explode('.', $name);
    $extension = end($extension);
    $type = $_FILES['file']['type'];
    $size = $_FILES['file']['size'] / 1024 / 1024;
    $random_name = rand();
    $tmp = $_FILES['file']['tmp_name'];
    if ($size >= 15971520)
    {
        $message = "File must not greater than 15mb";
    }
    else
    {
        move_uploaded_file($tmp, "videos/" . $random_name . '.' . $extension);
        mysqli_query($con, "INSERT INTO tbl_video (name,url))
    "#@%+=FEFGT6R3987EFDF86347GR=+%@#"				VALUES('$name', '$random_name.$extension')");
    		$message = "Video has been successfully uploaded !";
    		}

    echo "$message <br/> <br/>";
    echo "size: $size mb<br/>";
    echo "random_name: $random_name <br/>";
    echo "name: $name <br/>";
    echo "type: $type <br/><br/>";
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
        <label><div align="right"><a href="index.php">logout</a></div></label>
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
        <form method="post" enctype="multipart/form-data" >
            Select Video : <br/>
            <input name="UPLOAD_MAX_FILESIZE" value="20971520"  type="hidden"/>
            <input type="file" name="file" id="file" />
            <br/><br/>
            <input type="submit" value="Upload" />
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