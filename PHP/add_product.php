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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $p_name = $_POST["p_name"];
    $p_desc = $_POST["p_desc"];
    $p_brand = $_POST["p_brand"];
    $p_model = $_POST["p_model"];
    $p_color = $_POST["p_color"];
    $p_price = $_POST["p_price"];
    $p_stock = $_POST["p_stock"];

    $target_dir = "../uploads/";
    $img_name = basename($_FILES["img"]["name"]);
    $target_file = $target_dir . $img_name;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {

            $sql = "INSERT INTO product (p_name, p_desc, p_brand, p_model, p_color, p_price, p_img, p_instock) VALUES ('$p_name', '$p_desc', '$p_brand', '$p_model', '$p_color', '$p_price', '$img_name', '$p_stock')";
            $r = mysqli_query($conn,$sql);
            if ($r) {
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
                echo '
                <script>
                Swal.fire({
                    icon: "error",
                    title: "ไม่สำเร็จ",
                    text: "เพิ่มสินค้าไม่สำเร็จ"
                  }).then(() => {
                    document.location.href = "../index.php";
                  });
                </script>
                
                ';
            }
        } else {
            echo "ขออภัย, เกิดข้อผิดพลาดในการอัพโหลดไฟล์ของคุณ.";
        }
    }
}
?>
