<?php
session_start();
?>
<?php require_once("connect.php"); ?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Case Store</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/icons8-p-cute-48.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .slides-navigation a {
        background-color: black;
        opacity: 0.25;
        height: 100px;
        line-height: 120px;
    }

    .slides-navigation a:hover {
        background: #b0b435;
    }

    .offer-box li i {
        margin-right: 15px;
        color: white;
        font-size: 20px;
    }

    .main-top {
        background: black;
        padding: 10px 0px;
    }
    </style>
</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div id="offer-box" class="carouselTicker">
            <ul class="offer-box">
                <li>
                    <i class="fa fa-angellist"></i> Ở đây có ốp xinh hơn người iu cũ của bạn!
                </li>
                <li>
                    <i class="fa fa-angellist"></i> Giảm giá cuối năm - Lên đến 50%
                </li>
                <li>
                    <i class="fa fa-angellist"></i> Giảm 20% khi nhập mã: PhamTramdethuongwaaaa
                </li>
                <li>
                    <i class="fa fa-angellist"></i> Mua đi cho t có tiền ăn Tết
                </li>
                <li>
                    <i class="fa fa-angellist"></i> Tặng ngay 1 iphone 15promax Blue Titanium khi mua hóa đơn trên 50
                    triệu
                </li>
                <li>
                    <i class="fa fa-angellist"></i> Từ 0h đến 23h59 ngày 19/12/2023 là sinh nhật mình chứ khum có sale
                    gì hết nha!
                </li>
                <li>
                    <i class="fa fa-angellist"></i> ốp lưng ở đây 10 điểm khum có nhưng!
                </li>
                <li>
                    <i class="fa fa-angellist"></i> Nhập mã: Linhkhung để được giảm giá siêu khủng!
                </li>
            </ul>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/Case Store.png" class="logo" alt=""
                            width="150cm"></a>
                </div>
                <!-- End Header Navigation -->

                
                <?php
                    $sql = "SELECT * FROM nhomsanpham";
                    $query = mysqli_query($conn, $sql);
                    ?>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Trang chủ</a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Danh Mục</a>
                            <ul class="dropdown-menu">
                                <?php
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <li><a href="page.php?id=<?php echo $data['id'] ?>"><?php echo $data['name']?></a></li>
                                <?php
                            }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="cart.php">Giỏ Hàng</a></li>
                        <?php
                        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
                        <li class="nav-item nav-link" style="font-weight: bold; font-size: large;">Xin chào
                            <?php echo $_SESSION['tendangnhap'];?> |</li>
                        <li class="nav-item"><a class="nav-link " href="dangxuat.php">Đăng Xuất</a>
                            <?php
                        }
                        else{
                        ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Đăng Nhập</a></li>
                        <li class="nav-item"><a class="nav-link" href="dangki.php">Đăng Ký</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->