<?php require "include/headers.php" ?>

<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        <li class="text-center">
            <img src="images/h2.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Case Store</strong></h1>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="images/h14.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Case Store</strong></h1>
                    </div>
                </div>
            </div>
        </li>
        <li class="text-center">
            <img src="images/h12.jpg" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="m-b-20"><strong>Welcome To <br> Case Store</strong></h1>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="slides-navigation">
        <a href="#" class="next"><i class="fa fa-chevron-circle-right"></i></a>
        <a href="#" class="prev"><i class="fa fa-chevron-circle-left"></i></a>
    </div>
</div>
<!-- End Slider -->

<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Danh Mục</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <?php
                    $sql = "SELECT * FROM nhomsanpham";
                    $query = mysqli_query($conn, $sql);
                    ?>
                        <button class="active" data-filter="*">All</button>
                        <?php
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <a href="page.php?id=<?php echo $data['id'] ?>"><button><?php echo $data['name']?></button></a>
                        <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row special-list">
            <?php
                $sql = "SELECT * FROM product";
                $query = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($query)) {
            ?>
            <div class="col-lg-3 col-md-6 vegetables special-grid best-seller">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <center>
                            <a href="detail.php?id=<?php echo $data['id'] ?>"><img src="upload/<?php echo $data['hinhAnh'] ?>" width="100%" height="250"></a>
                        </center>
                    </div>
                    <form action="cart.php?action=add" method="post">
                        <div class="why-text">
                            <h4><?php echo $data['name'] ?></h4>
                            <h5><?php echo $data['Gia'] ?>đ</h5>
                            <a href="detail.php?id=<?php echo $data['id'] ?>"><i class="fa fa-shopping-basket"
                                style="float: right; font-size:24px; "></i></a> 
                        
                        </div>
                    </form>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<!-- End Products  -->
<?php require "include/footer.php" ?>