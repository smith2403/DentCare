<?php 
include "dbconfig.php";

$id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$u=$_POST["uname"];
$p=$_POST["pass"];

$sql="UPDATE `users` SET `name`='$name',`email`='$email',`username`='$u',`password`='$p' WHERE id='$id'";
$result=mysqli_query($conn,$sql);
if ($result) {
    header("location:regusers.php");
} else {
    echo "Error". mysqli_error($conn);
};
mysqli_close($conn);

?>


