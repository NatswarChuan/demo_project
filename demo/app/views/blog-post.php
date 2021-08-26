<?php include_once ROOT_URL . '/app/views/header.php' ?>
<?php include_once ROOT_URL . '/app/views/nav-bar.php' ?>
<main class="page blog-post">
    <section class="clean-block clean-post dark">
        <div class="container">
            <div class="block-content">
                <div class="post-image" style="background-image:url(&quot;<?php echo BASE_URL ?>/assets/img/scenery/image3.jpg&quot;);"></div>
                <div class="post-body">
                    <h3><?php echo $news['post_title'] ?></h3>
                    <div class="post-info"><span>By <?php echo $news['news_author'] ?></span><span><?php echo $news['post_date'] ?></span></div>
                    <?php echo $news['post_description'] ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once ROOT_URL . '/app/views/footer.php' ?>