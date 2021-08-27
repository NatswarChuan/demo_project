<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <form action="<?php echo BASE_URL?>/tim-kiem" method="post" class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div class="container"><a class="navbar-brand logo" href="#">Brand</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="<?php echo BASE_URL ?>/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>/tin-tuc">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>/san-pham">Product</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>/gio-hang">Shopping Cart</a></li>
            </ul>
        </div>
    </div>
</nav>