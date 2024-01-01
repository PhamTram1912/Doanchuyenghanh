<?php require "include/headers.php" ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Thêm Thông Tin Sản Phẩm</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="DanhSachSP.php">Danh Sách Sản Phẩm</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm Thông Tin Sản Phẩm</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <?php
            if (isset($_POST['submit'])) {
                //lấy thông tin từ các form bằng phương thức POST
                $name = $_POST['name'];
                $hinhanhpath = basename($_FILES['hinhanh']['name']);
                $target_dir = "../upload/";
                $target_file = $target_dir . $hinhanhpath;
                move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
                $gia = $_POST['Gia'];
                $xuatXu = $_POST['XuatXu'];
                $moTa = $_POST['MoTa'];
                $tonKho = $_POST['TonKho'];
                $danhMuc = $_POST['DanhMuc'];
                
                if (
                    !empty($name) && !empty($gia)
                ) {
                    $sql = "INSERT INTO `product` (`name`, `hinhAnh`, `Gia`, `xuatXu`,`moTa`, `tonkho`,
						`danhmuc_id`) 
									VALUES ('$name','$hinhanhpath','$gia','$xuatXu','$moTa', '$tonKho',
						'$danhMuc')";

                    if ($conn->query($sql) == true) {
                        echo "Lưu dữ liệu thành công";
                    } else {
                        echo "Lỗi {$sql}" . $conn->error;
                    }

                } else {
                    echo "Bạn cần điền đầy đủ thông tin!";
                }
            }
            ?>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h3 text-center">Thông Tin Sản Phẩm</h4><br>
                </div>
                <form method="post" action="AddSanPham.php" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tên Sản Phẩm</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Ảnh</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="file" name="hinhanh">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Giá</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="name" name="Gia">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Xuất Xứ</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="name" name="XuatXu">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Mô tả</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="address" name="MoTa">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tồn Kho</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="name" name="TonKho">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Danh Mục</label>
                        <div class="col-sm-12 col-md-10">
                            <?php
                            $sql = "SELECT * FROM danhmuc";
                            $query = mysqli_query($conn, $sql);
                            ?>
                            <select class="custom-select col-12" name="DanhMuc">
                                <option selected="">Chọn</option>
                                <?php
                                while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                <option value=<?php echo $data['id'] ?>><?php echo $data['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 text-center">
                        <input class="btn btn-primary" type="submit" value="Thêm Sản Phẩm" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php require "include/footer.php" ?>