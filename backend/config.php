<?php
$db_host = "kost.informatika18.id/";
$db_user = "u5864817_pti18_kost";
$db_pass = "pti_kost";
$db_name = "u5864817_pti18_kost";

$connect = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($connect->error) {
    die("Could connect to database");
}
