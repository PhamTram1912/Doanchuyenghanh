<?php require "include/headers.php" ?>
<?php
    $sql = "SELECT * FROM product WHERE id=" .$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_assoc($result);
?>
<div class="about-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-frame text-center"> <img src="upload/<?=$product['hinhAnh']?>" width="75%" />
                </div>
            </div>
            <div class="col-lg-6">
                <h1 class="noo-sh-title-top"><?=$product['name']?></h1>
                <h3 style="font-weight: bold;">Giá: <?= number_format($product['Gia'], 0, ",", ".")?>VND</h3>
                <h1></h1>
                <form action="cart.php?action=add" method="post">
                    Số lượng: <input type="number" value="1" name="quantity[<?php echo $product['id'] ?>]">
                    <h1></h1>
                    <input type="submit" value="Mua Hàng" class="btn btn-success">
                </form>
                <h1></h1>
                <p><?=$product['moTa']?></p>
            </div>

        </div>
    </div>
</div>
<?php require "include/footer.php" ?>