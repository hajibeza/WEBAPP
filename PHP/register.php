<?php

include("database.php");

include("style.php");


$username = $_POST["username"];
$password = $_POST["password"];
$password2 = $_POST["passwordconfirm"];

$check_sql = "SELECT * FROM userdata WHERE username = '$username'";
$r_check = mysqli_query($conn,$check_sql);

if ($r_check and $r_check->num_rows > 0) {
    echo '
    <script>
    Swal.fire({
        icon: "error",
        title: "ไม่สำเร็จ",
        text: "มีผู้ใช้ในระบบ"
      }).then(() => {
        document.location.href = "../index.php";
      });
    </script>
    ';
} else {
    if ($password == $password2) {
        $hased_pass = password_hash($password,PASSWORD_DEFAULT);
        $insert_sql = "INSERT INTO userdata (username,password,role) VALUES ('$username','$hased_pass','user')";
        $r_insert = mysqli_query($conn,$insert_sql);

        if ($r_insert) {
            $_SESSION["username"] = $username;
            echo '
            <script>
            Swal.fire({
                icon: "success",
                title: "สำเร็จ",
                text: "สมัครสมาชิกสำเร็จ"
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
            text: "รหัสผ่านไม่ตรง"
          }).then(() => {
            document.location.href = "../index.php";
          });
        </script>
        ';
    }
}

?>