<?php 
include "dbconfig.php";

$id=$_GET["id"];
$sql="DELETE FROM `users` WHERE id='$id'";
$result= mysqli_query($conn,$sql);

if ($result) {
    header("location:regusers.php");
} else {
    echo "Error". mysqli_error();
}

?>