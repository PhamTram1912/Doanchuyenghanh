<?php
session_start();
?>
<?php require_once("connect.php"); ?>
<?php
if (isset($_GET["id_delete"])) {
    $sql = "DELETE FROM `product` WHERE `id` = " . $_GET["id_delete"];
    mysqli_query($conn, $sql);
    if($conn->query($sql)==true){
        header("location: DanhSachSP.php");
    }else{
        echo "Lỗi {$sql}" . $conn->error;
    }
}
?>