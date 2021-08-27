<?php include_once ROOT_URL . '/app/views/header.php' ?>
<?php include_once ROOT_URL . '/app/views/nav-bar.php' ?>
<main class="page shopping-cart-page">
    <section class="clean-block clean-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Shopping Cart</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
            </div>
            <div class="content">
                <div class="row g-0">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                            <?php
                            foreach ($cart as $product) {
                            ?>
                                <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="<?php echo BASE_URL . $product['post_image'] ?>"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="<?php echo BASE_URL . '/san-pham/' . App\Models\TienIch::vn_to_str($product['post_title']) . '-' . $product['post_id'] ?>"><?php echo $product['post_title'] ?></a>
                                            <div class="product-specs">
                                                <div><span><?php echo $product['post_sub_description'] ?></span></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity">
                                            <label class="form-label d-none d-md-block" for="quantity">Quantity</label>
                                            <input type="number" id="number" class="form-control quantity-input" value="1" onchange="getPrice(this.value,<?php echo $product['post_id'] ?>,<?php echo $product['product_price'] ?>)">
                                        </div>
                                        <input type="hidden" name="prices" id="prices<?php echo $product['post_id'] ?>" value="<?php echo $product['product_price'] ?>">
                                        <div class="col-6 col-md-2 price" name="price" id="price<?php echo $product['post_id'] ?>"><span>$<?php echo $product['product_price'] ?></span></div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3>Summary</h3>
                            <h4>
                                <span class="text">Total</span>
                                <span class="price" id="total">$<?php echo $total ?></span>
                            </h4>
                            <form action="<?php echo BASE_URL . '/check-out' ?>" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                                <?php
                                foreach ($cart as $item) {
                                ?>
                                    <input type="hidden" name="quantityPrice<?php echo $item['post_id'] ?>" id="quantityPrice<?php echo $item['post_id'] ?>" value="<?php echo $item['product_id'] . '-1' ?>" />
                                <?php
                                }
                                ?>
                                <button type="submit" class="btn btn-primary btn-lg d-block w-100" type="button">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once ROOT_URL . '/app/views/footer.php' ?>

<script>
    
</script>