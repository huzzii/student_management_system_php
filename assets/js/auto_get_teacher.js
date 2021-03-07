$(document).ready(function () {
    $("body").on("change", '.teacher', autoGetTeacher);

    function autoGetTeacher() {
        let teacher = $('.teacher').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "getClass.php",
            data: 'teacher=' + teacher,
            success: function (response) {
                let cclass = '';
                for (let i = 0; i < response.length; i++) {
                    cclass += '<option value=' + response[i].code + '>' + response[i].name + '</option>';
                }
                $('.class').html(cclass);
            },
            error: function (request, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }

});