<?php 
require("header.php");

session_destroy();



?>

<script>
        Swal.fire({
            icon: "success",
            title: "สำเร็จ",
            text: "ออกจากระบบสำเร็จ"
          }).then(() => {
            document.location.href = "../index.php";
          });
        </script>