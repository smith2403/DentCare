<?php 
include "dbconfig.php";

$id=$_GET["id"];
$sql="DELETE FROM `contact` WHERE id='$id'";
$result= mysqli_query($conn,$sql);

if ($result) {
    header("location:contactdata.php");
} else {
    echo "Error". mysqli_error();
}

?>