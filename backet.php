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
    

    $username = $_SESSION["username"];

    $sql = "SELECT * FROM basket WHERE username = '$username'";
    $r = mysqli_query($conn,$sql);

?>

<div class="container mt-3" data-aos="zoom-in">
    <center>
        <b class="fs-2">ตะกร้าสินค้า</b>
    </center>
    <div class="row mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">รูปสินค้า</th>
                    <th scope="col">ชื่อรุ่น</th>
                    <th scope="col">ชื่อยี่ห้อ</th>
                    <th scope="col">สี</th>
                    <th scope="col">ราคา</th>
                    <th scope="col">จำนวน</th>
                    <th scope="col">แก้ไขข้อมูล</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $all_price = 0;
                $p_quantity = 0;
                if ($r and $r->num_rows > 0) {
                    while ($row = $r->fetch_assoc()) {
                        $all_price += intval($row["p_price"]);
                        $p_name = $row["p_name"];
                        $p_brand = $row["p_brand"];
                        $p_model = $row["p_model"];
                        $p_color = $row["p_color"];
                        $p_price = $row["p_price"];
                        $p_quantity += $row["p_quantity"];
                        echo '
                        <form action="PHP/change_data.php" method="post">
                            <tr>
                                <td><img src="uploads/'. $row["p_img"] .'" width="100px" height="150px"></td>
                                <td>'. $row["p_brand"] .'</td>
                                <td>'. $row["p_model"] .'</td>
                                <td>'. $row["p_color"] .'</td>
                                <td>'. $row["p_price"] .'</td>
                                <td>
                                    <div class="form-floating">
                                        <input type="hidden" name="p_name" value="'. $row["p_name"] .'">
                                        <input class="form-control form-control-sm" type="number" name="quantity" value="'. $row["p_quantity"] .'" required placeholder="" style="width: 100px;" min="0" max="100">
                                        <label class="mb-3 small">จำนวน</label>
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn my-custom-button">แก้ไขข้อมูล</button>
                                </td>
                            </tr>
                        </form>
                        ';
                    }
                }
                
                
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container">
    <b>ราคารวม : <?php echo $all_price * $p_quantity; ?></b><br><br>
    <form action="PHP/buy.php" method="post">
        <?php 
        if  ($r and $r->num_rows > 0) {
        echo ' <input type="hidden" name="p_name" value="'. $p_name .'">';
        echo ' <input type="hidden" name="p_brand" value="'. $p_brand .'">';
        echo ' <input type="hidden" name="p_model" value="'. $p_model .'">';
        echo ' <input type="hidden" name="p_color" value="'. $p_color .'">';
        echo ' <input type="hidden" name="p_price" value="'. $p_price .'">';
        }
        ?>
        <button type="submit" class="btn my-custom-button" data-aos="fade-right">สั่งชื้อสินค้า</button>
    </form>
</div>

<!-- Footer -->
<br>
<div class="container-fluid">
    <footer class="text-center mt-3">
        <b>Love coding, copyright 2024</b>
    </footer>
</div>
<br><br>