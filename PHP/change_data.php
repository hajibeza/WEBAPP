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
$new_quantity = $_POST['quantity'];

$query = "SELECT p_quantity FROM basket WHERE p_name = '$p_name' AND username = '$user_Session'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $current_quantity = $row['p_quantity'];

    if ($new_quantity == 0) {
        // Delete the row if the new quantity is 0
        $delete_query = "DELETE FROM basket WHERE p_name = '$p_name' AND username = '$user_Session'";
        $r_delete = mysqli_query($conn, $delete_query);

        if ($r_delete) {
            echo '
            <script>
            Swal.fire({
                icon: "success",
                title: "สำเร็จ",
                text: "ลบสินค้าเรียบร้อยแล้ว"
              }).then(() => {
                document.location.href = "../backet.php";
              });
            </script>
            ';
        } else {
            echo "เกิดข้อผิดพลาดในการลบ: " . mysqli_error($conn);
        }
    } else if ($new_quantity != $current_quantity) {
        // Update the quantity if it has changed
        $update_query = "UPDATE basket SET p_quantity = '$new_quantity' WHERE p_name = '$p_name' AND username = '$user_Session'";
        $r_update = mysqli_query($conn, $update_query);

        if ($r_update) {
            echo '
            <script>
            Swal.fire({
                icon: "success",
                title: "สำเร็จ",
                text: "เปลี่ยนแปลงข้อมูลสำเร็จ"
              }).then(() => {
                document.location.href = "../backet.php";
              });
            </script>
            ';
        } else {
            echo "เกิดข้อผิดพลาดในการอัปเดต: " . mysqli_error($conn);
        }
    } else {
        echo '
        <script>
        Swal.fire({
            icon: "error",
            title: "ไม่สำเร็จ",
            text: "ข้อมูลไม่มีการเปลี่ยนแปลง"
          }).then(() => {
            document.location.href = "../backet.php";
          });
        </script>
        ';
    }
} else {
    echo "ไม่พบสินค้าที่ระบุ";
}

?>
