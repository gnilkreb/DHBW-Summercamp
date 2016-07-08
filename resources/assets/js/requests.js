if ($('[data-admin]').length === 1) {
    init();
}

function init() {
    const pusher = new Pusher('a99a230c0d6a70328f20', {
        cluster: 'eu',
        encrypted: true
    });
    const channel = pusher.subscribe('admin');

    channel.bind('requests', payload => {
        updateElements(payload.count, payload.html);
        notie.alert(4, 'Anfragen aktualisiert', 5);
    });

    $(() => {
        loadRequests();
    });
}

function loadRequests() {
    $.ajax({
        method: 'GET',
        url: '/admin/requests/partial',
        success(response) {
            const {count, html} = response.data;

            updateElements(count, html);
        }
    });
}

function updateElements(count, html) {
    $('#requests-badge').html(count);
    $('#requests-container').html(html);
    $('[data-handle-request]').click(onHandleRequest);
}

function onHandleRequest() {
    const $this = $(this);
    const id = $this.data('handle-request');
    const accept = $this.data('accept');

    $.ajax({
        method: 'POST',
        url: `/admin/request/${id}/`,
        data: {accept}
    });
}