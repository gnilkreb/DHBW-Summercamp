$(() => {
    $('[data-set-category-active]').change(onSetCategoryActive);
    $('[data-delete]').click(onDelete);
});

function onSetCategoryActive() {
    const $this = $(this);
    const categoryId = $this.data('set-category-active');
    const active = $this.prop('checked');
    const apiUrl = `/admin/category/${ categoryId }/active`;

    $.post({
        url: apiUrl,
        data: {active}
    });
}

function onDelete() {
    const $this = $(this);
    const modelId = $this.data('delete');
    const modelName = $this.data('model');
    const redirect = $this.data('redirect');

    $.ajax({
        method: 'DELETE',
        url: `/admin/${ modelName }/${ modelId }`,
        success() {
            window.location.href = redirect;
        }
    });
}