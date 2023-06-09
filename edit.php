<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
    <?php
    $server = "localhost";
    $username = "root";
    $password = "Admin@123";
    $conn = mysqli_connect($server, $username, $password, "crud", 3307) or
        die('Error: ' . mysqli_connect_error());
    $stu_id = $_GET['id'];
    $sql = "SELECT * from student where sid = {$stu_id}";
    $result = mysqli_query($conn, $sql) or die("Querry Unsuccessful  X");
    if (mysqli_num_rows($result) > 0) {
        while ($value = mysqli_fetch_assoc($result)) {
    ?>
            <form class="post-form" action="updatedata.php" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="hidden" name="sid" value="<?php echo $value['sid']; ?>" />
                    <input type="text" name="sname" value="<?php echo $value['sname']; ?>" />
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="saddress" value="<?php echo $value['saddress']; ?>" />
                </div>
                <div class="form-group">
                    <label>Class</label>
                    <?php
                    $server = "localhost";
                    $username = "root";
                    $password = "Admin@123";
                    $conn1 = mysqli_connect($server, $username, $password, "crud", 3307) or
                        die('Error: ' . mysqli_connect_error());
                    $stu_id = $_GET['id'];
                    $sql1 = "SELECT cid, cname from studentclass";
                    $result1 = mysqli_query($conn1, $sql1) or die("Querry Unsuccessful  X");
                    if (mysqli_num_rows($result1) > 0) {
                        echo '<select name="sclass">
                   <option value="" disabled>Select Class</option>
                   ';
                        while ($options = mysqli_fetch_assoc($result1)) {
                            if ($value['sclass'] == $options['cid']) {
                                $selected = "selected";
                                echo "<option {$selected} value='{$options['cid']}'>{$options['cname']}</option>";
                            }
                             $selected = "";
                            echo "<option {$selected} value='{$options['cid']}'>{$options['cname']}</option>";
                        }
                        echo "</select>";
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="sphone" value="<?php echo $value['sphone']; ?>" />
                </div>
                <input class="submit" type="submit" value="Update" />
            </form>
    <?php
        }
    } ?>
</div>
</div>
</body>

</html>