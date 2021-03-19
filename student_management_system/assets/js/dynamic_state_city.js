$(document).ready(function () {
    $("body").on("change", '.country', autoGetState);
    $("body").on("change keyup", '.state', autoGetCity);

    function autoGetState() {
        let country = $('.country').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "getState.php",
            data: 'country=' + country,
            success: function (response) {
                var state = '';
                for (var i = 0; i < response.length; i++) {
                    state += '<option value=' + response[i].code + '>' + response[i].name + '</option>';
                }
                $('.state').html(state);
            },
            error: function (request, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }


    function autoGetCity() {
        let state = $('.state').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "getCity.php",
            data: 'state=' + state,
            success: function (response) {
                var city = '';
                for (var i = 0; i < response.length; i++) {
                    city += '<option value=' + response[i].code + '>' + response[i].name + '</option>';
                }
                $('.city').html(city).trigger('change');
            },
            error: function (request, textStatus, errorThrown) {
                //    alert(errorThrown);
            }
        });

    }

});