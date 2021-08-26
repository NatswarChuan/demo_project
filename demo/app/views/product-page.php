<?php include_once ROOT_URL . '/app/views/header.php' ?>
<?php include_once ROOT_URL . '/app/views/nav-bar.php' ?>

<main class="page product-page">
    <section class="clean-block clean-product dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Product Page</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
            </div>
            <div class="block-content">
                <div class="product-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="gallery">
                                <div class="sp-wrap">
                                    <?php
                                    $imgs = explode(',', $product['product_img']);
                                    foreach ($imgs as $img) {
                                    ?>
                                        <a href="<?php echo BASE_URL . $img ?>">
                                            <img class="img-fluid d-block mx-auto" src="<?php echo BASE_URL . $img ?>">
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <h3><?php echo $product['post_title'] ?></h3>
                                <div class="rating"><img src="<?php echo BASE_URL ?>/assets/img/star.svg"><img src="<?php echo BASE_URL ?>/assets/img/star.svg"><img src="<?php echo BASE_URL ?>/assets/img/star.svg"><img src="<?php echo BASE_URL ?>/assets/img/star-half-empty.svg"><img src="<?php echo BASE_URL ?>/assets/img/star-empty.svg"></div>
                                <div class="price">
                                    <h3><?php echo $product['product_price'] ?></h3>
                                </div><button class="btn btn-primary" type="button"><i class="icon-basket"></i>Add to Cart</button>
                                <div class="summary">
                                    <p><?php echo $product['post_sub_description'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-info">
                    <div>
                        <ul class="nav nav-tabs" role="tablist" id="myTab">
                            <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" id="description-tab" href="#description">Description</a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active description" role="tabpanel" id="description">
                                <?php echo $product['post_description'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clean-related-items">
                    <h3>Related Products</h3>
                    <div class="items">
                        <div class="row justify-content-center">
                            <?php
                            foreach ($relatedProducts as $related_product) {
                            ?>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="clean-related-item">
                                        <div class="image"><a href="<?php echo BASE_URL .'//san-pham/'. App\Models\TienIch::vn_to_str($related_product['post_title']) . '-' . $related_product['post_id'] ?>"><img class="img-fluid d-block mx-auto" src="<?php echo BASE_URL . $related_product['post_image'] ?>"></a></div>
                                        <div class="related-name"><a href="<?php echo BASE_URL .'//san-pham/'. App\Models\TienIch::vn_to_str($related_product['post_title']) . '-' . $related_product['post_id'] ?>">Lorem Ipsum dolor</a>
                                            <div class="rating"><img src="<?php echo BASE_URL ?>/assets/img/star.svg"><img src="<?php echo BASE_URL ?>/assets/img/star.svg"><img src="<?php echo BASE_URL ?>/assets/img/star.svg"><img src="<?php echo BASE_URL ?>/assets/img/star-half-empty.svg"><img src="<?php echo BASE_URL ?>/assets/img/star-empty.svg"></div>
                                            <h4>$<?php echo $related_product['product_price'] ?></h4>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once ROOT_URL . '/app/views/footer.php' ?>