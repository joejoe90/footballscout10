
/**
 * Created by PhpStorm.
 * User: joseph
 * Date: 19/04/2017
 * Time: 21:21
 *

<?php
    require_once ('dbconnect.php');
    $id=$_SESSION['SESS_MEMBER_ID'];
    $result3 = mysql_query("SELECT * FROM member where mem_id='$id'");
    while($row3 = mysql_fetch_array($result3))
    {
        $firstname=$row3['firstname'];
        $lastname=$row3['lastname'];
        $username=$row3['username'];
        $age=$row3['age'];
        $playerposition=$row3['playerposition'];
        $email=$row3['email'];
    }
    ?>
<table width="398" border="0" align="center" cellpadding="0">
    <tr>
        <td height="26" colspan="2">Your Profile Information </td>
        <td><div align="right"><a href="index.php">logout</a></div></td>
    </tr>
    <tr>
        <td width="129" rowspan="5"><img src="<?php echo $picture ?>" width="129" height="129" alt="no image found"/></td>
        <td width="82" valign="top"><div align="left">FirstName:</div></td>
        <td width="165" valign="top"><?php echo $firstname ?></td>
    </tr>
    <tr>
        <td valign="top"><div align="left">LastName:</div></td>
        <td valign="top"><?php echo $lastname ?></td>
    </tr>
    <tr>
        <td valign="top"><div align="left">username:</div></td>
        <td valign="top"><?php echo $username ?></td>
    </tr>
    <tr>
        <td valign="top"><div align="left">Age:</div></td>
        <td valign="top"><?php echo $age ?></td>
    </tr>
    <tr>
        <td valign="top"><div align="left">playerposition: </div></td>
        <td valign="top"><?php echo $playerposition?></td>
    </tr>
</table>
<p align="center"><a href="index.php"></a></p>