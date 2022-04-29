<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="flex flex-col h-screen">

    <header class="bg-white shadow py-6 px-4 ">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-green-600 text-3xl"><a href="{{ route('home') }}">{{ config('app.name') }}</a></div>
            <div class="flex items-center">
                @auth
                    <a href="{{ route('pair-keys') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 hover:border-yellow-700 rounded text-white border-2 border-yellow-600 font-semibold shadow focus:outline-none py-2 px-3 mx-2 text-center">إنشاء
                        زوج المفاتيح - Pair of key </a>
                    <a href="{{ route('encrypt') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 hover:border-yellow-700 rounded text-white border-2 border-yellow-600 font-semibold shadow focus:outline-none py-2 px-3 mx-2 text-center">
                        التشفير - Encrypt</a>
                    <a href="{{ route('decrypt') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 hover:border-yellow-700 rounded text-white border-2 border-yellow-600 font-semibold shadow focus:outline-none py-2 px-3 mx-2 text-center">فك
                        التشفير - Decrypt </a>

                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a href="#"
                            class="border-2 hover:bg-gray-50 rounded border-green-600 text-green-600 font-semibold shadow focus:outline-none py-2 px-3 mx-2"
                            onclick="event.preventDefault(); this.closest('form').submit();">الخروج
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="border-2 hover:bg-gray-50 rounded border-green-600 text-green-600 font-semibold shadow focus:outline-none py-2 px-3 mx-2">الدخول
                    </a>
                    <a href="{{ route('register') }}"
                        class="bg-green-600 hover:bg-green-700 hover:border-green-700 rounded text-white border-2 border-green-600 font-semibold shadow focus:outline-none py-2 px-3 mx-2">إنشاء
                        حساب</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="flex-1 bg-gray-100">
        {{ $slot }}
    </main>

    <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>
