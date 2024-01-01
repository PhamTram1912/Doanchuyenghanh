<?php require_once("connect.php"); ?>
<?php
	if (isset($_POST["btn_submit"])) {
		//lấy thông tin từ các form bằng phương thức POST
		$username = $_POST["username"];
		$password = $_POST["password"];
		$tenkh = $_POST["tenkh"]; 
		$email = $_POST["email"];
        $GioiTinh = $_POST["GioiTinh"];
        $Sdt = $_POST["sdt"];
        $Diachi = $_POST["diachi"];
		//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
		if ($username == "" || $password == "" || $tenkh == "" || $email == "" || $GioiTinh == "" || $Sdt == "" || $Diachi == "") {
			echo "<p align='center'>Bạn vui lòng nhập đầy đủ thông tin</p>";
		}else{
			$sql = "INSERT INTO `khachhang` (`tendangnhap`, `matkhau`, `tenkh`, `email_KH`, `gioitinh`, `sdt`, `diachi` ) 
            VALUES ('$username', '$password', '$tenkh', '$email', '$GioiTinh', '$Sdt', '$Diachi')";
			// thực thi câu $sql với biến conn lấy từ file connection.php
			mysqli_query($conn,$sql);
			echo "<p align='center'> Chúc mừng bạn đã đăng ký thành công </p>";
		}
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Kí</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
        justify-content: center;
        align-items: center;
    }

    section {
        background-image: url('images/h13.jpg');
        position: relative;
        width: 100%;
        height: 100vh;
        display: flex;
        opacity: 0.75;
    }

    section .noi-dung {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.85);
    }

    section .noi-dung .form {
        width: 70%;
    }


    section .noi-dung .form h2 {
        color: black;
        font-weight: 500;
        font-size: 1.5em;
        text-transform: uppercase;
        margin-bottom: 20px;
        border-bottom: 4px solid #996515;
        display: inline-block;
        letter-spacing: 1px;

    }

    section .noi-dung .form .input-form {
        margin-bottom: 20px;
    }


    section .noi-dung .form .input-form span {
        font-size: 16px;
        margin-bottom: 5px;
        display: inline-block;
        color: black;
        letter-spacing: 1px;

    }

    section .noi-dung .form .input-form input {
        width: 100%;
        padding: 10px 20px;
        outline: none;
        border: 1px solid #607d8b;
        font-size: 16px;
        letter-spacing: 1px;
        color: black;
        background: transparent;
        border-radius: 30px;

    }

    section .noi-dung .form .input-form input[type="submit"] {
        background: #996515;
        color: black;
        outline: none;
        border: none;
        font-weight: 500;
        cursor: pointer;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.12),
            0 2px 2px rgba(0, 0, 0, 0.12),
            0 4px 4px rgba(0, 0, 0, 0.12),
            0 8px 8px rgba(0, 0, 0, 0.12),
            0 16px 16px rgba(0, 0, 0, 0.12);
    }

    section .noi-dung .form .input-form input[type="submit"]:hover {
        background: #E6BE8A;
    }

    section .noi-dung .form .nho-dang-nhap {
        margin-bottom: 10px;
        color: black;
        font-size: 14px;
    }

    section .noi-dung .form .input-form p {
        color: black;
    }

    section .noi-dung .form .input-form p a {
        color: black;
    }

    section .noi-dung .form h3 {
        color: black;
        text-align: center;
        margin: 80px 0 10px;
        font-weight: 500;
    }

    section .noi-dung .form .icon-dang-nhap {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    section .noi-dung .form .icon-dang-nhap li {
        list-style: none;
        cursor: pointer;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    section .noi-dung .form .icon-dang-nhap li:nth-child(1) {
        color: black;
    }

    section .noi-dung .form .icon-dang-nhap li:nth-child(2) {
        color: black;
    }

    section .noi-dung .form .icon-dang-nhap li:nth-child(3) {
        color: black;
    }

    section .noi-dung .form .icon-dang-nhap li i {
        font-size: 24px;

    }

    @media (max-width: 768px) {
        section .img-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        section .noi-dung {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        section .noi-dung .form {
            width: 100%;
            padding: 40px;
            background: rgba(255 255 255 / 0.9);
            margin: 50px;
        }

        section .noi-dung .form h3 {
            color: #607d8b;
            text-align: center;
            margin: 30px 0 10px;
            font-weight: 500;
        }
    }
    </style>
</head>

<body>
    <section>
        <!--Bắt Đầu Phần Nội Dung-->
        <div class="noi-dung">
            <div class="form">
                <h2>Trang Đăng Kí</h2>
                <form action="dangki.php" method="POST">
                    <div class="input-form">
                        <span>Tên Đăng Nhập</span>
                        <input type="user" id="typeUser" name="username">
                    </div>
                    <div class="input-form">
                        <span>Mật Khẩu</span>
                        <input type="password" id="typePasswordX" name="password">
                    </div>
                    <div class="input-form">
                        <span>Email</span>
                        <input type="text" name="email">
                    </div>
                    <div class="input-form">
                        <span>Họ Tên Người Dùng</span>
                        <input type="text"  name="tenkh">
                    </div>
                    <div class="input-form form-control">
                        <span>Giới tính</span>
                        <select class="col-12" id="GioiTinh" name="GioiTinh">
                            <option selected="">Chọn</option>
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                    </div>
                    <div class="input-form">
                        <span>Số Điện Thoại</span>
                        <input type="text" name="sdt">
                    </div>
                    <div class="input-form">
                        <span>Địa Chỉ</span>
                        <input type="text" name="diachi">
                    </div>
                    <div class="input-form">
                        <p style="text-align: center;">Bạn đã có tài khoản. Hãy <a href="login.php">Đăng nhập</a></p>
                    </div>
                    <div class="input-form">
                        <input type="submit" value="Đăng Kí" name="btn_submit">
                    </div>
                </form>
            </div>
        </div>
        <!--Kết Thúc Phần Nội Dung-->
    </section>
</body>

</html>