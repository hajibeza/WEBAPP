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

?>


<div class="container mt-5" data-aos="fade-in">
    <center>
        <b class="fs-2">ระบบหลังบ้าน สำหรับแอดมิน</b>
    </center>
    <div class="row mt-5">
        <div class="col-12 col-md-4 col-lg-4">
            <div class="card p-3">
                <div class="card-title">
                    <b class="fs-3 ms-4 ">เพิ่มสินค้า</b>
                </div>
                <form enctype="multipart/form-data" method="POST" action="PHP/add_product.php">
                    <div class="card-body">
                        <div class="form-floating mt-3">
                            <input class="form-control" type="file" name="img" required placeholder="">
                            <label class="mb-3">รูปภาพสินค้า</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_name" required placeholder="">
                            <label class="mb-3">ชื่อสินค้า</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_desc" required placeholder="">
                            <label class="mb-3">รายละเอียดสินค้า</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_brand" required placeholder="">
                            <label class="mb-3">ยี่ห้อ</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_model" required placeholder="">
                            <label class="mb-3">รุ่น</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_color" required placeholder="">
                            <label class="mb-3">สี</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_price" required placeholder="">
                            <label class="mb-3">ราคา</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_stock" required placeholder="">
                            <label class="mb-3">จำนวน</label>
                        </div>
                        <div class="d-flex row p-3">
                            <button class="btn my-custom-button">ยืนยันข้อมูล</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
            <div class="card p-3">
                <div class="card-title">
                    <b class="fs-3 ms-4 ">แก้ไขสินค้า</b>
                </div>
                <form enctype="multipart/form-data" method="POST" action="PHP/update_product.php">
                    <div class="card-body">
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_name_old" required placeholder="">
                            <label class="mb-3">ชื่อสินค้าที่จะแก้ไข</label>
                        </div>

                        <div class="form-floating mt-3">
                            <input class="form-control" type="file" name="img" placeholder="">
                            <label class="mb-3">รูปภาพสินค้า</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_name" placeholder="">
                            <label class="mb-3">ชื่อสินค้า</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_desc" placeholder="">
                            <label class="mb-3">รายละเอียดสินค้า</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_brand" placeholder="">
                            <label class="mb-3">ยี่ห้อ</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_model" placeholder="">
                            <label class="mb-3">รุ่น</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_color" placeholder="">
                            <label class="mb-3">สี</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_price" placeholder="">
                            <label class="mb-3">ราคา</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_stock" placeholder="">
                            <label class="mb-3">จำนวน</label>
                        </div>
                        <div class="d-flex row p-3">
                            <button class="btn my-custom-button" type="submit">ยืนยันข้อมูล</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
            <div class="card p-3">
                <div class="card-title">
                    <b class="fs-3 ms-4 ">ลบสินค้า</b>
                </div>
                <form enctype="multipart/form-data" method="POST" action="PHP/delete_product.php">
                    <div class="card-body">
                        <div class="form-floating mt-3">
                            <input class="form-control" type="text" name="p_name" required placeholder="">
                            <label class="mb-3">ชื่อสินค้า</label>
                        </div>

                        <div class="d-flex row p-3">
                            <button class="btn my-custom-button" type="submit">ยืนยันข้อมูล</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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