<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-900 text-slate-50 h-full">
    <h1 class="font-bold text-3xl text-red-500">{{ config('app.name') }}</h1>
</body>

</html>
