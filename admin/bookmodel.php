<?php
include "../database/connect.php";
$action = $_POST['action'];

//

// sua
if($action=='sua'){
    $id=$_POST['id'];
    $tensach=$_POST['s_tensach'];
    $giasach=$_POST['s_giasach'];
    $sachgiamgia=$_POST['s_sachgiamgia'];
    $nxb=$_POST['s_nxb'];
    $namxuatban=$_POST['s_namxuatban'];
    $sotrang=$_POST['s_sotrang'];
    $soluong=$_POST['s_soluong'];
    $ngonngu=$_POST['s_ngonngu'];
    $tacgia=$_POST['s_tacgia'];
    $theloai=$_POST['s_theloai'];
    $sql="UPDATE `sach` SET `s_ten`='$tensach',`s_gia`='$giasach',`s_giamgia`=' $sachgiamgia',`nxb`=' $nxb',
    `namxuatban`=' $namxuatban',`sotrang`=' $sotrang',`soluong`='$soluong',`ngonngu`='$ngonngu',`tg_id`=' $tacgia'
    ,`tl_id`=' $theloai' WHERE `s_id`='$id'";
    $query=mysqli_query($conn,$sql);

}

// hiển thị
if ($action == 'loadData') {
    $load = $_POST['load'];
    $sql = "SELECT * from  sach INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
    INNER JOIN theloai ON sach.tl_id = theloai.tl_id   where s_ten like CONCAT('%$load%') ";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {

?>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <img src="image/VanHoc/<?php echo $row['anh']; ?>" alt="" style="width: 55px; height: 55px" />
                    <div class="ms-3">
                        <p class="fw-bold mb-1"><?php echo $row['s_ten'];  ?></p>

                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal mb-1"><?php echo number_format($row['s_gia']); ?></p>

            </td>
            <td><?php echo $row['nxb']; ?></td>
            <td><?php echo $row['namxuatban']; ?></td>
            <td><?php echo $row['s_giamgia']; ?></td>
            <td><?php echo $row['sotrang']; ?></td>
            <td><?php echo $row['soluong']; ?></td>
            <td><?php echo $row['ngonngu']; ?></td>
            <td><?php echo $row['tg_ten']; ?></td>
            <td><?php echo $row['tl_ten']; ?></td>
            <td>
                <button type="button" id="display" class="btn btn-warning display" id_update="<?php echo $row['s_id']; ?>" s_giamgia="<?php echo $row['s_giamgia']; ?>" s_gia="<?php echo number_format($row['s_gia']); ?>" nxb="<?php echo $row['nxb']; ?>" namxuatban="<?php echo $row['namxuatban']; ?>" sotrang="<?php echo $row['sotrang'] ?>" soluong="<?php echo $row['soluong']; ?>" ngonngu="<?php echo $row['ngonngu']; ?>" data-bs-toggle="modal" data-bs-target="#displayModal">
                    Sửa
                </button>
                <button type="button" class="btn btn-danger" id="delete" id_delete="<?php echo $row['s_id']; ?>">
                    Xóa
                </button>
            </td>
        <?php  }
        ?>
        <?php }
    if ($action == 'search') {
        $s_ten = $_POST['s_ten'];
        $sql = "SELECT * from  sach where s_ten like CONCAT('%$s_ten%') or nxb like CONCAT('%$s_ten%') limit 15";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) { ?>

                <li><a class="dropdown-item" href="#" id="list_search" value="<?php echo $row['s_id'] ?>"><?php echo $row['s_ten'] ?></a></li>
            <?php
            }
        } else { ?>
            <span style="padding-top: 10px;"><?php echo "Không tìm thấy" ?></span>

        <?php
        }
        ?>
        <?php
    }
    if ($action == 'list_book') {
        $id = $_POST['id'];
        $sql = "SELECT * from  sach INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
    INNER JOIN theloai ON sach.tl_id = theloai.tl_id   where s_id=$id ";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($query)) {

        ?>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <img src="image/VanHoc/<?php echo $row['anh']; ?>" alt="" style="width: 55px; height: 55px" />
                    <div class="ms-3">
                        <p class="fw-bold mb-1"><?php echo $row['s_ten']; ?></p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-normal mb-1"><?php echo number_format($row['s_gia']); ?></p>

            </td>
            <td><?php echo $row['nxb']; ?></td>
            <td><?php echo $row['namxuatban']; ?></td>
            <td><?php echo $row['s_giamgia']; ?></td>
            <td><?php echo $row['sotrang']; ?></td>
            <td><?php echo $row['soluong']; ?></td>
            <td><?php echo $row['ngonngu']; ?></td>
            <td><?php echo $row['tg_ten']; ?></td>
            <td><?php echo $row['tl_ten']; ?></td>
            <td>
                <button type="button" class="btn btn-warning" id="display" id_update="<?php echo $row['s_id']; ?>" giamgia="<?php echo $row['s_giamgia']; ?>" s_gia="<?php echo number_format($row['s_gia']); ?>" nxb="<?php echo $row['nxb']; ?>" namxuatban="<?php echo $row['namxuatban']; ?>" soluong="<?php echo $row['soluong']; ?>" ngonngu="<?php echo $row['ngonngu']; ?>" data-bs-toggle="modal" data-bs-target="#displayModal">
                    Sửa
                </button>
                <button type="button" class="btn btn-danger" id="delete" id_delete="<?php echo $row['s_id']; ?>">
                    Xóa
                </button>
            </td>
        <?php  }
        ?>
    <?php }

    //update



    ?>