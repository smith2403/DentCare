<?php 
include "dbconfig.php";

$id=$_GET["id"];
$sql="DELETE FROM `appointment` WHERE id='$id'";
$result= mysqli_query($conn,$sql);

if ($result) {
    header("location:appointmentdata.php");
} else {
    echo "Error". mysqli_error();
}

?>