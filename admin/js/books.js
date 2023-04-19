// thêm
$(document).ready(function() {
    $('#btnAdd').click(function() {
        var tensach = $('#tensach').val();
        var tensach = $('#tensach').val();
        var tensach = $('#tensach').val();
        var tensach = $('#tensach').val();
        var tensach = $('#tensach').val();
        var tensach = $('#tensach').val();
    })
})


//tìm kiếm
$(document).ready(function() {
    $("#btnseach").keyup(function() {
        var action = 'search';
        var s_ten = $(this).val();

        if (s_ten != '') {
            $.ajax({
                url: 'bookmodel.php',
                method: 'POST',
                data: {
                    action: action,
                    s_ten: s_ten
                },
                success: function(data) {

                    $('#list_dropdown').fadeIn('fast').html(data);
                }
            });
        } else {
            $('#list_dropdown').fadeOut();
        }
    });
});
//hiển thị sản phẩm tìm kiếm 
$(document).on('click', '#search_btn', function(e) {
        e.preventDefault();
        var action = 'loadData';
        var load = $('#btnseach').val();

        if (load == '') {
            alert('bạn chưa nhập thông tin');
        } else {
            $.ajax({
                url: 'bookmodel.php',
                method: 'POST',
                data: {
                    action: action,
                    load: load
                },
                success: function(data) {
                    $('.table-data').html(data)
                    $('#pagination_book').hide()
                    $('#list_dropdown').hide()

                }
            })
        }

    })
    //hiển thị 1 sản phẩm
$(document).on('click', '#list_search', function() {
        var id = $(this).attr('value');
        console.log(id)
        var action = 'list_book';
        var load = $('#btnseach').val();
        $.ajax({
            type: "POST",
            url: "bookmodel.php",
            data: { id: id, action: action, load: load },

            success: function(data) {

                $('#pagination_book').hide()
                $('.dropdown-item').hide()
                $('.table-data').html(data)
            }
        });
    })
    //hiển thị dữ liệu sửa

$(document).on('click', '.display', function() {

        var $id_update = $(this).attr('id_update');
        var $s_gia = $(this).attr('s_gia');
        var $nxb = $(this).attr('nxb');
        var $giamgia = $(this).attr('giamgia');
        var $namxuatban = $(this).attr('namxuatban');
        var $soluong = $(this).attr('soluong');
        var $ngonngu = $(this).attr('ngonngu');
        var $tg_ten = $(this).attr('tg_ten');
        var $tl_ten = $(this).attr('tl_ten');
        $('#displayModal').modal('show')
        $('#hidden_id').val($id_update)
        $('#s_gia').val($s_gia)
        $('#nxb').val($nxb)
        $('#giamgia').val($giamgia)
        $('#namxuatban').val($namxuatban)
        $('#soluong').val($soluong)
        $('#ngonngu').val($ngonngu)
        $('#tentacgia').val($tg_ten)
        $('#tentheloai').val($tl_ten)
    })
    //sủa dữ liệu

$(document).on('click', '#btnupdate', function() {

        var action = "update";
        var id = $('#hidden_id').val();
        var s_gia = $('#s_gia').val();
        var nxb = $('#nxb').val();
        var giamgia = $('#giamgia').val();
        var namxuatban = $('#namxuatban').val();
        var soluong = $('#soluong').val();
        var ngonngu = $('#ngonngu').val();
        var tentacgia = $('#tentacgia').val();
        var tentheloai = $('#tentheloai').val();

        $.ajax({
            method: "POST",
            url: "bookmodel.php",
            data: { action: action, id: id, s_gia: s_gia, nxb: nxb, giamgia: giamgia, namxuatban: namxuatban, soluong: soluong, ngonngu: ngonngu, tentacgia: tentacgia, tentheloai: tentheloai },
            success: function(data) {
                if (data == 1) {
                    $("#displayModal").modal('hide');
                    alert('Sửa thành công');
                    location.reload();
                } else {
                    alert("sửa thất bại");
                }

            }
        });
    })
    //xóa dữ liệu sách

$(document).on('click', '#delete', function() {
    var action = "delete";

    var id = $(this).attr('id_delete');

    $.ajax({
        url: 'bookmodel.php',
        method: 'POST',
        data: { action: action, id: id },
        success: function(data) {
            alert(data);
            if (data == 1) {


                alert('Sửa thành công');
                location.reload();
            } else {
                alert("Xóa  thất bại");
            }
        }
    })
})