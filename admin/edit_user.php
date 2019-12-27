<?php

if (!isset($_GET['username'])) {
    echo "<script>window.location.href='index.php#Reservation'; alert('Silahkan pilih User yang mau di edit terlebih dahulu !');</script>";
}
$username = trim(strval($_GET['username']));

$sqla = "SELECT * FROM `user` WHERE `username` = '$username'";
$resulta = $connect->query($sqla);

if ($resulta->num_rows > 0) {
    while ($row = $resulta->fetch_assoc()) {
        ?>
        <form action="../backend/process.php?op=edituser" method="post">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Postcode</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="postcode" name="postcode" value="<?php echo $row['postcode']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-10 col-form-label"></label>
                <div class="col-sm-2 md">
                    <a href="index.php?page=manage_user" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </div>
        </form>
    <?php
}
} else {
    echo "<script>window.location.href='index.php?page=manage_user'; alert('Harus Pilih data yang akan di edit!');</script>";
}
?>