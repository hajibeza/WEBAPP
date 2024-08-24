<?php

    require('header.php');



?>

<style>
    body {
        background-color: #FFF0DF;
    }
</style>

<div class="row d-flex justify-content-center mt-5" data-aos="fade-in">
    <div class="card p-4 col-12 col-md-8 col-lg-6 shadow">
        <b class="text-center fs-3">สมัครสมาชิก</b>
        <form action="PHP/register.php" method="post">
            <div class="form-floating mt-3">
                <input class="form-control" type="text" name="username" required placeholder="">
                <label class="mb-3">ชื่อผู้ใช้งาน</label>
            </div>
            <div class="form-floating mt-3">
                <input class="form-control" type="password" name="password" required placeholder="">
                <label class="mb-3">รหัสผ่าน</label>
            </div>
            <div class="form-floating mt-3">
                <input class="form-control" type="password" name="passwordconfirm" required placeholder="">
                <label class="mb-3">ยืนยันรหัสผ่าน</label>
            </div>
            <div class="row d-flex mt-3">
                <button class="btn my-custom-button">สมัครสมาชิก</button>
            </div>
        </form>
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