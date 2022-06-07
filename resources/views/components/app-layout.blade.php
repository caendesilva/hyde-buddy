<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hyde Buddy {{ isset($title) ? " - $title" : '' }}</title>
    <link rel="stylesheet" href="{{ asset('app.css') }}">
</head>
<body>
    <main>
        {{ $slot }}
    </main>
    <script>
        // Core scripts and polyfills for the Chromium embedded browser.

        // Refresh the page on CTRL+R
        document.addEventListener('keydown', (e) => {
            if (e.key === 'r' && e.ctrlKey) {
                window.location.reload();
            }
        });
    </script>
</body>
</html>