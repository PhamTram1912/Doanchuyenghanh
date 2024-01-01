<?php require "include/headers.php" ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Xem Thông Tin Nhân Viên</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="DanhSachNV.php">Danh Sách Nhân Viên</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thông Tin Nhân Viên
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <?php
            $id = -1;
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $sql = "SELECT * FROM `nhanvien` WHERE `MaNV` = " . $id;
            $query = mysqli_query($conn, $sql);
            ?>
            <div class="card-box mb-30">
                <div class="pb-20">
                    <?php
                    while ($data = mysqli_fetch_array($query)) {
                        $id = $data['MaNV'];
                        ?>
                        <table style="border-collapse: separate;border-spacing:  20px;">
                            <tr>
                                <td valign="top" width="28%">
                                    <center>
                                        <img src="upload/<?php echo $data['Image'] ?>"
                                            style="width:120px;height:120px;border-radius: 50%;border-spacing: 30px; ">
                                        <div>
                                            <b>
                                                <?php echo $data['TenNV'] ?>
                                            </b>
                                        </div>
                                    </center>
                                    <br>
                                    <table style="border-collapse: separate;border-spacing: 10px;">
                                        <tr>
                                            <td style="color:gray">Bắt đầu làm việc từ</td>
                                            <td>
                                                <?php echo $data['NgayVaoLam'] ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color:gray">Phòng Ban</td>
                                            <td>
                                                <?php $sql1 = "SELECT * FROM phongban";
                                                $query1 = mysqli_query($conn, $sql1);
                                                while ($data1 = mysqli_fetch_array($query1)) {
                                                    if ($data['PhongBan'] == $data1['MaPB'])
                                                        echo $data1['TenPB'];
                                                } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color:gray">Chức Vụ</td>
                                            <td>
                                                <?php $sql2 = "SELECT * FROM chucvu";
                                                $query2 = mysqli_query($conn, $sql2);
                                                while ($data2 = mysqli_fetch_array($query2)) {
                                                    if ($data['ChucVu'] == $data2['MaCV'])
                                                        echo $data2['TenCV'];
                                                } ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="color:gray">Trạng Thái</td>
                                            <td>
                                                <?php
                                                echo ($data['TrangThai'] == 1) ? '<b style="color:blue;">Đang Làm</b>'
                                                    : '<b style="color:red;">Đã Nghỉ Việc</b>'; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td width="20px"></td>
                                <td valign="top">
                                    <h5 style="color:#57ACBB">Thông Tin</h5>
                                    <hr>
                                    <h6>Thông Tin Cá Nhân</h6><br>
                                    <table>
                                        <tr>
                                            <td width="30%">
                                                <div style="color:gray">Tên</div>
                                                <?php echo $data['TenNV'] ?>
                                            </td>
                                            <td width="20%"></td>
                                            <td>
                                                <div style="color:gray">Giới tính</div>
                                                <?php echo ($data['GioiTinh'] == 1) ? "Nam" : "Nữ" ?>
                                            </td>
                                            <td width="20%"></td>
                                            <td>
                                                <div style="color:gray">Ngày Sinh</div>
                                                <?php echo $data['NgaySinh'] ?>
                                            </td>
                                        </tr>
                                        <tr height="40px"></tr>
                                        <tr>
                                            <td>
                                                <div style="color:gray">Email</div>
                                                <?php echo $data['Email'] ?>
                                            </td>
                                            <td width="5%"></td>
                                            <td>
                                                <div style="color:gray">Số Điện Thoại</div>
                                                <?php echo $data['SĐT'] ?>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <hr>
                                    <h6>Thông Tin Khác</h6><br>
                                    <table>
                                        <tr>
                                            <td width="37%">
                                                <div style="color:gray">Nơi ở hiện tại</div>
                                                <?php echo $data['DiaChi'] ?>
                                            </td>
                                            <td width="5px"></td>
                                            <td valign="top">
                                                <div style="color:gray">Quốc tịch</div>
                                                Việt Nam
                                            </td>
                                        </tr>
                                        <tr height="40px"></tr>
                                        <tr>
                                            <td width="20%">
                                                <div style="color:gray">Số CCCD/CMND</div>
                                                <?php echo $data['CCCD/CMND'] ?>
                                            </td>
                                            <td width="5%"></td>
                                            <td width="25%">
                                                <div style="color:gray">Ngày Cấp</div>
                                                <?php echo $data['NgayCap'] ?>
                                            </td>
                                            <td width="15%"></td>
                                            <td width="20%">
                                                <div style="color:gray">Nơi Cấp</div>
                                                <?php echo $data['NoiCap'] ?>
                                            </td>
                                        </tr>
                                        <tr height="40px"></tr>
                                        <tr>
                                            <td>
                                                <div style="color:gray">Lương Cơ Bản</div>
                                                <?php echo $data['LuongCB'] ?> VNĐ
                                            </td>
                                            <td width="5%"></td>
                                            <td>
                                                <div style="color:gray">Tình Trạng Hôn Nhân</div>
                                                <?php
                                                echo ($data['TinhTrangHonNhan'] == 1) ? "Độc Thân" : "Đã Kết Hôn"; ?>
                                            </td>
                                            <td width="5%"></td>
                                            <td>
                                                <div style="color:gray">Trình Độ Học Vấn</div>
                                                <?php
                                                echo ($data['TinhTrangHonNhan'] == 1) ? "Đại Học" : "THPT"; ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <hr>
                                    <h6>Thông Tin Bảo Hiểm</h6><br>
                                    <div style="color:gray">Mã số BHXH</div>
                                    <?php echo $data['MaBHXH'] ?> 
                                </td>
                            </tr>
                        </table>
                        </td>
                        </tr>
                        </table>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "include/footer.php" ?>