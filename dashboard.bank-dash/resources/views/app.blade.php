<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.ts'])
        @inertiaHead
    </head>
    <body>
        @inertia
    </body>
    <script>
        (function() {
            var dark = window.matchMedia("(prefers-color-scheme: dark)").matches;
            document.documentElement.dataset.theme = dark ? "dark" : "light";
        })();
    </script>
</html>
