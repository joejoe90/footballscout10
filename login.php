<?php
/**

 */
include("dbConnect.php");



if (empty($_POST['username']) || empty($_POST['password'])) {
    echo "Both fields are required.";
} else {

    $username = $_POST['username'];
    $password = $_POST['password'];



    $sql_query = "SELECT * FROM user WHERE username='$username' and password='$password' ; ";
    //$result = $link->query($sql_query);

    //$sql = "SELECT uid FROM users WHERE username='$username' and password='$password'";
     $result = mysqli_query($link, $sql_query);

//    while($row = $result->fetch_array()){
//        // print out fields from row of data
//        echo "<p>".$row ['uid']. "</p>";
//
//    }

    if (mysqli_num_rows($result) == 1) {
        header("location: profile.php"); // Redirecting To another Page
    } else {
        echo "Incorrect username or password.";
    }

    $result->close();
    $link->close();


}
?>