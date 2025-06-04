<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Assessment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="h-screen">
    <!-- Wrapper Div -->
    <div class="text-black dark:text-white dark:bg-slate-900 min-h-full">

        <!-- Navbar -->
        <nav class="px-5 bg-sky-500 dark:bg-fuchsia-800 text-white mb-10 sticky top-0 flex justify-center text-xl sm:h-15 items-center border-b border-black dark:border-white">

            <!-- Nav Buttons -->
            <div class= "py-3 flex sm:gap-5 flex-wrap justify-center sm:justify-normal">
                <x-nav-link href="/companies">Companies</x-nav-link>
                <x-nav-link href="/employees">Employees</x-nav-link>
                @guest
                    <a href="/login" class="px-3 py-1 rounded-lg hover:bg-black/20 dark:hover:bg-white/20 transition-bg duration-300 visible sm:hidden">Log In <i class="fa fa-right-to-bracket pl-1"></i></a>
                @endguest
                @auth
                    <form id="logout" action="/logout" method="POST" class="visible sm:hidden">
                        @csrf
                        <button form="logout" type="submit" class="px-3 py-1 rounded-lg hover:bg-black/20 dark:hover:bg-white/20 transition-bg duration-300 cursor-pointer">Log Out <i class="fa fa-right-from-bracket pl-1"></i></button>
                    </form>
                @endauth
            </div>

            <!-- Account Options -->
            <div class="absolute right-5 py-3 text-lg collapse sm:visible">
                @guest
                    <a href="/login" class="px-3 py-1 rounded-lg hover:bg-black/20 dark:hover:bg-white/20 transition-bg duration-300">Log In <i class="fa fa-right-to-bracket pl-1"></i></a>
                @endguest
                @auth
                    <form id="logout" action="/logout" method="POST">
                        @csrf
                        <button form="logout" type="submit" class="px-3 py-1 rounded-lg hover:bg-black/20 dark:hover:bg-white/20 transition-bg duration-300 cursor-pointer">Log Out <i class="fa fa-right-from-bracket pl-1"></i></button>
                    </form>
                @endauth
            </div>
        </nav>
        <main class="px-5">
            {{ $slot }}
        </main>
    </div>
    
</body>

</html>