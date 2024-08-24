<?php
include("database.php");

include("style.php");

if (empty($_SESSION["username"])) {
    echo '                
    <script>
    Swal.fire({
        icon: "error",
        title: "ไม่สำเร็จ",
        text: "กรุณาเข้าสู่ระบบก่อน"
      }).then(() => {
        document.location.href = "../login.php";
      });
    </script>';
}

$user_Session = $_SESSION["username"];

$p_name = $_POST['p_name'];
$p_brand = $_POST['p_brand'];
$p_model = $_POST['p_model'];
$p_color = $_POST['p_color'];
$p_price = $_POST['p_price'];

$insert_history = "INSERT INTO history (username, p_name, p_brand, p_model, p_color, p_price) 
                   VALUES ('$user_Session', '$p_name', '$p_brand', '$p_model', '$p_color', '$p_price')";

$r_insert = mysqli_query($conn, $insert_history);

$delete_sql = "DELETE FROM basket WHERE username = '$user_Session' AND p_name = '$p_name'";
$r_delete = mysqli_query($conn,$delete_sql);



if ($r_insert and $r_delete) {
    echo '
    <script>
    Swal.fire({
        icon: "success",
        title: "สำเร็จ",
        text: "การสั่งซื้อสำเร็จ และบันทึกลงประวัติเรียบร้อยแล้ว"
      }).then(() => {
        document.location.href = "../index.php";
      });
    </script>
    ';
} else {
    echo "เกิดข้อผิดพลาดในการบันทึกประวัติ: " . mysqli_error($conn);
}
?>
