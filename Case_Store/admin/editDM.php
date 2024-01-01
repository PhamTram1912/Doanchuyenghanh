<?php require "include/headers.php" ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Sửa Thông Tin Danh Mục</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="DanhSachDM.php">Danh Sách Danh Mục</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chỉnh Sửa Thông Tin Danh Mục
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_POST['submit'])) {
                //lấy thông tin từ các form bằng phương thức POST
                $id = $_POST["id"];
                $name = $_POST['name'];
                $sql = "UPDATE `nhomsanpham` SET `name`='$name'
                        WHERE `id`= '$id' ";
                if ($conn->query($sql) == true) {
                    echo "Cập nhật dữ liệu thành công";
                } else {
                    echo "Lỗi {$sql}" . $conn->error;
                }
            }
            $id = -1;
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $sql = "SELECT * FROM `nhomsanpham` WHERE `id` = '" . $id . "'";
            $query = mysqli_query($conn, $sql);
            ?>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <h4 class="text-blue h3 text-center">Sửa Thông Tin Danh Mục</h4><br>
                </div>
                <?php
                while ($data = mysqli_fetch_array($query)) {
                    $id = $data['id'];
                    ?>
                <form method="post" action="editDM.php">

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label ">Mã Danh Mục</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" readonly="true" id="id" name="id" value="<?php echo $id; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Tên Phòng Ban</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="name" name="name"
                                value="<?php echo $data['name']; ?>">
                        </div>
                    </div>
            </div>
            <div class="col-md-6 col-sm-12 text-center">
                <input class="btn btn-primary" type="submit" value="Cập Nhật" name="submit">
            </div>
            </form>
            <?php
                }
                ?>
        </div>
    </div>
</div>
<?php require "include/footer.php" ?>