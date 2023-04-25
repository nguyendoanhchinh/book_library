<?php
include "database/connect.php";
$action = $_POST['action'];
if($action=='load'){
    $sql = "SELECT *
    FROM sach INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
    INNER JOIN theloai ON sach.tl_id = theloai.tl_id" ;
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
?>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                <div class="tg-postbook">
                    <figure class="tg-featureimg">
                        <div class="tg-bookimg">
                            <div class="tg-frontcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                            <div class="tg-backcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                        </div>
                        <a class="tg-btnaddtowishlist" href="productdetail.php?id=<?php echo $row['s_id']; ?>">
                            <i class="icon-heart"></i>
                            <span>Chi tiết</span>
                        </a>
                    </figure>
                    <div class="tg-postbookcontent">
                        <ul class="tg-bookscategories">
                            <li><a href="#"><?php echo $row['tl_ten']; ?></a></li>
                        </ul>
                        <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                        <div class="tg-booktitle" style="height:70px;">
                            <h3><a href="productdetail.php?id=<?php echo $row['s_id']; ?>"><?php echo $row['s_ten']; ?></a></h3>
                        </div>
                        <span class="tg-bookwriter" style="margin-top: 38px;">Tác giả: <a href="#"><?php echo $row['tg_ten']; ?></a></span>
                        <span class="tg-stars"><span></span></span>
                        <span class="tg-bookprice">
                            <ins><?php echo number_format($row['s_gia']);  ?>vnđ</ins>
                            <del><?php echo number_format($row['s_giamgia']);  ?>%</del>
                        </span>
                        <a class="tg-btn tg-btnstyletwo" href="#">
                            <i class="fa fa-shopping-basket"></i>
                            <em>Thêm giỏ hàng</em>
                        </a>
                    </div>
                </div>
            </div>

<?php }
    }

}
if ($action == 'timkiem') {
    $load = $_POST['load'];
    $sql = "SELECT *
    FROM sach INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
    INNER JOIN theloai ON sach.tl_id = theloai.tl_id where s_ten like concat('%$load%')  ";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
?>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                <div class="tg-postbook">
                    <figure class="tg-featureimg">
                        <div class="tg-bookimg">
                            <div class="tg-frontcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                            <div class="tg-backcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                        </div>
                        <a class="tg-btnaddtowishlist" href="productdetail.php?id=<?php echo $row['s_id']; ?>">
                            <i class="icon-heart"></i>
                            <span>Chi tiết</span>
                        </a>
                    </figure>
                    <div class="tg-postbookcontent">
                        <ul class="tg-bookscategories">
                            <li><a href="#"><?php echo $row['tl_ten']; ?></a></li>
                        </ul>
                        <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                        <div class="tg-booktitle" style="height:70px;">
                            <h3><a href="productdetail.php?id=<?php echo $row['s_id']; ?>"><?php echo $row['s_ten']; ?></a></h3>
                        </div>
                        <span class="tg-bookwriter" style="margin-top: 38px;">Tác giả: <a href="#"><?php echo $row['tg_ten']; ?></a></span>
                        <span class="tg-stars"><span></span></span>
                        <span class="tg-bookprice">
                            <ins><?php echo number_format($row['s_gia']);  ?>vnđ</ins>
                            <del><?php echo number_format($row['s_giamgia']);  ?>%</del>
                        </span>
                        <a class="tg-btn tg-btnstyletwo" href="#">
                            <i class="fa fa-shopping-basket"></i>
                            <em>Thêm giỏ hàng</em>
                        </a>
                    </div>
                </div>
            </div>

<?php }
    }else{?>
        <h2 style="padding-top: 10px;"><?php echo "Không tìm thấy sản phẩm tìm kiếm !"   ?></h2>
  <?php  }
}
if($action =='chitiettheloai'){
    $id=$_POST['id'];
 
    $sql = "SELECT sach.*, tacgia.tg_ten, theloai.tl_ten FROM sach INNER JOIN tacgia ON sach.tg_id = tacgia.tg_id INNER JOIN 
        theloai ON sach.tl_id = theloai.tl_id WHERE sach.tl_id = '$id'";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) { ?>
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                <div class="tg-postbook">
                    <figure class="tg-featureimg">
                        <div class="tg-bookimg">
                            <div class="tg-frontcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                            <div class="tg-backcover"><img src="images/Image/VanHoc/<?php echo $row['anh']; ?>" alt="image description"></div>
                        </div>
                        <a class="tg-btnaddtowishlist" href="productdetail.php?id=<?php echo $row['s_id']; ?>">
                            <i class="icon-heart"></i>
                            <span>Chi tiết</span>
                        </a>
                    </figure>
                    <div class="tg-postbookcontent">
                        <ul class="tg-bookscategories">
                            <li><a href="#"><?php echo $row['tl_ten']; ?></a></li>
                        </ul>
                        <div class="tg-themetagbox"><span class="tg-themetag">sale</span></div>
                        <div class="tg-booktitle" style="height:70px;">
                            <h3><a href="productdetail.php?id=<?php echo $row['s_id']; ?>"><?php echo $row['s_ten']; ?></a></h3>
                        </div>
                        <span class="tg-bookwriter" style="margin-top: 38px;">Tác giả: <a href="#"><?php echo $row['tg_ten']; ?></a></span>
                        <span class="tg-stars"><span></span></span>
                        <span class="tg-bookprice">
                            <ins><?php echo number_format($row['s_gia']);  ?>vnđ</ins>
                            <del><?php echo number_format($row['s_giamgia']);  ?>%</del>
                        </span>
                        <a class="tg-btn tg-btnstyletwo" href="#">
                            <i class="fa fa-shopping-basket"></i>
                            <em>Thêm giỏ hàng</em>
                        </a>
                    </div>
                </div>
            </div>

<?php }
    }
}