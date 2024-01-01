<?php require "include/headers.php" ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Thêm Thông Tin Phòng Ban</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="DanhSachDM.php">Danh Sách Danh Mục</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thêm Thông Tin Danh Mục</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <?php
            if (isset($_POST['submit'])) {
                //lấy thông tin từ các form bằng phương thức POST
                $id = $_POST['id'];
                $name = $_POST['name'];
                if (
                    !empty($id) && !empty($name)
                ) {
                    $sql = "INSERT INTO `nhomsanpham` (`id`, `name`) 
									VALUES ('$id', '$name')";

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
                    <h4 class="text-blue h3 text-center">Thông Tin Danh Mục</h4><br>
                </div>
                <form method="post" action="AddDanhMuc.php">

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Mã Danh Mục</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tên Danh Mục</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="name" name="name">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 text-center">
                        <input class="btn btn-primary" type="submit" value="Thêm Phòng Ban" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require "include/footer.php" ?>F