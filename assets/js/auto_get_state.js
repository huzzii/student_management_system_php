$(document).ready(function () {
    $("body").on("change", '.country', autoGetState);

    function autoGetState() {
        let country = $('.country').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "getState.php",
            data: 'country=' + country,
            success: function (response) {
                let state = '';
                for (let i = 0; i < response.length; i++) {
                    state += '<option value=' + response[i].code + '>' + response[i].name + '</option>';
                }
                $('.state').html(state);
            },
            error: function (request, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }

});