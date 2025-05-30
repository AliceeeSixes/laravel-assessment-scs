<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Assessment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>

<body class="h-screen">
    <!-- Wrapper Div -->
    <div class="text-black min-h-full px-5">

        <!-- Navbar -->
        <nav class="bg-white mb-10 sticky top-0 flex justify-center text-xl h-15 items-center border-b border-black">
            <!-- Nav Logo -->
            <div class="absolute left-0">
                <img src="https://placehold.co/100" class="w-10"/>
            </div>

            <!-- Nav Buttons -->
            <div class= "py-3 flex gap-5">
                <x-nav-link href="/companies">Companies</x-nav-link>
                <x-nav-link href="/employees">Employees</x-nav-link>
            </div>

            <!-- Account Options -->
            <div class="absolute right-0 px-5 py-3 text-lg">
                @guest
                    <a href="/login" class="px-3 py-1 rounded-lg hover:bg-black/20 transition-bg duration-300">Log In <i class="fa fa-right-to-bracket pl-1"></i></a>
                @endguest
                @auth
                    <form id="logout" action="/logout" method="POST">
                        @csrf
                        <button form="logout" type="submit" class="px-3 py-1 rounded-lg hover:bg-black/20 transition-bg duration-300">Log Out <i class="fa fa-right-from-bracket pl-1"></i></button>
                    </form>
                @endauth
            </div>
        </nav>
        {{ $slot }}
    </div>
    
</body>

</html>