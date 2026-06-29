<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - ZoneGames</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <aside class="bg-black text-white w-64 flex-shrink-0 hidden md:block">
            <div class="p-4 border-b border-gray-700">
                <h2 class="text-xl font-bold text-[#EE626B]">Zone Admin</h2>
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#EE626B] transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#EE626B]' : '' }}">
                    <i class="fa-solid fa-chart-pie"></i> Dashboard
                </a>
                <a href="{{ route('admin.orders') }}" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#EE626B] transition {{ request()->routeIs('admin.orders*') ? 'bg-[#EE626B]' : '' }}">
                    <i class="fa-solid fa-truck"></i> Orders
                </a>
                <a href="{{ route('admin.customers') }}" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#EE626B] transition {{ request()->routeIs('admin.customers') ? 'bg-[#EE626B]' : '' }}">
                    <i class="fa-solid fa-users"></i> Customers
                </a>
                <a href="{{ route('admin.promotions') }}" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#EE626B] transition {{ request()->routeIs('admin.promotions') ? 'bg-[#EE626B]' : '' }}">
                    <i class="fa-solid fa-tag"></i> Promotions
                </a>
                <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-[#EE626B] transition {{ request()->routeIs('admin.profile') ? 'bg-[#EE626B]' : '' }}">
                    <i class="fa-solid fa-user-cog"></i> Profile
                </a>
                <hr class="border-gray-700 my-4">
                <a href="{{ route('modifie') }}" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-gray-700 transition">
                    <i class="fa-solid fa-gamepad"></i> Games
                </a>
                <a href="{{ route('admin.login.logout') }}" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-red-600 transition">
                    <i class="fa-solid fa-sign-out-alt"></i> Logout
                </a>
            </nav>
        </aside>
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold">@yield('title', 'Dashboard')</h1>
                <span class="text-gray-600">{{ Auth::guard('admin')->user()->nom }}</span>
            </header>
            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
