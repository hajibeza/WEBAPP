<?php

    require('header.php');

    include("PHP/database.php");

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
    

    $sql = "SELECT * FROM product";
    $r = mysqli_query($conn,$sql);

?>

<div class="container mt-3">
    <center>
        <b class="fs-2">สินค้าภายในร้าน</b>
    </center>
    <div class="row mt-5">

            <?php 
            
            if ($r and $r->num_rows > 0 ) {
                while ($row = $r->fetch_assoc()) {
                    echo '
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="card">
                            <img class="card-img-top" src="uploads/'. $row["p_img"] . '" width="300px" height="260px">
                            <div class="card-body">
                                <b class="fs-3">'. $row["p_name"] .'</b><br><br>
                                <b class="fs-5">'. $row["p_desc"] . '</b>
                                
                                <form action = "detail.php" method = "post">
                                    <div class="row d-flex mt-3 m-1">
                                        <input type = "hidden" name = "p_name" value = "'. $row["p_name"] .'">
                                        <button class="btn my-custom-button">รายละเอียด</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }

            ?>
    </div>
</div>

<!-- Footer -->
<br>
<div class="container-fluid">
    <footer class="text-center mt-3">
        <b>Love coding, copyright 2024</b>
    </footer>
</div>
<br><br>