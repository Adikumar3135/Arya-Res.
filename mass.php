
<?php
require 'inc/db.php';

// fetch offers
$offers_res = $mysqli->query("SELECT * FROM offers WHERE active=1 ORDER BY created_at DESC LIMIT 5");
$offers = [];
while($r = $offers_res->fetch_assoc()) $offers[] = $r;

// fetch products
$products_res = $mysqli->query("SELECT * FROM products ORDER BY created_at DESC");
$products = [];
while($p = $products_res->fetch_assoc()) $products[] = $p;

// fetch gallery
$gallery_res = $mysqli->query("SELECT * FROM gallery ORDER BY created_at DESC LIMIT 8");
$gallery = [];
while($g = $gallery_res->fetch_assoc()) $gallery[] = $g;
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Arya Restaurant</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header class="hero">
  <h1>Arya Restaurant</h1>
  <?php if(count($offers)): ?>
    <div class="offers">
      <?php foreach($offers as $o): ?>
        <div class="offer-card"><strong><?=htmlspecialchars($o['title'])?></strong><p><?=htmlspecialchars($o['content'])?></p></div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  <nav><a href="index.php">Menu</a> | <a href="gallery.php">Gallery</a> | <a href="booking.php">Book Table</a></nav>
</header>

<main class="container">
  <h2>Menu</h2>
  <div class="grid">
    <?php foreach($products as $prod): ?>
      <div class="card <?= $prod['is_out_of_stock'] ? 'out-of-stock' : '' ?>">
        <?php if($prod['image']): ?>
          <img src="<?=htmlspecialchars($prod['image'])?>" alt="<?=htmlspecialchars($prod['name'])?>">
        <?php else: ?>
          <div class="placeholder">No image</div>
        <?php endif; ?>
        <?php if($prod['is_out_of_stock']): ?>
          <div class="oos-label">OUT OF STOCK</div>
        <?php endif; ?>
        <h3><?=htmlspecialchars($prod['name'])?></h3>
        <p><?=htmlspecialchars($prod['description'])?></p>
        <div class="price">₹<?=number_format($prod['price'],2)?></div>
        <form method="post" action="place_order.php">
          <input type="hidden" name="product_id" value="<?=intval($prod['id'])?>">
          <input type="number" name="qty" value="1" min="1" <?= $prod['is_out_of_stock'] ? 'disabled' : '' ?>>
          <input type="text" name="customer_name" placeholder="Your name" required <?= $prod['is_out_of_stock'] ? 'disabled' : '' ?>>
          <input type="tel" name="customer_phone" placeholder="Phone" required <?= $prod['is_out_of_stock'] ? 'disabled' : '' ?>>
          <button type="submit" <?= $prod['is_out_of_stock'] ? 'disabled' : '' ?>>Order</button>
        </form>
      </div>
    <?php endforeach; ?>
  </div>
</main>

<footer class="footer">
  <p>&copy; Arya Restaurant</p>
</footer>
</body>
</html>
