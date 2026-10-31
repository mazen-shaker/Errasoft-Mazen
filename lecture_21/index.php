<?php

//require_once './clear-session.php';
require_once './Product.php';
require_once './Cart.php';

$products = [
    'product_1'=> new product(1,200,"prod1","this is product 1"),
    'product_2'=> new product(2,300,"prod2","this is product 2"),
    'product_3'=> new product(3,500,"prod3","this is product 3"),
    'product_4'=> new product(4,318,"prod4","this is product 4"),
];

$cart = new Cart();

if (isset($_GET['id'])) {
    foreach($products as $product){
        if($product->id == $_GET['id']){
            $cart->addToCart($product);
            header('Location: index.php');
        }
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>simple store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">mystore</a>

            <div class="navbar-nav ms-auto">

                <button class="nav-link" data-bs-toggle="offcanvas"
                    data-bs-target="#cartmenu">
                    cart (
                    <span id="cart-count">
                        <?= array_sum(array_map(
                            fn($item) => $item->count,
                            $cart->items
                        )) ?>
                    </span>
                    )
                </button>
            </div>
        </div>
    </nav>

    <!-- home -->
    <main class="container py-5">
        <div class="row justify-content-center g-4">

            <?php foreach ($products as $product): ?>

                <div class="col-md-4">

                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $product->name ?>
                            </h5>

                            <p class="text-muted">
                                <?= $product->description ?>
                            </p>

                            <p class="fw-bold">
                                $<?= $product->price ?>
                            </p>

                            <a href="?id=<?= $product->id ?>" class="btn btn-dark w-100 add-to-cart">
                                add to cart
                            </a>
                        </div>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>
    </main>

    <!-- cart menu -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="cartmenu">

        <div class="offcanvas-header">
            <h5 class="offcanvas-title">shopping cart</h5>
            <button type="button" class="btn-close"
                data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">

            <div id="cart-items">

                <?php if (empty($cart->items)): ?>

                    <p class="text-muted text-center">your cart is empty.</p>

                <?php else: ?>

                    <?php foreach ($cart->items as $item): ?>

                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h6><?= $item->product->name ?></h6>

                                <small class="text-muted">
                                    $<?= $item->product->price ?> x <?= $item->count ?>
                                </small>
                            </div>

                            <strong>
                                $<?= $item->product->price * $item->count ?>
                            </strong>
                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>
                <a href="clear-session.php" class="btn btn-danger w-100 mt-3">
                Clear Cart
                </a>
            </div>

            <hr>

            <div class="d-flex justify-content-between">
                <strong>total:</strong>
                <strong id="cart-total">
                    $<?= $cart->total ?>
                </strong>
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
