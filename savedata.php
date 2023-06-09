<?php
echo $stu_name = $_POST["sname"];
echo $stu_address = $_POST["saddress"];
echo $stu_class = $_POST["class"];
echo $stu_phone = $_POST["sphone"];
$server = "localhost";
$username = "root";
$password = "Admin@123";
$conn = mysqli_connect($server, $username, $password, "crud", 3307) or
    die('Error: ' . mysqli_connect_error());
$sql = "INSERT INTO student (sname, saddress, sclass, sphone) VALUES ('{$stu_name}', '{$stu_address}', '{$stu_class}', '{$stu_phone}')";
$result = mysqli_query($conn, $sql) or die("Querry Unsuccessful  X");
header("Location: http://localhost/myClass/index.php");
mysqli_close($conn);
