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
    

    $p_name = $_POST["p_name"];

    $sql = "SELECT * FROM product WHERE p_name = '$p_name'";
    $r = mysqli_query($conn,$sql);
?>

<style>
    body {
        background-color: #FFF0DF;
    }
</style>

<div class="container mt-5" data-aos="zoom-out">
    <div class="row">
        <div class="card p-3">
            <div class="card-title">
                <b class="fs-3 ms-3">รายละเอียด</b>
            </div>
            <?php 
                if ($r and $r->num_rows > 0) {
                    $row = $r->fetch_assoc();
                    echo '
                    <div class="card-body">
                        <div class="row p-3">
                            <div class="col-12 col-md-7 col-lg-6">
                                <img src="uploads/'. $row["p_img"] .'" class="img-fluid">
                            </div>
                            <div class="col-12 col-md-5 col-lg-6 mt-3">
                                <b class="fs-2">'. $row["p_name"] .'</b><br><br>
                                <b class="fs-4">'. $row["p_desc"] .'</b><br><br>
                                <b class="fs-4 mt-2">Brand : '. $row["p_brand"] .'</b><br>
                                <b class="fs-4">Model : '. $row["p_model"] .'</b><br>
                                <b class="fs-4">Color : '. $row["p_color"] .'</b><br>
                                <b class="fs-4">Price : '. $row["p_price"] .'</b><br>
                                <form action = "PHP/basket.php" method = "post">                                
                                    <div class="form-floating mt-3">
                                        <input type = "hidden" name = "p_name" value = "'. $row["p_name"] .'"> 
                                        <input type = "hidden" name = "p_brand" value = "'. $row["p_brand"] .'"> 
                                        <input type = "hidden" name = "p_model" value = "'. $row["p_model"] .'"> 
                                        <input type = "hidden" name = "p_color" value = "'. $row["p_color"] .'"> 
                                        <input type = "hidden" name = "p_price" value = "'. $row["p_price"] .'"> 
                                        <input type = "hidden" name = "p_img" value = "'. $row["p_img"] .'"> 
                                        <input class="form-control" type="number" name="quantity" required placeholder="" style="width: 250px;" min = "1" max = "100" value = "1">
                                        <label class="mb-3">จำนวน</label>
                                    </div>
                                    <button class="btn my-custom-button mt-3">สั่งชื้อสินค้า</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    
                    ';
                }

            ?>

            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-title">
                            <br>
                            <center>
                                <b class="fs-3 p-3 m-3">Review product</b>
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="form-group" id="rating-ability-wrapper">
                                <center>
                                    <label class="control-label">
                                        <span class="field-label-header">Score</span><br>
                                        <span class="field-label-info"></span>
                                    </label>
                                    
                                    <h2 class="bold rating-header">
                                        <span class="selected-rating">0 </span><small>/5</small>
                                    </h2>
                                    <button class="btnrating btn btn-default btn-lg" data-attr="1" id="rating-star-1">
                                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    </button>
                                    <button class="btnrating btn btn-default btn-lg" data-attr="2" id="rating-star-2">
                                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    </button>
                                    <button class="btnrating btn btn-default btn-lg" data-attr="3" id="rating-star-3">
                                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    </button>
                                    <button class="btnrating btn btn-default btn-lg" data-attr="4" id="rating-star-4">
                                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    </button>
                                    <button class="btnrating btn btn-default btn-lg" data-attr="5" id="rating-star-5">
                                        <i class="bi bi-star-fill" aria-hidden="true"></i>
                                    </button>
                                </center>
                                <form action="PHP/review.php" method="POST">
                                    <?php 
                                        $p_name = $_POST["p_name"];

                                        $sql = "SELECT * FROM product WHERE p_name = '$p_name'";
                                        $r = mysqli_query($conn,$sql);
                                        if ($r and $r->num_rows > 0) {
                                            $row = $r->fetch_assoc();
                                            echo '                                    
                                            <input type="hidden" id="p_name" name="p_name" value = "'. $row["p_name"] .'">
                                            <input type="hidden" id="selected_rating" name="selected_rating">
                                            <div class="form-floating mt-3">
                                                <input type="text" class="form-control" name="comment" placeholder="">
                                                <label class="form-label">คอมเม้นต์</label>
                                            </div>
                                            <div class="row d-flex mt-3 m-1">
                                                <button class="btn my-custom-button">ยืนยัน</button>
                                            </div>';
                                            
                                        }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-834 col-lg-8">
                    <b class="fs-3">คอมเม้นต์จากผู้ชื้อ</b>
                    <div class="row">
                        <?php 
                        
                        $sql2 = "SELECT * FROM review WHERE p_name = '$p_name'";
                        $r2 = mysqli_query($conn,$sql2);
                        
                        if ($r2 and $r2->num_rows > 0) {
                            while ($row2 = $r2->fetch_assoc()) {
                                echo '
                                <div class="col-lg-6 col-md-6 col-12 mt-3">
                                    <div class="card">
                                        <div class="card-body p-4">
                                            <b class="fs-3">'. $row2["username"] .'</b><br><br>
                                            <b class="fs-5">'. $row2["comment"] .'</b>
                                            <div class="mt-3">
                                                <center>';
                                                
                                                    for ($i = 0;$i < $row2["star"];$i++) {
                                                        echo '<span class="bi bi-star-fill"></span>';
                                                    }
                                                echo '
                                                </center>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                        }
                        ?>
                    </div>
                </div>
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