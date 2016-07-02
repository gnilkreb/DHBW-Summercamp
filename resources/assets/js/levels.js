$(() => {
     $('[data-set-category-active]').change(onSetCategoryActive);
});

function onSetCategoryActive() {
    const $this = $(this);
    const categoryId = $this.data('set-category-active');
    const active = $this.prop('checked');
    const apiUrl = `/admin/category/${ categoryId }/active`;

    $.post({
        url: apiUrl,
        data: { active }
    });
}