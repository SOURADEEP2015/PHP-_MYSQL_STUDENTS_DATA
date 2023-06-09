<?php include 'header.php'; ?>


<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
        <?php
        if(isset($_POST['deletebtn'])){
        echo $stu_id = $_POST['sid'];
        $server = "localhost";
        $username = "root";
        $password = "Admin@123";
        $conn = mysqli_connect($server, $username, $password, "crud", 3307) or
            die('Error: ' . mysqli_connect_error());
        $sql = "DELETE from student WHERE sid = {$stu_id}";
        $result = mysqli_query($conn, $sql) or die("Querry Unsuccessful  X");
        header("Location: http://localhost/myClass/index.php");
        mysqli_close($conn);
        }
        ?>
    </form>
</div>
</div>
</body>

</html>