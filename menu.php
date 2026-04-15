<?php

require "../inc/db.php";

/* filters */

$selected_category = $_GET['category'] ?? "All";
$food_type = $_GET['type'] ?? "All";

/* categories */

$cat_query = $mysqli->query("SELECT DISTINCT category FROM products");

$categories = [];

while ($c = $cat_query->fetch_assoc()) {
    $categories[] = $c['category'];
}

/* dynamic filtering */

$query = "SELECT * FROM products WHERE 1";

$params = [];
$types = "";

if ($selected_category != "All") {
    $query .= " AND category=?";
    $params[] = $selected_category;
    $types .= "s";
}

if ($food_type != "All") {
    $query .= " AND food_type=?";
    $params[] = $food_type;
    $types .= "s";
}

$query .= " ORDER BY created_at DESC";

$stmt = $mysqli->prepare($query);

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $mysqli->query($query);
}

$products = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Arya Restaurant Menu</title>

    <link rel="stylesheet" href="admin/css/menu.css">

</head>

<body>

    <header class="header">

        <h1>🍽 Arya Restaurant Menu</h1>

        <a href="index.php">← Back Home</a>

    </header>


    <!-- FILTER BAR -->

    <section class="category-bar">

        <a href="menu.php?category=All&type=All"
            class="<?= ($selected_category == "All" && $food_type == "All") ? 'active' : '' ?>">
            All
        </a>

        <a href="menu.php?type=Veg" class="<?= ($food_type == "Veg") ? 'active' : '' ?>">
            🟢 Veg
        </a>

        <a href="menu.php?type=Non-Veg" class="<?= ($food_type == "Non-Veg") ? 'active' : '' ?>">
            🔴 Non-Veg
        </a>

        <?php foreach ($categories as $cat): ?>

            <a href="menu.php?category=<?= $cat ?>" class="<?= ($selected_category == $cat) ? 'active' : '' ?>">
                <?= $cat ?>
            </a>

        <?php endforeach; ?>

    </section>



    <!-- PRODUCTS GRID -->

    <section class="menu-container">

        <?php foreach ($products as $p): ?>

            <div class="card">

                <img src="<?= $p['image'] ?>">


                <h2>

                    <?php if ($p['food_type'] == "Veg") { ?>

                        <span class="veg">🟢</span>

                    <?php } else { ?>

                        <span class="nonveg">🔴</span>

                    <?php } ?>

                    <?= htmlspecialchars($p['name']) ?>

                    <?php if ($p['is_out_of_stock']) { ?>

                        <span class="badge">Out of Stock</span>

                    <?php } ?>

                </h2>


                <p>

                    <?= htmlspecialchars($p['description']) ?>

                </p>


                <div class="bottom">

                    <span class="price">

                        ₹<?= number_format($p['price'], 2) ?>

                    </span>


                    <?php if (!$p['is_out_of_stock']): ?>

                        <form method="post" action="cart/add_to_cart.php">

                            <input type="hidden" name="id" value="<?= $p['id'] ?>">

                            <button>Add to Cart</button>

                        </form>

                    <?php else: ?>

                        <button disabled>

                            Unavailable

                        </button>

                    <?php endif; ?>


                </div>

            </div>

        <?php endforeach; ?>

    </section>

</body>

</html>