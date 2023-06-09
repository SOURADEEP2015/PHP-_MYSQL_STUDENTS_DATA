<?php
echo $stu_id = $_POST["sid"];
echo $stu_name = $_POST["sname"];
echo $stu_address = $_POST["saddress"];
echo $stu_class = $_POST["sclass"];
echo $stu_phone = $_POST["sphone"];
$server = "localhost";
$username = "root";
$password = "Admin@123";
$conn = mysqli_connect($server, $username, $password, "crud", 3307) or
    die('Error: ' . mysqli_connect_error());
$sql = "UPDATE `student` SET `sname`='$stu_name',`saddress`='$stu_address',`sclass`='$stu_class',`sphone`='$stu_phone' 
WHERE sid = {$stu_id} ";
$result = mysqli_query($conn, $sql) or die("Querry Unsuccessful  X");
 header("Location: http://localhost/myClass/index.php");
mysqli_close($conn);
