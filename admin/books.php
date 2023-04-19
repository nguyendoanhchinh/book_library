<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include "inc/nav.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "inc/sidebar.php";     ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Danh sách sách</h1>


                </div>

                <div class="card-body">


                    <div class="card mb-10">
                        <!-- tìm kiếm  -->
                        <form action="" method="POST" class="mr-2 col-sm-2 p-4 ">
                            <div class="dropdown">
                                <div class="d-flex">
                                    <input class="form-control rounded" type="text" id="btnseach" data-bs-toggle="dropdown" aria-expanded="false" autocomplete="off">
                                    <input type="submit" class="btn btn-primary" id="search_btn" value="Tìm Kiếm">
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" id="list_dropdown">
                                    </ul>
                                </div>
                            </div>
                        </form>
                        <!--  -->




                        <!-- Modal thêm  -->

                        <button type="submit" class="btn btn-success col-sm-1 pb-2 m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Thêm
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm sách</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>

                                            <div class="mb-3">
                                                <label for="tensach" class="form-label">Tên sách</label>
                                                <input type="text" class="form-control" id="tensach">
                                            </div>
                                            <div class="d-flex">
                                                <div class="mb-3">
                                                    <label for="giasach" class="form-label">Gía sách</label>
                                                    <input type="number" class="form-control" id="giasach">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="sachgiamgia" class="form-label">Giảm Gía</label>
                                                    <input type="number" class="form-control" id="sachgiamgia">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nxb" class="form-label">Nhà xuất bản</label>
                                                    <input type="text" class="form-control" id="nxb">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="namxuatban" class="form-label">Năm xuất bản</label>
                                                    <input type="number" class="form-control" id="namxuatban">
                                                </div>
                                            </div>



                                            <div class="mb-3">
                                                <label for="mota" class="form-label">Mô tả</label>
                                                <input type="text" class="form-control" id="mota">
                                            </div>

                                            <div class="d-flex">
                                                <div class="mb-3">
                                                    <label for="sotrang" class="form-label">Số trang</label>
                                                    <input type="number" class="form-control" id="sotrang">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="soluong" class="form-label">Số lượng</label>
                                                    <input type="number" class="form-control" id="soluong">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ngonngu" class="form-label">Ngôn ngữ</label>
                                                    <input type="text" class="form-control" id="ngonngu">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tacgia" class="form-label">Tác giả</label>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>--Lựa chọn Tác giả--</option>
                                                        <?php
                                                        $sql = "select * from tacgia ";
                                                        $query = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_assoc($query)) { ?>
                                                            <option value="<?php echo $row['tg_id']; ?>"><?php echo $row['tg_ten'] ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="mb-3">
                                                <label for="tacgia" class="form-label">Thể loại</label>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>--Lựa chọn thể loại--</option>
                                                    <?php
                                                    $sql = "select * from theloai ";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_assoc($query)) { ?>
                                                        <option value="<?php echo $row['tl_id']; ?>"><?php echo $row['tl_ten'] ?></option>
                                                    <?php }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="anhsach" class="form-label">Ảnh chính</label>
                                                <input type="file" class="form-control" id="anhsach" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="anhsach" class="form-label">Ảnh phụ(nếu có)</label>
                                                <input type="file" class="form-control" id="anhsach" aria-describedby="emailHelp">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary" id="btnAdd">Thêm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal sửa  -->
                        <div class="modal fade" id="displayModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-lg">
                                <div class="modal-content">
                                    <div class="bd-example">
                                        <form>

                                            <div class="form-row">
                                                <input type="hidden" id="hidden_id">
                                                <div class="form-group ">
                                                    <label for="s_gia">Giá sách</label>
                                                    <input type="text" class="form-control" id="s_gia" autocomplete="off">
                                                </div>
                                                <div class="form-group ">
                                                    <label for="nxb">Nhà xuất bản</label>
                                                    <input type="text" class="form-control" id="nxb" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="namxuatban">Năm xuất bản</label>
                                                <input type="text" class="form-control" id="namxuatban" autocomplete="off">
                                            </div>
                                            <div class="form-group ">
                                                <label for="giamgia">Giảm giá sách</label>
                                                <input type="text" class="form-control" id="giamgia" autocomplete="off">
                                            </div>
                                            <div class="form-group ">
                                                <label for="soluong">Số lượng</label>
                                                <input type="text" class="form-control" id="soluong" autocomplete="off">
                                            </div>

                                            <div class="form-row d-flex">
                                                <div class="form-group ">
                                                    <label for="ngonngu">Ngôn ngữ</label>
                                                    <input type="text" class="form-control" id="ngonngu" autocomplete="off">
                                                </div>

                                            </div>

                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary" id="btnupdate">Sửa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th>Thông tin sách</th>
                                    <th>Gía sách</th>
                                    <th>Nhà xuất bản</th>
                                    <th>Năm xuất bản</th>
                                    <th>Giảm Gía</th>
                                    <th>Số trang</th>
                                    <th>Số lượng</th>
                                    <th>Ngôn ngữ</th>
                                    <th>Tên tác giả</th>
                                    <th>Tên thể loại</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-data">
                                <?php
                                //tìm tổng số bản ghi
                                $result = mysqli_query($conn, 'select count(s_id) as total from sach');
                                $row = mysqli_fetch_assoc($result);
                                $total = $row['total'];
                                //tìm giới hạn và trang đầu tiên
                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $limit = 8;

                                //tổng số trang làm  tròn lên
                                $total_page = ceil($total / $limit);
                                // Tìm trang đầu
                                $start = ($current_page - 1) * $limit;

                                $sql = "SELECT * from sach  INNER JOIN tacgia ON tacgia.tg_id = sach.tg_id
                                INNER JOIN theloai ON sach.tl_id = theloai.tl_id limit  $start,$limit ";
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
                                            <button type="button" class="btn btn-warning display" id_update="<?php echo $row['s_id']; ?>" giamgia="<?php echo $row['s_giamgia']; ?>" s_gia="<?php echo number_format($row['s_gia']); ?>" nxb="<?php echo $row['nxb']; ?>" namxuatban="<?php echo $row['namxuatban']; ?>" soluong="<?php echo $row['soluong']; ?>" ngonngu="<?php echo $row['ngonngu']; ?>" data-bs-toggle="modal" data-bs-target="#displayModal">
                                                Sửa
                                            </button>
                                            <button type="button" class="btn btn-danger" id="delete" id_delete="<?php echo $row['s_id']; ?>">
                                                Xóa
                                            </button>
                                        </td>
                                    <?php  }
                                    ?>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example " id="pagination_book">
                            <ul class="pagination justify-content-end">
                                <?php
                                if ($current_page > 1 && $total_page > 1) { ?>
                                    <li class="page-item ">
                                        <a class="page-link" href="books.php?page=<?php echo $current_page - 1; ?>" tabindex="-1">Trang sau</a>
                                    </li>
                                <?php  }
                                ?>
                                <?php
                                for ($i = 1; $i <= $total_page; $i++) { ?>
                                    <li class="page-item"><a class="page-link" href="books.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php  }
                                ?>

                                <?php
                                if ($current_page < $total_page && $total_page > 1) { ?>
                                    <li class="page-item">
                                        <a class="page-link" href="books.php?page=<?php echo $current_page + 1; ?>">Trang trước</a>
                                    </li>
                                <?php
                                }
                                ?>

                            </ul>
                        </nav>
                    </div>
                </div>
        </div>
        </main>

    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

    <script src="js/books.js"></script>
</body>

</html>