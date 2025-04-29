<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{  $title }}</title>

    @vite(['resources/css/app.css'])

    <style>
        .content-section {
            @apply pl-0 py-0;
        }

        .entry {
            @apply space-y-1 pb-4 border-b border-gray-100 last:border-b-0;
        }

        .section-title {
            @apply text-xl font-bold uppercase tracking-wider text-gray-700 border-b-2 border-indigo-500 pb-1 mb-4;
        }

        @media print {
            body {
                background: white;
                font-size: 10pt;
                color: #000;
            }

            a {
                color: black;
                text-decoration: none;
            }

            .main-grid {
                grid-template-columns: 1fr !important;
                gap: 1.5rem !important;
            }

            .content-section,
            .entry {
                border-left: none !important;
                padding-left: 0 !important;
                border-bottom: none !important;
            }

            .sidebar {
                margin-top: 0 !important;
            }

            .section-title {
                border-bottom: 1px solid #999 !important;
                color: #333 !important;
            }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-700 antialiased font-serif">
    <main class="max-w-5xl mx-auto p-8 md:p-12 lg:p-16 bg-white shadow-2xl">
        {{ $slot }}
    </main>
</body>
</html>