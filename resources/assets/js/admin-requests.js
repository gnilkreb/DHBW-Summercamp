$(() => {
    $.ajax({
        method: 'GET',
        url: '/admin/requests/partial',
        success(html) {
            $('#requests-container').html(html);
        }
    });
});