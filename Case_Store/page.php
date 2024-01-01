<?php require "include/headers.php" ?>

<?php

?>
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
                        <a href="index.php"><button data-filter="*">All</button></a>
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
                     $sql = "SELECT * FROM nhomsanpham WHERE id='" .$_GET['id']. "'";
                     $result = mysqli_query($conn, $sql);
                     while ($data = mysqli_fetch_array($result)) {
                        $sql1 = "SELECT * FROM danhmuc WHERE NSP_id='" .$data['id']. "'";
                        $result1 = mysqli_query($conn, $sql1);
                        while ($data1 = mysqli_fetch_array($result1)) {
                            $sql2 = "SELECT * FROM product WHERE danhmuc_id='" .$data1['id']. "'";
                            $result2 = mysqli_query($conn, $sql2);
                            while ($data2 = mysqli_fetch_array($result2)) {
                    ?>
            <div class="col-lg-3 col-md-6 vegetables special-grid best-seller">
                <div class="products-single fix">
                    <div class="box-img-hover">
                        <center>
                            <a href="detail.php?id=<?php echo $data2['id'] ?>"><img src="upload/<?php echo $data2['hinhAnh'] ?>" width="100%" height="250"></a>
                        </center>
                    </div>
                    <form action="cart.php?action=add" method="post">
                        <div class="why-text">
                            <h4><?php echo $data2['name'] ?></h4>
                            <h5><?php echo $data2['Gia'] ?>đ</h5>
                            <a href="detail.php?id=<?php echo $data2['id'] ?>"><i class="fa fa-shopping-basket"
                                style="float: right; font-size:24px; "></i></a> 
                        
                        </div>
                    </form>
                </div>
            </div>
        <?php 
                    }
                }
            }?>
    </div>
    </div>
</div>
<?php require "include/footer.php" ?>