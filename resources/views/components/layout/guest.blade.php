@props(['title', 'headerGap' => 'gap-16'])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-base-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&family=Outfit:wght@100..900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Space Grotesk', sans-serif;
        }
    </style>
</head>

<body class="h-full antialiased text-content-primary">
    <div class="min-h-screen flex p-5 gap-10 bg-background-primary">
        {{-- Lado Esquerdo: Imagem (724px, Radius 16px) --}}
        <div class="hidden lg:block w-[724px] shrink-0 relative bg-background-tertiary overflow-hidden rounded-2xl">
            <img src="{{ asset('img/sun-tornado.png') }}" onerror="this.style.display='none'" alt="Background"
                class="absolute inset-0 h-full w-full object-cover">
        </div>

        {{-- Lado Direito: Conteúdo --}}
        <div class="flex-1 flex flex-col justify-center items-center relative px-6 md:px-12 lg:px-[80px]">
            <div class="w-full max-w-[440px] flex flex-col {{ $headerGap }}">
                <div class="flex justify-center">
                    <img src="{{ asset('img/logo.svg') }}" alt="Sitemark" class="w-[228px] h-[62px]"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block'">
                    <span class="text-3xl font-bold tracking-tighter text-white hidden">
                        Sitemark
                    </span>
                </div>

                {{ $slot }}
            </div>
        </div>
    </div>

</body>

</html>
