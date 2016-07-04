$(() => {
    $('[data-set-category-active]').change(onSetCategoryActive);
    $('[data-delete-category]').click(onDeleteCategory);
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

function onDeleteCategory() {
    const $this = $(this);
    const categoryId = $this.data('delete-category');
    const redirect = $this.data('redirect');

    $.ajax({
        method: 'DELETE',
        url: `/admin/category/${ categoryId }`,
        success() {
            window.location.href = redirect;
        }
    });
}