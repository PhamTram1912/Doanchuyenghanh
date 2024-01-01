<?php
session_start();
?>
<?php
	//Gọi file connection.php ở bài trước
require_once("connect.php");
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
	$username = $_POST["usernameadmin"];
	$password = $_POST["passwordadmin"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
	$username = strip_tags($username);
	$username = addslashes($username);
	$password = strip_tags($password);
	$password = addslashes($password);
	if ($username == "" || $password =="") {
		echo "<p align='center'> Username hoặc Password bạn không được để trống! </p>";
	}else{
		$sql = "SELECT * FROM taikhoan where tendangnhap = '$username' and matkhau = '$password' ";
		$query = mysqli_query($conn,$sql);
		$num_rows = mysqli_num_rows($query);
		if ($num_rows==0) {
			 echo "<p align='center'> Tên đăng nhập hoặc mật khẩu không đúng ! </p>"; 
		}else{
			// Lấy ra thông tin người dùng và lưu vào session
			while ( $data = mysqli_fetch_array($query) ) {
                $_SESSION["logged_in_admin"] = true;
				$_SESSION['tendangnhap'] = $data["tendangnhap"];
				$_SESSION["email"] = $data["email"];
				$_SESSION["hoten"] = $data["hoten"];
				$_SESSION["namsinh"] = $data["namsinh"];
				$_SESSION["gioitinh"] = $data["gioitinh"];
                $_SESSION["sdt"] = $data["sdt"];
				$_SESSION["quyen"] = $data["quyen"];
	    	}
			
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
			header('Location: ./DanhSachSP.php');
		}
	}
}
?>