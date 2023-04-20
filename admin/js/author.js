loadAuthor();

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