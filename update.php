<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>
    <?php
    if (isset($_POST['showbtn'])) {
        $stu_id = $_POST['sid'];
        $server = "localhost";
        $username = "root";
        $password = "Admin@123";
        $conn = mysqli_connect($server, $username, $password, "crud", 3307) or
            die('Error: ' . mysqli_connect_error());
        $sql = "SELECT * from student JOIN studentclass on student.sclass = studentclass.cid where student.sid = {$stu_id}";
        $result = mysqli_query($conn, $sql) or die("Querry Unsuccessful  X");
        if (mysqli_num_rows($result) > 0) {
    ?>
            <form class="post-form" action="updatedata.php" method="post">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="hidden" name="sid" value="<?php echo $row['sid']; ?>" />
                        <input type="text" name="sname" value="<?php echo $row['sname']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="saddress" value="<?php echo $row['saddress']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Class</label>

                        <?php
                        $server = "localhost";
                        $username = "root";
                        $password = "Admin@123";
                        $sql1 = "SELECT * from studentclass";
                        $result1 = mysqli_query($conn, $sql1) or die("Querry Unsuccessful  X");
                        if (mysqli_num_rows($result1) > 0) {
                            echo ' <select name="sclass">';
                            while ($options = mysqli_fetch_assoc($result1)) {
                                if ($row['sclass'] == $options['cid']) {
                                    $selected = 'selected';
                                    echo "<option {$selected} value='{$options['cid']}'>{$options['cname']}</option>";
                                } else {
                                    echo "<option value='{$options['cid']}'>{$options['cname']}</option>";
                                }
                            }
                            echo '</select>';
                        }
                        ?>

                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="sphone" value=<?php echo $row['sphone']; ?> />
                    </div>


                    <input class="submit" type="submit" value="Update" />
                <?php } ?>
            </form>
    <?php }
    } ?>
</div>
</div>
</body>

</html>