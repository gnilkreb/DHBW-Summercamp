$(() => {
    $('[data-delete-file]').click(onDeleteFile);
});

function onDeleteFile() {
    const fileName = $(this).data('delete-file');

    $.ajax({
        method: 'DELETE',
        url: `/admin/file/${ fileName }`,
        success() {
            window.location.reload();
        }
    });
}