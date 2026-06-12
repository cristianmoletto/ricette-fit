<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    
    <title>Recipes</title>
</head>
<body>
    <div class="container">
        <h1>@yield('title')</h1>
    </div>
    @yield('content')
</body>
</html>