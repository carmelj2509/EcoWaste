<?php

include 'connect.php';

$toAdd = round($_POST["forecast"] + 0);

$veg_id = $_POST["veg_id"];

$date = date_parse($_POST["selected_month"]);
$month_no = $date['month'];

$sql = "UPDATE veg_per_month SET fulfilled=fulfilled + ".$toAdd." WHERE veg_id=".$veg_id." AND month_no=".$month_no;
mysqli_query($conn, $sql);

header('Location: index.php');
?>