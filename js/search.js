function loadALL() {
    var action = "loadAll";
    $.ajax({
        type: "POST",
        url: "dandle.php",
        data: { action: action },

        success: function(data) {
            $('#data_search').html(data);
        }
    });
}
$(document).ready(function() {
    $(document).on('click', '#search_btn', function(e) {
        e.preventDefault();
        var action = 'timkiem';
        var load = $('#inputsearch').val();

        if (load == '') {
            alert('Bạn chưa nhập thông tin');
        } else {
            $.ajax({
                url: 'handle.php',
                method: 'POST',
                data: {
                    action: action,
                    load: load
                },
                success: function(data) {
                    // Lưu kết quả tìm kiếm vào lưu trữ phiên
                    sessionStorage.setItem('searchResults', JSON.stringify(data));
                    // //Hiển thị số lượng kết quả tìm kiếm
                    // $('#count_product').text(data.count);
                    // Chuyển hướng người dùng đến trang products.php
                    window.location.href = 'products.php';
                }
            })
        }
    })
});
$(document).ready(function() {
    // Kiểm tra xem có dữ liệu tìm kiếm nào được lưu trong lưu trữ phiên không
    if (sessionStorage.getItem('searchResults')) {
        // Lấy dữ liệu tìm kiếm từ lưu trữ phiên
        var searchResults = JSON.parse(sessionStorage.getItem('searchResults'));
        // Hiển thị kết quả tìm kiếm trong phần tử HTML có id là data_search
        $('#data_search').html(searchResults);

        //ẩn pagination
        $('#pagination_book').hide();
        // Xóa dữ liệu tìm kiếm khỏi lưu trữ phiên
        sessionStorage.removeItem('searchResults');
    }
});

$('#detail_product').on('click', 'li', function(e) {
    e.preventDefault();
    var id = $(this).attr('data-value');
    // Chuyển hướng người dùng đến trang products.php với tham số truy vấn activeLi bằng với giá trị của thuộc tính data-value
    window.location.href = 'products.php?activeLi=' + id;
});

// Trang product
$(document).ready(function() {
    // Lấy giá trị của tham số truy vấn activeLi từ URL
    var urlParams = new URLSearchParams(window.location.search);
    var activeLiValue = urlParams.get('activeLi');
    // Nếu có giá trị này
    if (activeLiValue) {
        // Thêm lớp active vào thẻ li có thuộc tính data-value bằng với giá trị này
        $('#detail_product li[data-value="' + activeLiValue + '"]').addClass('active');
        // Gửi yêu cầu AJAX đến handle.php
        $.ajax({
            type: "POST",
            url: "handle.php",
            data: { action: 'chitiettheloai', id: activeLiValue },
            success: function(data) {
                // Cập nhật nội dung của phần tử HTML có id là data_search
                $('#data_search').html(data);
            }
        });
    }
});