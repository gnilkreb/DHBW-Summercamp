$(() => {
    $('[data-option-boolean]').change(onOptionChange);
});

function onOptionChange() {
    const $this = $(this);
    const id = $this.data('option-boolean');
    const active = $this.prop('checked');
    const apiUrl = `/admin/option/${id}`;
    const value = active ? '1' : '0';

    $.post({
        url: apiUrl,
        data: {value}
    });
}