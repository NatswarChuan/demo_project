<?php include_once ROOT_URL . '/app/views/header.php' ?>
<?php include_once ROOT_URL . '/app/views/nav-bar.php' ?>

<main class="page catalog-page">
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Catalog Page</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="d-none d-md-block">
                            <div class="filters">
                                <div class="filter-item">
                                    <h3>Categories</h3>
                                    <ul>
                                        <?php
                                        foreach ($categories as $category) {
                                        ?>
                                            <li>
                                                <a href="<?php echo BASE_URL . '/mat-hang/' . App\Models\TienIch::vn_to_str($category['category_name']) . '-' . $category['category_id'] ?>"><?php echo $category['category_name'] ?></a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="filter-item">
                                    <h3>Brands</h3>
                                    <ul>
                                        <?php
                                        foreach ($companies as $company) {
                                        ?>
                                            <li>
                                                <a href="<?php echo BASE_URL . '/cong-ty/' . App\Models\TienIch::vn_to_str($company['company_name']) . '-' . $company['company_id'] ?>"><?php echo $company['company_name'] ?></a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="products">
                            <div class="row g-0">
                                <?php
                                foreach ($products as $product) {
                                ?>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="<?php echo BASE_URL . '/san-pham/' . App\Models\TienIch::vn_to_str($product['post_title']) . '-' . $product['post_id'] ?>"><img class="img-fluid d-block mx-auto" src="<?php echo BASE_URL . $product['post_image'] ?>"></a></div>
                                            <div class="product-name"><a href="<?php echo BASE_URL ?>/san-pham/1"><?php echo $product['post_title'] ?></a></div>
                                            <div class="about">
                                                <div class="rating"><img src="<?php echo BASE_URL ?>/assets/img/star.svg"><img src="<?php echo BASE_URL ?>/assets/img/star.svg"><img src="<?php echo BASE_URL ?>/assets/img/star.svg"><img src="<?php echo BASE_URL ?>/assets/img/star-half-empty.svg"><img src="<?php echo BASE_URL ?>/assets/img/star-empty.svg"></div>
                                                <div class="price">
                                                    <h3>$<?php echo $product['product_price'] ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <nav>
                                <?php
                                echo $pagination;
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once ROOT_URL . '/app/views/footer.php' ?>