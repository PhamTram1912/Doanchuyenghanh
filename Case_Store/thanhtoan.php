<?php require "include/headers.php" ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6 text-center">
            <h3 style="font-weight: bold;">Thông Tin Đơn Hàng</h3>
            <hr>
        </div>
        <div class="col-sm-6 text-center">
            <h3 style="font-weight: bold;">Thông Tin Khách Hàng</h3>
            <hr>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <?php
            if(!empty($_SESSION["cart"])){
                $products= mysqli_query($conn, "SELECT * FROM `product` WHERE `id` IN (".implode(",", array_keys($_SESSION["cart"])).")");
            }
        ?>
            <?php
            $total=0; 
            while ($row = mysqli_fetch_array($products)) { ?>
            <div class="row">
                <div class="col-sm-6 text-center">
                    <h3><?=$row['name']?></h3>
                    <img src="upload/<?=$row['hinhAnh']?>" alt="" width="100">
                </div>
                <div class="col-sm-2 text-center">
                    <br><br>
                    <h3><?=$_SESSION["cart"][$row['id']]?></h3>
                </div>
                <div class="col-sm-2 text-center">
                    <br><br>
                    <h3><?=$row['Gia'] * $_SESSION["cart"][$row['id']]?></h3>
                </div>

            </div>
            <hr>
            <?php
            $total += $row['Gia'] * $_SESSION["cart"][$row['id']];
            }
            ?>
            <div class="container mt-5">
    <div class="row">
        <div class="col-sm-2 text-center">
            <h3></h3>
        </div>
        <div class="col-sm-4 text-center">
            <a href="index.php">
                <h3></h3>
            </a>
        </div>
        <div class="col-sm-2 text-center">
            <h3 style="font-weight: bold;">Tổng:</h3>
        </div>
        <div class="col-sm-2 text-center">
            <h3 style="font-weight: bold;"><?=$total?></h3>
        </div>
    </div>
</div>
        </div>
        <div class="col-sm-6">
            <?php
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
            <form id="contactForm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" readonly=true id="name" name="name" value="<?php echo $_SESSION['tenkh'];?>">
                            <span id="name_error"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" readonly=true id="email" name="email" value="<?php echo $_SESSION['email_KH'];?>">
                            <span id="email_error"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" readonly=true id="" name="" value="<?php echo $_SESSION['sdt'];?>">
                            <span id="email_error"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" readonly=true id="" name="" value="<?php echo $_SESSION['diachi'];?>">
                            <span id="email_error"></span>
                        </div>
                    </div>
                </div>
            </form>
            <?php 
                        }
                        ?>
                        <div class="col-md-12" style="text-align: center;">
                            <input type="submit" class="btn btn-primary" value="Đặt Hàng">
                        </div>
                    </div>
        </div>
    </div>
</div>
<?php require "include/footer.php" ?>