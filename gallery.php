
<?php
require 'inc/db.php';
$g = $mysqli->query("SELECT * FROM gallery ORDER BY created_at DESC")->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html><html><head><meta charset='utf-8'><title>Gallery</title><link rel='stylesheet' href='assets/style.css'></head>
<body>
<header class="hero"><h1>Gallery</h1><nav><a href="index.php">Menu</a> | <a href="booking.php">Book Table</a></nav></header>
<main class="container">
  <div class="grid">
    <?php foreach($g as $img): ?>
      <div class="card"><img src="<?=htmlspecialchars($img['filename'])?>" alt="Gallery image"></div>
    <?php endforeach; ?>
  </div>
</main>
</body></html>
