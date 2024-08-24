<?php 

include("database.php");

include("style.php");

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM userdata WHERE username = '$username'";
$r = mysqli_query($conn,$sql);

if ($r and $r->num_rows > 0) {
    $row = $r->fetch_assoc();
    $verify_pass = password_verify($password,$row["password"]) ;
    if ($verify_pass) {
      $_SESSION["username"] = $username;
        echo '
        <script>
        Swal.fire({
            icon: "success",
            title: "สำเร็จ",
            text: "เข้าสู่ระบบสำเร็จ"
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
            text: "รหัสผ่านไม่ถูกต้อง"
          }).then(() => {
            document.location.href = "../index.php";
          });
        </script>
        
        ';
    }
} else {
    echo '
    <script>
    Swal.fire({
        icon: "error",
        title: "ไม่สำเร็จ",
        text: "ไม่มีผู้ใช้ในระบบ"
      }).then(() => {
        document.location.href = "../index.php";
      });
    </script>
    
    ';
}

?>