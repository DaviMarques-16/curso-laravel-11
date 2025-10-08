<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen">
    <header class="flex flex-row w-full h-32 bg-slate-600 justify-center items-center">
        <div>

        <a href="{{route ('posts.index')}}">    <h1 class="text-3xl text-cyan-300">Posts on: Poste e Participe</h1>  </a>
          
        </div>
    </header>

    @yield('content')

    <footer class="mb-3 ml-5 mt-2">
        <p class="text-sm">@2025 copyright: <span>Posts on: Poste e Participe</span></p>
    </footer>
</body>
</html>