<?php
require('dbconnect.php');
// If the values are posted, insert them into the database.
if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO `user` (username, password, email) VALUES ('$username', '$password', '$email')";
    $result = mysqli_query($link, $query);
    if($result){
        $smsg = "User Created Successfully.";
    }else{
        $fmsg ="User Registration Failed";
    }
}
?>
<html>
<head>
    <body>
<div class="container">
<form class="form-signin" method="POST">
    <h2 class="form-signin-heading">Please Register</h2>
    <div class="input-group">
        <Label class="input-group-addon" id="basic-addon1">First Name</Label>
        <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname" required>

        <Label class="input-group-addon" id="basic-addon1">Last Name</Label>
        <input type="text" name="lastname" class="form-control" placeholder="Enter lastname" required>

        <Label class="input-group-addon" id="basic-addon1">username</Label>
        <input type="text" name="username" class="form-control" placeholder="Enter username" required>

        <Label class="input-group-addon" id="basic-addon1">age</Label>
        <input type="number" name="age" class="form-control" placeholder="Enter age" required>

        <Label class="input-group-addon" id="basic-addon1">position</Label>
        <input type="text" name="position" class="form-control" placeholder="Enter position" required>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
        <a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
    </div>
</form>
</div>
<html/>
<head/>
<body/>
