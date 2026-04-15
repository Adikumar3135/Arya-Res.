<?php

require "inc/db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['mobile'];
$date = $_POST['date'];
$time = $_POST['time'];
$people = $_POST['people'];
$message = $_POST['message'];

$stmt = $mysqli->prepare(
    "INSERT INTO bookings
(name, phone, persons, booking_date, booking_time)
VALUES (?,?,?,?,?)"
);

$stmt->bind_param(
    "ssiss",
    $name,
    $phone,
    $people,
    $date,
    $time
);

$stmt->execute();

echo "

<h2 style='font-family:Segoe UI'>

Booking Successful ✅

</h2>

<a href='index.php'>

Back Home

</a>

";