loadAuthor();
//hien thi thong thong tin tac gia
function loadAuthor() {

    var action = 'loadAuthor';
    $.ajax({
        type: 'POST',
        url: "bookmodel.php",
        data: { action: action },
        success: function(data) {
            console.log(data);
            $('#listAuthor').html(data);
        }
    });
}
//hiển thị thông tin chi tiet tacgia 

$(document).on('click', '#tbnSuaauthor', function() {

    var id_tacgia = $(this).attr('id_tacgia');

    var ten_tacgia = $(this).attr('ten_tacgia');
    $('#suaModal').modal('show')
    $('#idtacgia').val(id_tacgia);
    $('#tentacgia').val(ten_tacgia);
})
$('')