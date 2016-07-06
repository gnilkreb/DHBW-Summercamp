@if(env('BUGSNAG_API_KEY_JS'))
    <script src="/components/bugsnag/src/bugsnag.js" data-apikey="{{ env('BUGSNAG_API_KEY_JS') }}"></script>
@endif

<script src="/components/jquery/dist/jquery.min.js"></script>
<script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/components/clipboard/dist/clipboard.min.js"></script>
<script src="/components/pusher-websocket-iso/dist/web/pusher.js"></script>
<script src="/components/notie/dist/notie.min.js"></script>
<script src="/js/app.js"></script>

@stack('scripts')