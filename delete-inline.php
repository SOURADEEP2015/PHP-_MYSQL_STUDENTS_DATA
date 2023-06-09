<?php
echo $stu_id = $_GET['id'];
$server = "localhost";
    $username = "root";
    $password = "Admin@123";
    $conn = mysqli_connect($server, $username, $password, "crud", 3307) or
        die('Error: ' . mysqli_connect_error());
    $sql = "DELETE from student WHERE sid = {$stu_id}";
    $result = mysqli_query($conn, $sql) or die("Querry Unsuccessful  X");
    header("Location: http://localhost/myClass/index.php");
    mysqli_close($conn);
