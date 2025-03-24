<!-- layout.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMS Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <!-- Main layout container -->
    <div class=" flex h-screen bg-gray-100">
        <!-- Sidebar navigation -->
        <div class="w-64 bg-white shadow-lg">
            <!-- Logo header -->
            <div class="flex items-center p-4">
                <img src="https://images-platform.99static.com/VjQlwl2IRxelKQzp4tzqY8pD4nY=/500x500/top/smart/99designs-contests-attachments/23/23280/attachment_23280405" alt="AMS Logo" class="w-12 h-17 m-2">
                <div class="text-gray-700 text-2xl font-semibold">AMS</div>
            </div>

            <!-- Navigation Items -->
            <nav class="mt-2">

                <!-- Welcome -->
                <a href="{{ route('home') }}" class="focus:bg-gray-100 flex items-center  text-gray-600 py-3 px-4 hover:bg-gray-100 rounded-lg mx-3   ">



                    <i class="fas fa-user w-6 h-6 mr-3 flex items-center justify-center"></i>
                    <span class="font-medium">Welcome</span>
                </a>

                <!-- Dashboard -->
                <a href="#" class=" focus:bg-gray-100 flex items-center text-gray-600 py-3 px-4 hover:bg-gray-100 rounded-lg mx-3">

                    <i class="fas fa-desktop w-6 h-6 mr-3 flex items-center justify-center"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <!--location-->
                <div class="mx-3 mt-2" id="location-container">

                    <a href="#" class="  focus:bg-gray-100 flex items-center justify-between text-gray-600 py-3 px-4 hover:bg-gray-100 rounded-lg" id="location-toggle">

                        <div class="flex items-center">
                            <i class="ri-map-2-line w-6 h-6 mr-3 flex items-center justify-center"></i>
                            <span class="font-medium">Location</span>
                        </div>
                        <span class="text-sm" id="location-icon">›</span>
                    </a>

                    <!-- Submenu (location) -->
                    <div class="pl-12 pr-4 pb-2 hidden" id="location-submenu">
                        <a href="{{ route('location.list') }}" class=" focus:bg-gray-100 flex items-center text-gray-600 py-2 hover:bg-gray-100 rounded-lg" id="load-list">

                            <div class="h-2 w-2 bg-gray-500 rounded-full mr-3"></div>
                            <span>List</span>
                        </a>
                        <a href="{{route('location.create')}}" class="flex items-center text-gray-600 py-2 hover:bg-gray-100 rounded-lg " id="load-create-form">
                            <div class="h-2 w-2 bg-gray-500 rounded-full mr-3"></div>
                            <span>Create</span>
                        </a>
                    </div>
                </div>

                <!--assets-->
                <div class="mx-3 mt-2" id="assets-container">
                    <a href="#" class=" focus:bg-gray-100 flex items-center justify-between text-gray-600 py-3 px-4 hover:bg-gray-100 rounded-lg" id="assets-toggle">

                        <div class="flex items-center">
                            <i class="fas fa-chart-bar w-6 h-6 mr-3 flex items-center justify-center"></i>
                            <span class="font-medium">Assets</span>
                        </div>
                        <span class="text-sm" id="assets-icon">›</span>
                    </a>



                    <!-- Submenu (asset) -->
                    <div class="pl-12 pr-4 pb-2 hidden" id="assets-submenu">
                        <a href="{{route('assets.list')}}" class="flex items-center text-gray-600 py-2 hover:bg-gray-100 rounded-lg" id="load-asset-list">
                            <div class="h-2 w-2 bg-gray-500 rounded-full mr-3"></div>
                            <span>List</span>
                        </a>
                        <a href="{{route('assets.create')}}" class="flex items-center text-gray-600 py-2 hover:bg-gray-100 rounded-lg " id="load-asset-form">
                            <div class="h-2 w-2 bg-gray-500 rounded-full mr-3"></div>
                            <span>Create</span>
                        </a>
                    </div>
                </div>


                <!-- Issues -->
                <div class="mx-3 mt-2" id="issues-container">
                    <a href="#" class=" focus:bg-gray-100 flex items-center justify-between text-gray-600 py-3 px-4 hover:bg-gray-100 rounded-lg" id="issues-toggle">

                        <div class="flex items-center">
                            <i class="fas fa-exchange-alt w-6 h-6 mr-3 flex items-center justify-center"></i>
                            <span class="font-medium">Issues</span>
                        </div>
                        <span class="text-sm " id="issues-icon">›</span>

                    </a>

                    <!-- Submenu (hidden by default-issues) -->
                    <div class="pl-12 pr-4 pb-2 hidden" id="issues-submenu">
                        <a href="{{route('issues.list')}}" class="flex items-center text-gray-600 py-2 hover:bg-gray-100 rounded-lg " id="load-issue-list">

                            <div class="h-2 w-2 bg-gray-500 rounded-full mr-3"></div>
                            <span>List</span>
                        </a>
                        <a href="{{route('issues.create')}}" class="flex items-center text-gray-600 py-2 hover:bg-gray-100 rounded-lg" id="load-issue-form">

                            <div class="h-2 w-2 bg-gray-500 rounded-full mr-3"></div>
                            <span>Create</span>
                        </a>
                    </div>
                </div>

                <!-- User -->
                <div class="mx-3 mt-2" id="user-container">
                    <a href="#" class=" focus:bg-gray-100 flex items-center justify-between text-gray-600 py-3 px-4 hover:bg-gray-100 rounded-lg" id="user-toggle">

                        <div class="flex items-center">
                            <i class="fas fa-file-invoice w-6 h-6 mr-3 flex items-center justify-center"></i>
                            <span class="font-medium">User</span>
                        </div>
                        <span class="text-sm" id="user-icon">›</span>
                    </a>

                    <!-- Submenu (hidden by default) -->
                    <div class="pl-12 pr-4 pb-2 hidden" id="user-submenu">
                        <a href="{{route('user.list')}}" class="flex items-center text-gray-600 py-2 hover:bg-gray-100 rounded-lg" id="load-user-list">
                            <div class="h-2 w-2 bg-gray-500 rounded-full mr-3"></div>
                            <span>List</span>
                        </a>
                        <a href="{{route('home')}}" class="flex items-center text-gray-600 py-2 hover:bg-gray-100 rounded-lg">
                            <div class="h-2 w-2 bg-gray-500 rounded-full mr-3"></div>
                            <span>Create</span>
                        </a>
                    </div>
                </div>

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

        <!-- Header -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between p-4">
                    <div class="flex items-center">
                        <span class="text-gray-400 mr-2">«</span>
                        <span class="text-gray-600">Welcome</span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">Dashboard</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <button class="text-white rounded bg-blue-500 px-2 py-1"> <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                Logout
                            </a></button>


                    </div>
                </div>
            </header>

            <!-- Content area-$slot-->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                <div class="max-w-9xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
                    <div id="content-container" class="p-6">
                        @include('layouts.flash_msg')

                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        // Toggle submenu on clicking "location"
        document.getElementById('location-toggle').addEventListener('click', function(e) {
            e.preventDefault();
            const submenu = document.getElementById('location-submenu');
            const icon = document.getElementById('location-icon');
            submenu.classList.toggle('hidden');
            icon.textContent = submenu.classList.contains('hidden') ? '›' : '⌄';
        });

        // Toggle submenu on clicking "location"
        document.getElementById('assets-toggle').addEventListener('click', function(e) {
            e.preventDefault();
            const submenu = document.getElementById('assets-submenu');
            const icon = document.getElementById('assets-icon');
            submenu.classList.toggle('hidden');
            icon.textContent = submenu.classList.contains('hidden') ? '›' : '⌄';
        });


        // Toggle submenu on clicking "issues"
        document.getElementById('issues-toggle').addEventListener('click', function(e) {
            e.preventDefault();
            const submenu = document.getElementById('issues-submenu');
            const icon = document.getElementById('issues-icon');
            submenu.classList.toggle('hidden');
            icon.textContent = submenu.classList.contains('hidden') ? '›' : '⌄';

        });

        // Toggle submenu on clicking "user"
        document.getElementById('user-toggle').addEventListener('click', function(e) {
            e.preventDefault();
            const submenu = document.getElementById('user-submenu');
            const icon = document.getElementById('user-icon');
            submenu.classList.toggle('hidden');
            icon.textContent = submenu.classList.contains('hidden') ? '›' : '⌄';
        });

    </script>
</body>

</html>
