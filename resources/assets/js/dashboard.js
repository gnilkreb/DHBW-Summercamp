const pusher = new Pusher('a99a230c0d6a70328f20', {
    cluster: 'eu',
    encrypted: true
});

if ($('[data-admin]').length === 1) {
    const channel = pusher.subscribe('admin');

    channel.bind('activity', payload => {
        $('#dashboard').html(payload);
    });
}
