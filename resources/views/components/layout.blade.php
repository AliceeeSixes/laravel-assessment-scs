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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/css/app.css')
</head>

<body class="h-screen">
    <!-- Wrapper Div -->
    <div class="text-black dark:text-white dark:bg-slate-900 min-h-full">

        <!-- Navbar -->
        @auth
            <!-- Desktop Nav -->
            <nav class="px-5 bg-sky-500 dark:bg-fuchsia-800 text-white mb-10 sticky top-0 justify-center text-xl sm:h-15 items-center border-b border-black dark:border-white hidden sm:flex z-1">

                <!-- Nav Buttons -->
                <div class= "py-3 flex sm:gap-5 flex-wrap justify-center sm:justify-normal">
                    <x-nav-link href="/">Dashboard</x-nav-link>
                    <x-nav-link href="/companies">Companies</x-nav-link>
                    <x-nav-link href="/employees">Employees</x-nav-link>


                </div>

                <!-- Account Options -->
                <div class="absolute right-5 py-3 text-lg">

                    <form id="logout" action="/logout" method="POST">
                        @csrf
                        <button form="logout" type="submit" class="px-3 py-1 rounded-lg hover:bg-black/20 dark:hover:bg-white/20 transition-bg duration-300 cursor-pointer">Log Out <i class="fa fa-right-from-bracket pl-1"></i></button>
                    </form>

                </div>
            </nav>
            <!-- Mobile Nav -->
            <nav class="px-5 bg-sky-500 dark:bg-fuchsia-800 text-white mb-10 sticky min-h-12 top-0 flex flex-col text-lg text-center justify-center border-b border-black dark:border-white sm:hidden z-1">
                <!-- Toggle Button -->
                <div class="flex justify-end text-3xl fixed top-1 right-3 h-10">
                    <button
                        onclick="
                            $nav = $('#nav-mobile-dropdown');
                            if($nav.hasClass('shown')) {
                                $nav.slideUp();
                            } else {
                                $nav.slideDown(); 
                            }
                            $nav.toggleClass('shown');        
                        ">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Nav Buttons -->
                <div class= "py-3 flex flex-col gap-2 items-center shown text-xl" id="nav-mobile-dropdown">
                    <x-nav-link href="/">Dashboard</x-nav-link>
                    <x-nav-link href="/companies">Companies</x-nav-link>
                    <x-nav-link href="/employees">Employees</x-nav-link>

                    <!-- Account Options -->
                    <div class="px-3">
                        <form id="logout" action="/logout" method="POST">
                            @csrf
                            <button form="logout" type="submit" class="px-3 py-1 rounded-lg hover:bg-black/20 dark:hover:bg-white/20 transition-bg duration-300 cursor-pointer">Log Out <i class="fa fa-right-from-bracket pl-1"></i></button>
                        </form>
                    </div>
                </div>


            </nav>
        @endauth

        @guest
            <nav class="mb-10 sm:h-15"></nav>
        @endguest


        <main class="px-5">
            {{ $slot }}
        </main>
    </div>
    
</body>

</html>