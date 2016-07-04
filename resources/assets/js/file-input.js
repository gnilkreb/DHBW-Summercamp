$(() => {
    $('[data-file-input]').click(onFileInput);
});

function onFileInput() {
    const $this = $(this);
    const selector = $this.data('file-input');

    $(selector).click();
}