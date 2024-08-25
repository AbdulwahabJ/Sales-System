$(document).ready(function () {
    $(document).on('input', '#search_by_text', function (e) {
        var search_by_text = $(this).val();
        var ajax_search_url = $("#ajax_search_url").val();
        var token_search = $("#token_search").val();

        jQuery.ajax({
            url: ajax_search_url,
            type: 'post',
            dataType: 'json',
            cache: false,
            data: { search_by_text: search_by_text, ajax_search_url: ajax_search_url, "_token": token_search },
            success: function (response) {
                $('#ajax_responce_searchDiv').html(response.data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('Error occurred:', textStatus, errorThrown);
                $('#ajax_responce_searchDiv').html('<div class="alert alert-danger">حدث خطأ أثناء تحميل البيانات.</div>');
            }
        });
    });
});
