<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('assets/images/favicon.ico" type="image/x-icon') }}">
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Poppins:300,300i,400,500,600,700,800,900,900i%7CPT+Serif:400,700">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/css/bootstrap.min.css"
        integrity="...">
    <style>
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased wide wow-animation">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-gray dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="flex w-96 shadow-lg justify-center  rounded-lg">
            <div class="bg-red-600 py-4 px-6 rounded-l-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="fill-current text-white" width="20"
                    height="20">
                    <path fill-rule="evenodd"
                        d="M4.47.22A.75.75 0 015 0h6a.75.75 0 01.53.22l4.25 4.25c.141.14.22.331.22.53v6a.75.75 0 01-.22.53l-4.25 4.25A.75.75 0 0111 16H5a.75.75 0 01-.53-.22L.22 11.53A.75.75 0 010 11V5a.75.75 0 01.22-.53L4.47.22zm.84 1.28L1.5 5.31v5.38l3.81 3.81h5.38l3.81-3.81V5.31L10.69 1.5H5.31zM8 4a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 018 4zm0 8a1 1 0 100-2 1 1 0 000 2z">
                    </path>
                </svg>
            </div>
            <div
                class="px-4 py-6 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
                <div>
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                </div>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-700" viewBox="0 0 16 16"
                        width="20" height="20">
                        <path fill-rule="evenodd"
                            d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z">
                        </path>
                    </svg> 
                </button>
            </div>
        </div>
        @endforeach
        @endif


        @if (session('success'))
        <div id="success-alert" class="flex w-96 p-8  shadow-lg  mt-5 rounded-lg">
            <div class="bg-green-600 py-4 px-6 rounded-l-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="text-white fill-current" viewBox="0 0 16 16" width="20"
                    height="20">
                    <path fill-rule="evenodd"
                        d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z">
                    </path>
                </svg>
            </div>
            <div
                class="px-4 py-6 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
                <div>
                    {{ session('success') }}
                </div>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-gray-700" viewBox="0 0 16 16"
                        width="20" height="20">
                        <path fill-rule="evenodd"
                            d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
        @endif
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js" integrity="..."
        crossorigin="anonymous"></script>
    <script>
       ;

    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function slideOut(element) {
            element.style.left = '-100%';
            element.style.opacity = '0';
            setTimeout(function () {
                element.style.display = 'none';
            }, 500);
        }

        @if ($errors->any())
            var errorAlert = document.getElementById('error-alert');
            errorAlert.style.left = '0';
            setTimeout(function () {
                slideOut(errorAlert);
            }, 5000);
        @endif

        @if (session('success'))
            var successAlert = document.getElementById('success-alert');
            successAlert.style.left = '0';
            setTimeout(function () {
                slideOut(successAlert);
            }, 5000);
        @endif

        var closeButton = document.querySelector('#error-alert button, #success-alert button');
        if (closeButton) {
            closeButton.addEventListener('click', function () {
                var parent = this.closest('.flex');
                parent.style.left = '-100%';
                parent.style.opacity = '0';
                setTimeout(function () {
                    parent.style.display = 'none';
                }, 500);
            });
        }
    });
</script>

</body>

</html>