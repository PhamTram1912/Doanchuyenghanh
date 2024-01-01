<?php require "include/headers.php" ?>
<?php
$sql = "SELECT * FROM product";
$query = mysqli_query($conn, $sql);
?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Danh Sách Sản Phẩm</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh Sách Sản Phẩm</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary" href="AddSanPham.php" role="button">
                                Thêm Sản Phẩm
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h3 text-center">Danh Sách Sản Phẩm</h4>
                </div>
                <div class="pb-20">
                    <table class=" table hover multiple-select-row nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>Mã</th>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Giá</th>
                                <th>Xuất xứ</th>

                                <th>Tồn kho</th>
                                <th>Danh mục</th>
                                <th class="datatable-nosort"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = mysqli_fetch_array($query)) {
                                ?>
                                <tr class="text-center">
                                    <td>
                                        <?php echo $data['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo '<img src="../upload/' . $data['hinhAnh'] . '" style="width:120px;height:150px">' ?>
                                    </td>
                                    <td>
                                        <?php echo $data['name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['Gia'] ?>
                                    </td>
                                    <td>
                                        <?php echo $data['xuatXu'] ?>
                                    </td>
                                    <td>
                                        <?php echo $data['tonkho'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        $sql1 = "SELECT * FROM danhmuc";
                                        $query1 = mysqli_query($conn, $sql1);
                                        ?>
                                        <?php
                                        while ($data1 = mysqli_fetch_array($query1)) {
                                            if ($data['danhmuc_id'] == $data1['id'])
                                                echo $data1['name'];
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                
                                                <a class="dropdown-item"
                                                    href="editSP.php?id=<?php echo $data['id']; ?>"><i
                                                        class="dw dw-edit2"></i> Edit</a>
                                                <a class="dropdown-item"
                                                    href="deleteSP.php?id_delete=<?php echo $data['id']; ?>"><i
                                                        class="dw dw-delete-3"></i>Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Simple Datatable End -->
        </div>
    </div>
</div>

<?php require "include/footer.php" ?>