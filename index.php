<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>footballscout</title>

    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body class="mainstyle">
<header>
    <h1 style="color: yellow">FOOTBALLSCOUT</h1>
</header>
<main >
<!--    <section>-->
<!--        <h2>Connect to  database</h2>-->
<!--        --><?//
//        include 'dbConnect.php';
//        print " dbhost - ".$connectstr_dbhost."<br>";
//        print " dbname- ".$connectstr_dbname."<br>";
//        print " dbusername- ".$connectstr_dbusername."<br>";
//        print " dbpassword- ".$connectstr_dbpassword."<br>";
//        ?>
<!--        <p><a href="all.php">All Marvel Movies</a></p>-->
<!--        <p><a href="xmen.php">All X-MEN Movies</a></p>-->
<!--        <p><a href="dbConnect.php">dbC34Aonnect</a></p>-->
<!---->
<!--    </section>-->

    <div class="loginBox" >

        <br><br>
        <form method="post" action="login.php">
            <label>Username:</label><br>
            <input type="text" name="username" placeholder="username" /><br><br>
            <label>Password:</label><br>
            <input type="password" name="password" placeholder="password" />  <br><br>
            <input type="submit" name="submit" value = "login"/>
        </form>
           <a href="register.php" style="-webkit-appearance: button; -moz-appearance: button; appearance:button; text-decoration:none; color:initial">Register</a>
        <div class="error"><?php //echo $error;?><?php //echo $username; echo $password;?></div>

    </div>





</main>
<footer>
</footer>
</body>
</html>