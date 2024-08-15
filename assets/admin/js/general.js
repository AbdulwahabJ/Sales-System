$(document).ready(function () {
    $(document).on('click', '#update_image', function (e) {
        e.preventDefault();

        $("#old_image").html('<input type="file" name="photo" id="photo" >');
        $("#update_image").hide();
        $("#cancel_update_image").show();
        return false;
    });

    $(document).on('click', '#cancel_update_image', function (e) {
        e.preventDefault();

        $("#old_image").html('');
        $("#update_image").show();
        $("#cancel_update_image").hide();
        return false;
    });

});
