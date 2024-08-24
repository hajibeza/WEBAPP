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
$p_name = $_POST['p_name'];
$rating = $_POST['selected_rating'];
$comment = $_POST['comment'];

if (!empty($p_name) && !empty($rating)) {
    $query = "INSERT INTO review (username,p_name, star, comment) VALUES ('$username','$p_name', '$rating', '$comment')";

    if (mysqli_query($conn, $query)) {
        echo '
        <script>
        Swal.fire({
            icon: "success",
            title: "สำเร็จ",
            text: "เพิ่มรีวิวสำเร็จ"
          }).then(() => {
            document.location.href = "../product.php";
          });
        </script>
        ';
    } else {
        echo "เกิดข้อผิดพลาดในการเพิ่มรีวิว: " . mysqli_error($conn);
    }
} else {
    echo '
    <script>
    Swal.fire({
        icon: "error",
        title: "ไม่สำเร็จ",
        text: "กรุณากรอกข้อมูลให้ครบถ้วน"
      }).then(() => {
        document.location.href = "../product.php";
      });
    </script>
    ';
    
}

mysqli_close($conn);
?>
