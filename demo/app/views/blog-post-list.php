<?php include_once ROOT_URL . '/app/views/header.php' ?>
<?php include_once ROOT_URL . '/app/views/nav-bar.php' ?>
<main class="page blog-post-list">
    <section class="clean-block clean-blog-list dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Blog Post List</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
            </div>
            <div class="block-content">
                <?php
                foreach ($news as $news_item){
                ?>
                <div class="clean-blog-post">
                    <div class="row">
                        <div class="col-lg-5"><img class="rounded img-fluid" src="<?php echo BASE_URL . $news_item['post_image'] ?>"></div>
                        <div class="col-lg-7">
                            <h3><?php echo $news_item['post_title'] ?></h3>
                            <div class="info"><span class="text-muted"><?php echo $news_item['post_date'] .' by '. $news_item['news_author'] ?> </div>
                            <p><?php echo $news_item['post_sub_description'] ?></p>
                            <a href="<?php echo BASE_URL . '/tin-tuc/' . App\Models\TienIch::vn_to_str($news_item['post_title']) . '-' . $news_item['post_id'] ?>" class="btn btn-outline-primary btn-sm" type="button">Read More</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
</main>
<?php include_once ROOT_URL . '/app/views/footer.php' ?>