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


$username = $_SESSION["username"];
$p_name = $_POST["p_name"];
$p_brand = $_POST["p_brand"];
$p_model = $_POST["p_model"];
$p_color = $_POST["p_color"];
$p_price = $_POST["p_price"];
$p_img = $_POST["p_img"];
$quantity = $_POST["quantity"];

$check_sql = "SELECT COUNT(p_name) AS count FROM basket WHERE p_name = '$p_name'";
$r_check = mysqli_query($conn,$check_sql);
$row = $r_check->fetch_assoc();

if ($row['count'] > 0) {
    // ถ้าผลิตภัณฑ์มีอยู่แล้วในตะกร้า ให้เพิ่มจำนวน
    $update_sql = "UPDATE basket SET p_quantity = p_quantity + $quantity WHERE p_name = '$p_name'";
    $r_update = mysqli_query($conn, $update_sql);

    if ($r_update) {
        echo '
        <script>
        Swal.fire({
            icon: "success",
            title: "สำเร็จ",
            text: "เพิ่มสินค้าสำเร็จ"
          }).then(() => {
            document.location.href = "../index.php";
          });
        </script>
        ';
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตสินค้า: " . mysqli_error($conn);
    }
} else {
    $insert_sql = "INSERT INTO basket (username,p_name, p_brand, p_model, p_color, p_quantity, p_price,p_img) 
    VALUES ('$username','$p_name', '$p_brand', '$p_model', '$p_color', '$quantity', '$p_price','$p_img')";
    $r_insert = mysqli_query($conn, $insert_sql);

    if ($r_insert) {
        echo '
        <script>
        Swal.fire({
            icon: "success",
            title: "สำเร็จ",
            text: "เพิ่มสินค้าสำเร็จ"
          }).then(() => {
            document.location.href = "../index.php";
          });
        </script>
        ';
    }
}

?>