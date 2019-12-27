<?php

if (!isset($_GET['id_csbook'])) {
    echo "<script>window.location.href='index.php?page=manage_customb'; alert('Silahkan pilih User yang mau di edit terlebih dahulu !');</script>";
}
$id_csbook = trim(strval($_GET['id_csbook']));

$sqla = "SELECT * FROM `custom_books` WHERE `id_csbook` = '$id_csbook'";
$resulta = $connect->query($sqla);

if ($resulta->num_rows > 0) {
    while ($row = $resulta->fetch_assoc()) {
        ?>
        <form action="../backend/process.php?op=editcustomb" method="post">
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ID Book</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_csbook" name="id_csbook" value="<?php echo $row['id_csbook']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Packet</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="packet" name="packet" value="<?php echo $row['packet']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Qty</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="qty" name="qty" value="<?php echo $row['qty']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Notes</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="notes" id="notes" rows="3"><?php echo $row['notes']; ?></textarea>
                </div>
            </div>
            <div class=" form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $row['date']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">In Date</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="indate" name="indate" value="<?php echo $row['in_date']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Out Date</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="outdate" name="outdate" value="<?php echo $row['out_date']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Duration</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $row['duration']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">State</label>
                <div class="col-sm-10">
                    <select name="status" id="status" class="custom-select">
                        <option value="<?php echo $row['status'] ?>"><?php echo $row['status'] ?></option>
                        <option value="Waiting">Waiting</option>
                        <option value="Accept">Accept</option>
                        <option value="Reject">Reject</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-10 col-form-label"></label>
                <div class="col-sm-2 md">
                    <a href="index.php?page=manage_quickb" class="btn btn-danger">Cancel</a>
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