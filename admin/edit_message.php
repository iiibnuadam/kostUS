<?php

if (!isset($_GET['id_message'])) {
    echo "<script>window.location.href='index.php?page=manage_message'; alert('Silahkan pilih User yang mau di edit terlebih dahulu !');</script>";
}
$id_message = trim(strval($_GET['id_message']));

$sqla = "SELECT * FROM `message` WHERE `id_message` = '$id_message'";
$resulta = $connect->query($sqla);

if ($resulta->num_rows > 0) {
    while ($row = $resulta->fetch_assoc()) {
        ?>
        <form action="../backend/process.php?op=editmessage" method="post">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ID Message</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_message" name="id_message" value="<?php echo $row['id_message']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Subject</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $row['subject']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Notes</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="notes" id="notes" rows="3"><?php echo $row['subText']; ?></textarea>
                </div>
            </div>
            <div class=" form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['date']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-10 col-form-label"></label>
                <div class="col-sm-2 md">
                    <a href="index.php?page=manage_message" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </div>
        </form>
    <?php
}
} else {
    echo "<script>window.location.href='index.php?page=manage_quickb'; alert('Harus Pilih data yang akan di edit!');</script>";
}
?>