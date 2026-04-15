
<?php
require 'inc/db.php';
$msg = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $mysqli->real_escape_string($_POST['name']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $date = $_POST['date'];
    $time = $_POST['time'];
    $persons = intval($_POST['persons']);
    $stmt = $mysqli->prepare("INSERT INTO bookings (name, phone, booking_date, booking_time, persons) VALUES (?,?,?,?,?)");
    $stmt->bind_param('ssssi',$name,$phone,$date,$time,$persons);
    $stmt->execute();
    $msg = 'Booking created!';
}
?>
<!doctype html><html><head><meta charset='utf-8'><title>Book Table</title><link rel='stylesheet' href='assets/style.css'></head>
<body>
<header class="hero"><h1>Book a Table</h1><nav><a href="index.php">Menu</a> | <a href="gallery.php">Gallery</a></nav></header>
<main class="container">
  <?php if($msg): ?><div class="offer-card"><?=$msg?></div><?php endif; ?>
  <form method="post" class="card" style="max-width:520px">
    <input type="text" name="name" placeholder="Your name" required><br><br>
    <input type="tel" name="phone" placeholder="Phone" required><br><br>
    <input type="date" name="date" required><br><br>
    <input type="time" name="time" required><br><br>
    <input type="number" name="persons" value="2" min="1"><br><br>
    <button type="submit">Book Table</button>
  </form>
</main>
</body></html>
