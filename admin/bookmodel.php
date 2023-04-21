<?php
include "../database/connect.php";
$action = $_POST['action'];

//thêm sách 
if ($action == 'addBook') {
}
// sửa sách
if ($action == 'updateBook') {
    $id = $_POST['id'];
    $tensach = $_POST['s_tensach'];
    $giasach = $_POST['s_giasach'];
    $sachgiamgia = $_POST['s_sachgiamgia'];
    $nxb = $_POST['s_nxb'];
    $namxuatban = $_POST['s_namxuatban'];
    $sotrang = $_POST['s_sotrang'];
    $soluong = $_POST['s_soluong'];
    $ngonngu = $_POST['s_ngonngu'];
    $tg_id = trim($_POST['s_tacgia']);
    $tl_id = trim($_POST['s_theloai']);
   
    $sql = "UPDATE `sach` SET `s_ten`='$tensach',`s_gia`='$giasach',`s_giamgia`='$sachgiamgia',`nxb`='$nxb',
    `namxuatban`='$namxuatban',`sotrang`='$sotrang',`soluong`='$soluong',`ngonngu`='$ngonngu',`tg_id`='$tg_id',`tl_id`='$tl_id' WHERE `s_id`='$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "Sửa thành công";
    } else {
        echo "Sửa thất bại";
    }
}
// hiển thị sách
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
                <button type="button" class="btn btn-warning " id_update="<?php echo $row['s_id']; ?>" s_ten="<?php echo $row['s_ten']; ?>" s_gia="<?php echo $row['s_gia']; ?>" s_giamgia="<?php echo $row['s_giamgia']; ?>" nxb="<?php echo $row['nxb']; ?>" namxuatban="<?php echo $row['namxuatban']; ?>" sotrang="<?php echo $row['sotrang']; ?>" soluong="<?php echo $row['soluong']; ?>" ngonngu="<?php echo $row['ngonngu']; ?>" id="display" tacgia="<?php echo $row['tg_ten'] ?>" theloai="<?php echo $row['tl_ten'] ?>" data-bs-toggle="modal" data-bs-target="#displayModal">
                    Sửa
                </button>
                <button type="button" class="btn btn-danger" id="delete" id_delete="<?php echo $row['s_id']; ?>">
                    Xóa
                </button>
            </td>
            <?php  }
    }

//tim kiến sách
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
//danh sách sách
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
                <button type="button" class="btn btn-warning " id_update="<?php echo $row['s_id']; ?>" s_ten="<?php echo $row['s_ten']; ?>" s_gia="<?php echo $row['s_gia']; ?>" s_giamgia="<?php echo $row['s_giamgia']; ?>" nxb="<?php echo $row['nxb']; ?>" namxuatban="<?php echo $row['namxuatban']; ?>" sotrang="<?php echo $row['sotrang']; ?>" soluong="<?php echo $row['soluong']; ?>" ngonngu="<?php echo $row['ngonngu']; ?>" id="display" tacgia="<?php echo $row['tg_id'] ?>" theloai="<?php echo $row['tl_id'] ?>" data-bs-toggle="modal" data-bs-target="#displayModal">
                    Sửa
                </button>
                <button type="button" class="btn btn-danger" id="delete" id_delete="<?php echo $row['s_id']; ?>">
                    Xóa
                </button>
            </td>
        <?php  }
        ?>
        <?php }

// xóa dữ liệu sách
    if ($action == 'deleteBook') {
        $id = $_POST['id'];
        $sql = "DELETE FROM `sach` WHERE s_id='$id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "Xóa thành công";
        } else {
            echo "Xóa thất bại";
        }
    }
//hiện thị danh sách tác giả
    if ($action == 'loadAuthor') {
        //đếm tổng số sách của tác giả trong bảng sách cả tác giả không có quển sách nào
        $sql = "SELECT tacgia.tg_id, tacgia.tg_ten, COUNT(sach.tg_id) as tongsosach 
        FROM tacgia 
        LEFT JOIN sach ON sach.tg_id = tacgia.tg_id 
        GROUP BY tacgia.tg_id, tacgia.tg_ten";
        $query = mysqli_query($conn, $sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td class="text-center"><?php echo $i++; ?></td>
            <td class="text-center"><?php echo $row['tg_ten']; ?></td>
            <td class="text-center"><?php echo $row['tongsosach']; ?></td>
            <td style="text-align:center;" id="tbnSuaauthor" id_tacgia="<?php echo $row['tg_id']; ?>" ten_tacgia="<?php echo $row['tg_ten']; ?>" class="text-center"><button type="button" class="btn btn-warning text-center" data-bs-toggle="modal" data-bs-target="#modalAuthor">
                    Sửa tác giả
                </button>
                <button class="btn btn-danger " id="deleteAuthor" id_deleteAuthor="<?php echo $row['tg_id']; ?>">Xóa</button>
            </td>
        </tr>
<?php }
    }
//sửa tác giả
    if ($action == 'updateAuthor') {
        $id = $_POST['id'];
        $tentacgia = $_POST['tentacgia'];
        $sql = "UPDATE tacgia set tg_ten='$tentacgia' where tg_id='$id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "Sửa thành công";
        } else {
            echo "Sửa thất bại";
        }
    }
//xóa tác giả
    if ($action == 'deleteAuthor') {
        $id = $_POST['id'];
        $sql = "DELETE FROM `tacgia` WHERE tg_id='$id'";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "Xóa thành công";
        } else {
            echo "Xóa thất bại";
        }
    }
//thêm tác giả

if($action=='addAuthor'){
    $nameauthor=$_POST['addauthor'];
    $sql="INSERT INTO `tacgia`( `tg_ten`) VALUES ('$nameauthor')";
    $query=mysqli_query($conn,$sql);
    if ($query) {
        echo "Thêm  thành công";
    } else {
        echo "Thêm thất bại";
    }
}