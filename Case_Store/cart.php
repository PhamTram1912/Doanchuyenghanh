<?php require "include/headers.php" ?>

<?php
if(!isset($_SESSION["cart"])){
    $_SESSION["cart"]=array();
}
if(isset($_GET['action'])){
    function update_cart(){
        foreach ($_POST['quantity'] as $id => $quantity) {
            if($quantity == 0 ){
                unset($_SESSION["cart"][$id]);
            } else {
                    $_SESSION["cart"][$id] = $quantity;
                }
            }
        }

    switch($_GET['action']){
        case "add":
            update_cart();
            break;
        case "delete":
            if(isset($_GET['id'])){
                unset($_SESSION["cart"][$_GET['id']]);
            }
            break;
        case "submit":
            if(isset($_POST['update_click'])){
                update_cart();
            } 
    }
}
if(!empty($_SESSION["cart"])){
    $products= mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (".implode(",", array_keys($_SESSION["cart"])).")");
}
else
{
    echo "<p align='center'> Giỏ hàng trống! </p>";
    exit;
}
?>

<form action="cart.php?action=submit" method="POST">
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-2 text-center">
                <h3 style="font-weight: bold;">STT</h3>
            </div>
            <div class="col-sm-4 text-center">
                <h3 style="font-weight: bold;">Sản Phẩm</h3>
            </div>
            <div class="col-sm-2 text-center">
                <h3 style="font-weight: bold;">Số Lượng</h3>
            </div>
            <div class="col-sm-2 text-center">
                <h3 style="font-weight: bold;">Giá Tiền</h3>
            </div>
            <div class="col-sm-2 text-center">
                <h3 style="font-weight: bold;">Thao Tác</h3>
            </div>
            <hr>
        </div>
    </div>
    <hr>
    <?php  
    $total=0;   
$num=1;
while ($row = mysqli_fetch_array($products)) {
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-2 text-center">
                <br><br>
                <h3><?=$num?></h3>
            </div>
            <div class="col-sm-4 text-center">
                <h3 style="font-weight: bold;"><?=$row['name']++?></h3>
                <img src="upload/<?=$row['hinhAnh']?>" width="150">
            </div>
            <div class="col-sm-2 text-center">
                <br><br>
                <h3><input type="text" value="<?=$_SESSION["cart"][$row['id']]?>" name="quantity[<?=$row['id']?>]"
                        size="3"></h3>
            </div>
            <div class="col-sm-2 text-center">
                <br><br>
                <h3><?=$row['Gia'] * $_SESSION["cart"][$row['id']]?></h3>
            </div>
            <div class="col-sm-2 text-center">
                <br><br>
                <h3 class="btn btn-danger"><a href="cart.php?action=delete&id=<?=$row['id']?>">Xóa</a></h3>
                <input class="btn btn-success" type="submit" name="update_click" value="Cập nhật">
            </div>
            <hr>
        </div>
    </div>
    <?php
    $total += $row['Gia'] * $_SESSION["cart"][$row['id']];
$num++;
}
?>
    <hr>
</form>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-2 text-center">
            <h3></h3>
        </div>
        <div class="col-sm-4 text-center">
            <a href="index.php">
                <h3 style="font-weight: bold;">Tiếp tục mua hàng</h3>
            </a>
        </div>
        <div class="col-sm-2 text-center">
            <h3 style="font-weight: bold;">Tổng tiền</h3>
        </div>
        <div class="col-sm-2 text-center">
            <h3 style="font-weight: bold;"><?=$total?></h3>
        </div>
        <div class="col-sm-2 text-center">
            <a href="thanhtoan.php"><button class="btn btn-primary">Thanh Toán</button></a>
        </div>
    </div>
</div>
<?php require "include/footer.php" ?>