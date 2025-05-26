<!-- layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AMS Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    {{-- scripts of daterangepicker --}}
    <script src="//cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script>
        tailwind.config = {
            darkMode: 'class', // Enable dark mode via class strategy
        }

    </script>
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }

    </script>


    <link rel="stylesheet" href="https://fontawesome.com/icons/arrow-left?f=classic&s=regular">
    {{-- daterangepicker --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">

</head>

<body>



    <!-- Main layout container -->
    <div class=" flex h-screen bg-gray-100">

        <!-- Sidebar navigation -->
        <div class="w-64 bg-white shadow-lg dark:bg-gray-700 dark:text-white" id="sidebar">



            <!-- Logo header -->
            <div class="flex items-center p-4">
                <img src="https://images-platform.99static.com/VjQlwl2IRxelKQzp4tzqY8pD4nY=/500x500/top/smart/99designs-contests-attachments/23/23280/attachment_23280405" alt="AMS Logo" class="w-12 h-17 m-2">
                <div class="text-gray-700 text-2xl font-semibold dark:text-blue-400">AMS</div>
            </div>

            <!------------Navigation Items ---------------------->
            <nav class="mt-2">

                <!----------------- Welcome ------------>
                <div>
                    {{-- <div class="group {{ request()->routeIs('home') ? 'bg-blue-300 rounded-lg mx-3' : '' }} "> --}}


                    <a href="{{ route('home') }}" onclick="selectMenu(this)" class="dark:hover:bg-blue-500 dark:focus:bg-blue-500 focus:bg-gray-100 flex items-center  text-gray-600 py-1 px-2 hover:bg-gray-100 rounded-lg mx-3 {{ request()->is('home.*') ? 'bg-gray-400 text-gray-800 font-semibold' : 'text-gray-600' }}  ">
                        <i class="fas fa-user w-6 h-6 mr-3 dark:text-white flex items-center justify-center"></i>

                        <span class="font-semibold dark:text-white">Welcome</span>
                    </a>
                </div>

                <!------------Dashboard -------------------->

                <div class="group {{ request()->routeIs('dashboard') ? 'bg-blue-300 rounded-lg mx-3' : '' }} ">



                    <a href="{{route('dashboard.index')}}" onclick="selectMenu(this)" class=" dark:hover:bg-blue-500 dark:focus:bg-blue-500 focus:bg-gray-100 flex items-center text-gray-600 py-1 px-2 hover:bg-gray-100 rounded-lg mx-3 mt-3.5">
                        <i class="fas fa-desktop w-6 h-6 mr-3 dark:text-white
                        flex items-center justify-center"></i>

                        <span class="font-semibold dark:text-white">Dashboard</span>
                    </a>
                </div>

                <!-------------location-------------------->

                <div class="mx-3 mt-4 {{ request()->routeIs('location*') ? 'block' : '' }} " id="location-container">

                    <div class="group">
                        <a href="{{ route('location.list') }}" onclick="selectMenu(this)" class=" dark:hover:bg-blue-500 dark:focus:bg-blue-500

                        group-selected:bg-gray-200 group-selected:text-gray-800 flex items-center justify-between text-gray-600 py-1 px-2 hover:bg-gray-100 rounded-lg {{ request()->routeIs('location.*') ? 'bg-blue-300 text-gray-800 font-semibold' : 'text-gray-600' }}" id="location-toggle">


                            <div class="flex items-center">

                                <i class="ri-map-2-line w-6 h-6 mr-2 dark:text-white
                                flex items-center justify-center"></i>

                                <span class="font-semibold dark:text-white space-y-2">Location</span>
                            </div>

                            {{-- <span class="text-sm dark:text-white transform transition-transform duration-200
        {{ request()->routeIs('location*') ? '' : '' }}" id="location-icon">›</span> --}}

                        </a>
                    </div>
                </div>

                <!--------------- Submenu (location) ------------------>

                {{-- <div class="pl-12 pr-4 pb-2 mt-2 {{ request()->is('location*') ? 'block' : 'hidden' }} " id="location-submenu"> --}}


                {{-- <a href="{{ route('location.list') }}" class="dark:hover:bg-blue-500 focus:bg-gray-100 flex items-center text-gray-600 py-1 px-3 hover:bg-gray-100 rounded-lg {{ request()->routeIs('location.list') ? 'bg-gray-200 text-gray-800 font-semibold' : 'text-gray-600' }}" id="load-list">

                <div class="h-2 w-2 bg-gray-500 rounded-full mr-3 dark:text:white"></div>
                <span class="dark:text-white">List</span>
                </a>

                <a href="{{ route('location.create') }}" class="dark:hover:bg-blue-500 flex items-center mt-2 text-gray-600 py-1 px-2 hover:bg-gray-100 rounded-lg  {{ request()->routeIs('location.create') ? 'bg-gray-200 text-gray-800 font-semibold' : 'text-gray-600' }}" id="load-create-form">

                    <div class="h-2 w-2 bg-gray-500 rounded-full mr-3 dark:text-white"></div>
                    <span class="dark:text-white">Create</span>
                </a>
        </div> --}}


        <!----------------assets--------------->

        <div class="mx-3 mt-4  {{ request()->routeIs('assets*') ? 'block' : '' }} " id=" assets-container">


            <div class="group">
                <a href="{{ route('assets.list') }}" onclick="selectMenu(this)" class="dark:hover:bg-blue-500 dark:focus:bg-blue-500 focus:bg-gray-100 flex items-center justify-between text-gray-600 py-1 px-2 hover:bg-gray-100 rounded-lg {{ request()->routeIs('assets*') ? 'bg-blue-300 text-gray-800 font-semibold' : 'text-gray-600' }}" id="assets-toggle">


                    <div class="flex items-center">
                        <i class="fas fa-chart-bar w-6 h-6  dark:text-white  flex items-center justify-center"></i>

                        <span class="font-semibold dark:text-white ml-1.5">Assets</span>
                    </div>
                    {{-- <span class="text-sm dark:text-white {{ request()->routeIs('assets*') ? '' : '' }}" id="assets-icon">›</span> --}}

                </a>
            </div>
        </div>

        <!------------Submenu (asset)-------------------->

        {{-- <div class="pl-12 pr-4 pb-2 mt-2 {{ request()->routeIs('assets*') ? 'block' : 'hidden' }}" id="assets-submenu">


        <a href="{{ route('assets.list') }}" class="dark:hover:bg-blue-500 flex items-center text-gray-600 py-1 px-2 hover:bg-gray-100 rounded-lg {{ request()->routeIs('assets.list') ? 'bg-gray-200 text-gray-800 font-semibold' : 'text-gray-600' }}" id="load-asset-list">

            <div class="h-2 w-2 bg-gray-500 rounded-full mr-3 dark:text-white"></div>
            <span class="dark:text-white">List</span>
        </a>

        <a href="{{ route('assets.create') }}" class="dark:hover:bg-blue-500 flex items-center text-gray-600 py-1 px-2 hover:bg-gray-100 rounded-lg {{ request()->routeIs('assets.create') ? 'bg-gray-200 text-gray-800 font-semibold' : 'text-gray-600' }}" id="load-asset-form">

            <div class="h-2 w-2 bg-gray-500 rounded-full mr-3 dark:text-white"></div>
            <span class="dark:text-white">Create</span>
        </a>
    </div> --}}


    <!------------ Issues ------------------->

    <div class="mx-3 mt-4  {{ request()->routeIs('issues*') ? 'block' : '' }} " id=" issues-container">


        <div class="group">
            <a href="{{ route('issues.list') }}" onclick="selectMenu(this)" class=" dark:hover:bg-blue-500 dark:focus:bg-blue-500 focus:bg-gray-100 flex items-center justify-between text-gray-600 py-1 px-2 hover:bg-gray-100 rounded-lg {{ request()->routeIs('issues.*') ? 'bg-blue-300 text-gray-800 font-semibold' : 'text-gray-600' }}" id="issues-toggle">



                <div class="flex items-center">
                    <i class="fas fa-exchange-alt w-6 h-6  dark:text-white flex items-center justify-center"></i>

                    <span class="font-semibold dark:text-white ml-1.5">Issues</span>
                </div>
                {{-- <span class="text-sm dark:text-white {{ request()->routeIs('issues*') ? '' : '' }}" id="issues-icon">›</span> --}}


            </a>
        </div>
    </div>


    <!------------ Submenu (issues) -------------->

    {{-- <div class="pl-12 pr-4 pb-2 mt-2 {{ request()->routeIs('issues.*') ? 'block' : 'hidden' }}" id="issues-submenu">



    <a href="{{ route('issues.list') }}" class="dark:hover:bg-blue-500 flex items-center text-gray-600 py-1 px-2 hover:bg-gray-100 rounded-lg {{ request()->routeIs('issues.list') ? 'bg-gray-200 text-gray-800 font-semibold' : 'text-gray-600' }}" id="load-issue-list">

        <div class="h-2 w-2 bg-gray-500 rounded-full mr-3 dark:text-white"></div>

        <span class="dark:text-white">List</span>
    </a>

    <a href="{{ route('issues.create') }}" class="dark:hover:bg-blue-500 flex items-center text-gray-600 py-1 px-2 hover:bg-gray-100 rounded-lg {{ request()->routeIs('issues.create') ? 'bg-gray-200 text-gray-800 font-semibold' : 'text-gray-600' }}" id="load-issue-form">

        <div class="h-2 w-2 bg-gray-500 rounded-full mr-3 dark:text-white"></div>
        <span class="dark:text-white">Create</span>
    </a>
    </div> --}}

    <!--------------- User ------------------->

    <div class="mx-3 mt-4  {{ request()->routeIs('user*') ? 'block' : '' }}" id="user-container">


        <div class="group">

            <a href="{{ route('user.list') }}" onclick="selectMenu(this)" class="focus:bg-gray-100 flex items-center justify-between text-gray-600 py-1 px-2 hover:bg-gray-100 rounded-lg {{ request()->is('user*') ? 'bg-blue-300 text-gray-800 font-semibold' : 'text-gray-600' }}" id="user-toggle">


                <div class="flex items-center ">
                    <i class="fas fa-file-invoice w-6 h-6 flex items-center justify-center dark:text-white"></i>

                    <span class="font-semibold dark:text-white ml-1.5">User</span>
                </div>
                {{-- <span class="text-sm dark:text-white {{ request()->is('user*') ? '' : '' }}" id="user-icon">›</span> --}}

            </a>
        </div>
    </div>


    <!-------------- Submenu (user) --------------->

    {{-- <div class="pl-12 pr-4 pb-2 mt-2 {{ request()->is('user*') ? 'block' : 'hidden' }}" id="user-submenu">

    <a href="{{ route('user.list') }}" class=" dark:hover:bg-blue-500  flex items-center text-gray-600 py-1 px-2 hover:bg-gray-100 rounded-lg {{ request()->routeIs('user.list') ? 'bg-gray-200 text-gray-800 font-semibold' : 'text-gray-600' }}" id="load-user-list">

        <div class="h-2 w-2 bg-gray-500 rounded-full mr-3"></div>
        <span class="dark:text-white">List</span>
    </a>

    <a href="{{ route('home') }}" class="dark:hover:bg-blue-500 flex items-center text-gray-600 py-1 px-2 hover:bg-gray-100 rounded-lg">

        <div class="h-2 w-2 bg-gray-500 rounded-full mr-3"></div>
        <span class="dark:text-white">Create</span>
    </a>
    </div>--}}

    <!-- Chat -->
    {{-- <a href="#"
                    class="flex items-center justify-between text-gray-600 py-3 px-4 hover:bg-gray-100 rounded-lg mx-3">
                    <div class="flex items-center">
                        <i class="fas fa-cog w-6 h-6 mr-3 flex items-center justify-center"></i>
                        <span class="font-medium">Chat</span>
                    </div>
                    <span class="text-sm">›</span>
                </a> --}}
    </nav>
    </div>

    <!--------------- Header -------------->

    <div class="flex-1 flex flex-col overflow-hidden">

        <!---------- Top navigation --------->

        <header class="bg-white shadow-sm dark:bg-gray-700">

            <div class="flex items-center justify-between p-4">
                <div class="flex items-center">

                    <button type="button" class="toggle" id="toggle">
                        <i class="ri-arrow-left-double-fill"></i>
                        <span></span>
                    </button>

                    {{-- <span class="text-gray-400 mr-2">«</span> --}}

                    <span class="text-gray-600 dark:text-white">Welcome</span>
                </div>

                {{------------ dark mode and logout ------------------- --}}

                <div class="flex items-center space-x-4">
                    <button onclick="toggleDarkMode()" class="hover:bg-gray-200 dark:bg-gray-700 dark:text-white p-2 rounded border-2 px-2 ">

                        <i class="ri-moon-line"></i>
                    </button>
                    {{-- <span class="text-gray-600 dark:text-white">Dashboard</span> --}}

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <button class="text-white rounded bg-blue-500 px-2 py-1"> <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></button>

                </div>
            </div>
        </header>

        <!---------------- Content area-$slot---------------->

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-800 p-6">
            <div class="max-w-9xl mx-auto bg-white dark:bg-gray-700 dark:text-white rounded-lg shadow-md overflow-hidden">

                <div id="content-container" class="p-6  dark:text-white">

                    @include('layouts.flash_msg')

                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    </div>
    </div>
</body>

<script>
    // Toggle submenu on clicking "location"

    /* document.getElementById('location-toggle').addEventListener('click', function(e) {
        e.preventDefault();
        const submenu = document.getElementById('location-submenu');
        const icon = document.getElementById('location-icon');
        submenu.classList.toggle('hidden');
        icon.textContent = submenu.classList.contains('hidden') ? '›' : '⌄';
    }); */

    // Toggle submenu on clicking "asset"

    /*document.getElementById('assets-toggle').addEventListener('click', function(e) {
        e.preventDefault();
        const submenu = document.getElementById('assets-submenu');
        const icon = document.getElementById('assets-icon');
        submenu.classList.toggle('hidden');
        icon.textContent = submenu.classList.contains('hidden') ? '›' : '⌄';
    });*/

    // Add this right after your existing toggle event listener
    /*document.getElementById('assets-toggle').addEventListener('click', function(e) {
        // Store that the assets menu was clicked
        sessionStorage.setItem("menu_clicked", "assets");
    });*/

    // Toggle submenu on clicking "issues"

    /*document.getElementById('issues-toggle').addEventListener('click', function(e) {
        e.preventDefault();
        const submenu = document.getElementById('issues-submenu');
        const icon = document.getElementById('issues-icon');
        submenu.classList.toggle('hidden');
        icon.textContent = submenu.classList.contains('hidden') ? '›' : '⌄';

    });*/

    // Toggle submenu on clicking "user"

    /*document.getElementById('user-toggle').addEventListener('click', function(e) {
        e.preventDefault();
        const submenu = document.getElementById('user-submenu');
        const icon = document.getElementById('user-icon');
        submenu.classList.toggle('hidden');
        icon.textContent = submenu.classList.contains('hidden') ? '›' : '⌄';
    });*/

    //focus function
    function selectMenu(selected) {
        document.querySelectorAll(".group-selected").forEach(item => {
            item.classList.remove("group-selected", "bg-gray-200", "text-gray-800");
        });
        selected.classList.add("group-selected", "bg-gray-200", "text-gray-800");
    }

    //dark mode function

    function toggleDarkMode() {
        document.documentElement.classList.toggle('dark');

        // Optional: Store user preference
        if (document.documentElement.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    }

    //sidebar toggle
    var btn = document.querySelector('.toggle');
    var btnst = true;
    btn.onclick = function() {
        if (btnst == true) {
            document.querySelector('.toggle span').classList.add('toggle');
            document.getElementById('sidebar').classList.add('sidebarshow');
            btnst = false;
        } else if (btnst == false) {
            document.querySelector('.toggle span').classList.remove('toggle');
            document.getElementById('sidebar').classList.remove('sidebarshow');
            btnst = true;
        }


    }

</script>

</html>
