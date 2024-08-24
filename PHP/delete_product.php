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
$check_admin = "SELECT * FROM userdata WHERE username = '$user_Session' AND role = 'admin'";
$r_ad = mysqli_query($conn,$check_admin);

if ($r_ad and $r_ad->num_rows > 0) {

} else {
    echo '
    <script>
    Swal.fire({
        icon: "error",
        title: "ไม่สำเร็จ",
        text: "ไม่ใช่แอดมิน"
      }).then(() => {
        document.location.href = "../login.php";
      });
    </script>
    ';
    exit();
}

$p_name = $_POST['p_name'];

$query = "SELECT * FROM product WHERE p_name = '$p_name'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $delete_query = "DELETE FROM product WHERE p_name = '$p_name'";
    if (mysqli_query($conn, $delete_query)) {
        echo '
        <script>
        Swal.fire({
            icon: "success",
            title: "สำเร็จ",
            text: "ลบสินค้าสำเร็จ"
          }).then(() => {
            document.location.href = "../admin.php";
          });
        </script>
        ';
    } else {
        echo "เกิดข้อผิดพลาดในการลบสินค้า: " . mysqli_error($conn);
    }
} else {
    echo '
    <script>
    Swal.fire({
        icon: "error",
        title: "ไม่สำเร็จ",
        text: "ไม่พบสินค้าที่ต้องการลบ"
      }).then(() => {
        document.location.href = "../admin.php";
      });
    </script>
    ';
}

mysqli_close($conn);
?>
