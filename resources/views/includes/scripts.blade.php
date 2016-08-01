<script src="/components/core.js/client/core.min.js"></script>

@if(env('BUGSNAG_API_KEY_JS'))
    <script src="/components/bugsnag/src/bugsnag.js" data-apikey="{{ env('BUGSNAG_API_KEY_JS') }}"></script>
@endif

<script src="/components/jquery/dist/jquery.min.js"></script>
<script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/components/clipboard/dist/clipboard.min.js"></script>
<script src="/components/pusher-websocket-iso/dist/web/pusher.js"></script>
<script src="/components/notie/dist/notie.min.js"></script>
<script src="/components/sweetalert2/dist/sweetalert2.min.js"></script>

@stack('scripts')

<script src="/js/app.js"></script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-40279069-5', 'auto');
    ga('send', 'pageview');
</script>