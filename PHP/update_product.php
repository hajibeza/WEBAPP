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


$p_name_old = $_POST['p_name_old']; 

$p_name = !empty($_POST['p_name']) ? $_POST['p_name'] : null;
$p_desc = !empty($_POST['p_desc']) ? $_POST['p_desc'] : null;
$p_brand = !empty($_POST['p_brand']) ? $_POST['p_brand'] : null;
$p_model = !empty($_POST['p_model']) ? $_POST['p_model'] : null;
$p_color = !empty($_POST['p_color']) ? $_POST['p_color'] : null;
$p_price = !empty($_POST['p_price']) ? $_POST['p_price'] : null;
$p_stock = !empty($_POST['p_stock']) ? $_POST['p_stock'] : null;

if (!empty($_FILES['img']['name'])) {
    $img_name = basename($_FILES['img']['name']);
    $img_path = "../uploads/" . $img_name;
    move_uploaded_file($_FILES['img']['tmp_name'], $img_path);
} else {
    $img_name = null;
}

$query = "SELECT * FROM product WHERE p_name = '$p_name_old'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$p_name = $p_name ? $p_name : $row['p_name'];
$p_desc = $p_desc ? $p_desc : $row['p_desc'];
$p_brand = $p_brand ? $p_brand : $row['p_brand'];
$p_model = $p_model ? $p_model : $row['p_model'];
$p_color = $p_color ? $p_color : $row['p_color'];
$p_price = $p_price ? $p_price : $row['p_price'];
$p_stock = $p_stock ? $p_stock : $row['p_instock'];
$img_name = $img_name ? $img_name : $row['p_img'];

// อัปเดตข้อมูลในฐานข้อมูล
$update_query = "
    UPDATE product SET 
        p_name = '$p_name', 
        p_desc = '$p_desc', 
        p_brand = '$p_brand', 
        p_model = '$p_model', 
        p_color = '$p_color', 
        p_price = '$p_price', 
        p_instock = '$p_stock', 
        p_img = '$img_name'
    WHERE p_name = '$p_name_old'
";

if (mysqli_query($conn, $update_query)) {
    echo '
    <script>
    Swal.fire({
        icon: "success",
        title: "สำเร็จ",
        text: "อัปเดดข้อมูล"
      }).then(() => {
        document.location.href = "../admin.php";
      });
    </script>
    ';
} else {
    echo "เกิดข้อผิดพลาดในการอัปเดต: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
