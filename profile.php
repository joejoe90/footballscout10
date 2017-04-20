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
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile Page</title>
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