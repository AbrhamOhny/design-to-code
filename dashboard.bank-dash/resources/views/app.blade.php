<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite(['resources/css/app.css', 'resources/js/app.ts'])
        @inertiaHead
    </head>
    <body>
        @inertia
    </body>
    <script>
        (function() {
            var dark = window.matchMedia("(prefers-color-scheme: dark)").matches;
            document.body.dataset.theme = dark ? "dark" : "light";
        })();
    </script>
</html>
