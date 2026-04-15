
<?php
require 'inc/db.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Location: index.php');
    exit;
}

$product_id = intval($_POST['product_id'] ?? 0);
$qty = max(1, intval($_POST['qty'] ?? 1));
$name = $mysqli->real_escape_string($_POST['customer_name'] ?? '');
$phone = $mysqli->real_escape_string($_POST['customer_phone'] ?? '');

$p = $mysqli->query("SELECT * FROM products WHERE id={$product_id}")->fetch_assoc();
if(!$p){
    die('Product not found');
}
if($p['is_out_of_stock']){
    die('Product is out of stock');
}

$total = $p['price'] * $qty;
$items = json_encode([['id'=>$p['id'],'name'=>$p['name'],'qty'=>$qty,'price'=>$p['price']]]);

$stmt = $mysqli->prepare("INSERT INTO orders (customer_name, customer_phone, items, total) VALUES (?, ?, ?, ?)");
$stmt->bind_param('sssd', $name, $phone, $items, $total);
$stmt->execute();

header('Location: index.php?ordered=1');
