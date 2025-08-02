@extends('layouts.app')

@section('content')
<div class="flex h-screen w-screen" x-data="dashboardPage()">
    <!-- Sidebar -->
    <div :class="sidebarOpen ? 'w-64' : 'w-16'" 
         class="bg-gradient-to-b from-gray-900 to-gray-800 text-white transition-all duration-300 ease-in-out shadow-2xl relative z-30">
        
        <!-- Logo Section -->
        <div class="flex items-center justify-between p-4 border-b border-gray-700">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-r from-green-400 to-green-600 rounded-lg flex items-center justify-center shadow-lg">
                    <span class="text-white font-bold text-lg">T</span>
                </div>
                <span x-show="sidebarOpen" 
                      x-transition:enter="transition ease-out duration-300"
                      x-transition:enter-start="opacity-0 transform scale-95"
                      x-transition:enter-end="opacity-100 transform scale-100"
                      x-transition:leave="transition ease-in duration-200"
                      x-transition:leave-start="opacity-100 transform scale-100"
                      x-transition:leave-end="opacity-0 transform scale-95"
                      class="font-bold text-xl text-white">TickZap</span>
            </div>
            <button @click="sidebarOpen = !sidebarOpen" 
                    x-show="sidebarOpen"
                    class="p-2 rounded-lg hover:bg-gray-700 transition-colors">
                <i class="fas fa-times text-gray-300"></i>
            </button>
        </div>

        <!-- Navigation Menu -->
        <nav class="mt-6" x-data="{ contactsOpen: false }">
            <div class="px-4 space-y-2">
                <!-- Dashboard - Active -->
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg bg-gradient-to-r from-green-500 to-green-600 text-white shadow-lg group">
                    <i class="fas fa-chart-bar w-5"></i>
                    <span x-show="sidebarOpen" 
                          x-transition:enter="transition ease-out duration-300 delay-75"
                          x-transition:enter-start="opacity-0 transform translate-x-2"
                          x-transition:enter-end="opacity-100 transform translate-x-0"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 transform translate-x-0"
                          x-transition:leave-end="opacity-0 transform translate-x-2"
                          class="font-medium">Dashboard</span>
                    <!-- Tooltip for collapsed state -->
                    <div x-show="!sidebarOpen" 
                         class="absolute left-16 bg-gray-800 text-white px-2 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap z-50">
                        Dashboard
                    </div>
                </a>
                
                <!-- Messages -->
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                    <i class="fas fa-comments w-5 text-gray-400 group-hover:text-white"></i>
                    <span x-show="sidebarOpen" 
                          x-transition:enter="transition ease-out duration-300 delay-75"
                          x-transition:enter-start="opacity-0 transform translate-x-2"
                          x-transition:enter-end="opacity-100 transform translate-x-0"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 transform translate-x-0"
                          x-transition:leave-end="opacity-0 transform translate-x-2"
                          class="text-gray-300 group-hover:text-white">Messages</span>
                    <!-- Tooltip for collapsed state -->
                    <div x-show="!sidebarOpen" 
                         class="absolute left-16 bg-gray-800 text-white px-2 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap z-50">
                        Messages
                    </div>
                </a>
                
                <!-- Contacts with Dropdown -->
                <div class="relative">
                    <button @click="contactsOpen = !contactsOpen" 
                            class="w-full flex items-center justify-between space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-users w-5 text-gray-400 group-hover:text-white"></i>
                            <span x-show="sidebarOpen" 
                                  x-transition:enter="transition ease-out duration-300 delay-75"
                                  x-transition:enter-start="opacity-0 transform translate-x-2"
                                  x-transition:enter-end="opacity-100 transform translate-x-0"
                                  x-transition:leave="transition ease-in duration-200"
                                  x-transition:leave-start="opacity-100 transform translate-x-0"
                                  x-transition:leave-end="opacity-0 transform translate-x-2"
                                  class="text-gray-300 group-hover:text-white">Contacts</span>
                        </div>
                        <i x-show="sidebarOpen" 
                           :class="contactsOpen ? 'rotate-180' : ''" 
                           class="fas fa-chevron-down text-gray-400 group-hover:text-white transition-transform duration-200"></i>
                        
                        <!-- Tooltip for collapsed state -->
                        <div x-show="!sidebarOpen" 
                             class="absolute left-16 bg-gray-800 text-white px-2 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap z-50">
                            Contacts
                        </div>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div x-show="contactsOpen && sidebarOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="ml-4 mt-2 space-y-1">
                        <a href="{{ route('contacts') }}" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-600 transition-colors group">
                            <i class="fas fa-user w-4 text-gray-400 group-hover:text-white"></i>
                            <span class="text-gray-300 group-hover:text-white text-sm">Contacts</span>
                        </a>
                        <a href="{{ route('groups') }}" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-600 transition-colors group">
                            <i class="fas fa-users w-4 text-gray-400 group-hover:text-white"></i>
                            <span class="text-gray-300 group-hover:text-white text-sm">Groups</span>
                        </a>
                        <a href="{{ route('tags') }}" class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-600 transition-colors group">
                            <i class="fas fa-tags w-4 text-gray-400 group-hover:text-white"></i>
                            <span class="text-gray-300 group-hover:text-white text-sm">Tags/Segments</span>
                        </a>
                    </div>
                </div>
                
                <!-- Templates -->
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                    <i class="fas fa-file-alt w-5 text-gray-400 group-hover:text-white"></i>
                    <span x-show="sidebarOpen" 
                          x-transition:enter="transition ease-out duration-300 delay-75"
                          x-transition:enter-start="opacity-0 transform translate-x-2"
                          x-transition:enter-end="opacity-100 transform translate-x-0"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 transform translate-x-0"
                          x-transition:leave-end="opacity-0 transform translate-x-2"
                          class="text-gray-300 group-hover:text-white">Templates</span>
                    <!-- Tooltip for collapsed state -->
                    <div x-show="!sidebarOpen" 
                         class="absolute left-16 bg-gray-800 text-white px-2 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap z-50">
                        Templates
                    </div>
                </a>
                
                <!-- Sent Messages -->
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                    <i class="fas fa-paper-plane w-5 text-gray-400 group-hover:text-white"></i>
                    <span x-show="sidebarOpen" 
                          x-transition:enter="transition ease-out duration-300 delay-75"
                          x-transition:enter-start="opacity-0 transform translate-x-2"
                          x-transition:enter-end="opacity-100 transform translate-x-0"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 transform translate-x-0"
                          x-transition:leave-end="opacity-0 transform translate-x-2"
                          class="text-gray-300 group-hover:text-white">Sent Messages</span>
                    <!-- Tooltip for collapsed state -->
                    <div x-show="!sidebarOpen" 
                         class="absolute left-16 bg-gray-800 text-white px-2 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap z-50">
                        Sent Messages
                    </div>
                </a>
                
                <!-- Inbox -->
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                    <i class="fas fa-inbox w-5 text-gray-400 group-hover:text-white"></i>
                    <span x-show="sidebarOpen" 
                          x-transition:enter="transition ease-out duration-300 delay-75"
                          x-transition:enter-start="opacity-0 transform translate-x-2"
                          x-transition:enter-end="opacity-100 transform translate-x-0"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 transform translate-x-0"
                          x-transition:leave-end="opacity-0 transform translate-x-2"
                          class="text-gray-300 group-hover:text-white">Inbox</span>
                    <!-- Tooltip for collapsed state -->
                    <div x-show="!sidebarOpen" 
                         class="absolute left-16 bg-gray-800 text-white px-2 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap z-50">
                        Inbox
                    </div>
                </a>
                
                <!-- Reports -->
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                    <i class="fas fa-chart-line w-5 text-gray-400 group-hover:text-white"></i>
                    <span x-show="sidebarOpen" 
                          x-transition:enter="transition ease-out duration-300 delay-75"
                          x-transition:enter-start="opacity-0 transform translate-x-2"
                          x-transition:enter-end="opacity-100 transform translate-x-0"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 transform translate-x-0"
                          x-transition:leave-end="opacity-0 transform translate-x-2"
                          class="text-gray-300 group-hover:text-white">Reports</span>
                    <!-- Tooltip for collapsed state -->
                    <div x-show="!sidebarOpen" 
                         class="absolute left-16 bg-gray-800 text-white px-2 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap z-50">
                        Reports
                    </div>
                </a>
                
                <!-- Settings -->
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                    <i class="fas fa-cog w-5 text-gray-400 group-hover:text-white"></i>
                    <span x-show="sidebarOpen" 
                          x-transition:enter="transition ease-out duration-300 delay-75"
                          x-transition:enter-start="opacity-0 transform translate-x-2"
                          x-transition:enter-end="opacity-100 transform translate-x-0"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 transform translate-x-0"
                          x-transition:leave-end="opacity-0 transform translate-x-2"
                          class="text-gray-300 group-hover:text-white">Settings</span>
                    <!-- Tooltip for collapsed state -->
                    <div x-show="!sidebarOpen" 
                         class="absolute left-16 bg-gray-800 text-white px-2 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap z-50">
                        Settings
                    </div>
                </a>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header with Glass Effect -->
        <header class="sticky top-0 z-20 bg-white/80 backdrop-blur-md border-b border-white/20 shadow-lg">
            <div class="flex items-center justify-between px-6 py-4">
                <!-- Left Section -->
                <div class="flex items-center space-x-4">
                    <!-- Hamburger Menu Button (Always Visible) -->
                    <button @click="sidebarOpen = !sidebarOpen" 
                            class="p-2 rounded-lg hover:bg-gray-100/50 transition-colors backdrop-blur-sm">
                        <i class="fas fa-bars text-gray-600 text-lg"></i>
                    </button>
                    
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
                        <p class="text-sm text-gray-600">Here's what's happening</p>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="flex items-center space-x-4">
                    <!-- Search Bar -->
                    <div class="relative hidden md:block">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" 
                               placeholder="Search..." 
                               class="w-64 pl-10 pr-4 py-2 bg-white/50 backdrop-blur-sm border border-gray-200/50 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent shadow-sm transition-all">
                    </div>

                    <!-- Mobile Search Button -->
                    <button class="md:hidden p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100/50 transition-colors">
                        <i class="fas fa-search"></i>
                    </button>

                    <!-- Notifications -->
                    <div class="relative">
                        <button class="p-2 text-gray-400 hover:text-gray-600 relative rounded-lg hover:bg-gray-100/50 transition-colors">
                            <i class="fas fa-bell text-xl"></i>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center shadow-lg">3</span>
                        </button>
                    </div>

                    <!-- Profile Dropdown -->
                    <div x-data="{ profileOpen: false }" class="relative">
                        <button @click="profileOpen = !profileOpen" 
                                class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100/50 transition-colors backdrop-blur-sm">
                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=22c55e&color=fff" 
                                 alt="Profile" 
                                 class="w-8 h-8 rounded-full shadow-md">
                            <i class="fas fa-chevron-down text-gray-400 text-sm"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="profileOpen" 
                             @click.away="profileOpen = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute right-0 mt-2 w-48 bg-white/90 backdrop-blur-md rounded-lg shadow-xl border border-white/20 py-2 z-50">
                            <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100/50 transition-colors">
                                <i class="fas fa-user mr-3 text-gray-400"></i>
                                Profile
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100/50 transition-colors">
                                <i class="fas fa-credit-card mr-3 text-gray-400"></i>
                                Billing
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100/50 transition-colors">
                                <i class="fas fa-cog mr-3 text-gray-400"></i>
                                Settings
                            </a>
                            <hr class="my-2 border-gray-200/50">
                            <a href="#" class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50/50 transition-colors">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-6 bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="grid grid-cols-1 xl:grid-cols-4 gap-6">
                <!-- Left Side - Stats and Messages (3/4 width) -->
                <div class="xl:col-span-3 space-y-6">
                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Total Messages -->
                        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-blue-100 text-sm font-medium">Total Messages</p>
                                    <p class="text-3xl font-bold">12,345</p>
                                    <p class="text-blue-100 text-sm mt-1">
                                        <span class="text-green-300">+12%</span> from last month
                                    </p>
                                </div>
                                <div class="bg-blue-400 bg-opacity-30 rounded-lg p-3">
                                    <i class="fas fa-comments text-2xl"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Total Sent -->
                        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl p-6 text-white shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-green-100 text-sm font-medium">Total Sent</p>
                                    <p class="text-3xl font-bold">8,234</p>
                                    <p class="text-green-100 text-sm mt-1">
                                        <span class="text-blue-300">+8%</span> from last month
                                    </p>
                                </div>
                                <div class="bg-green-400 bg-opacity-30 rounded-lg p-3">
                                    <i class="fas fa-paper-plane text-2xl"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Total Received -->
                        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-purple-100 text-sm font-medium">Total Received</p>
                                    <p class="text-3xl font-bold">4,111</p>
                                    <p class="text-purple-100 text-sm mt-1">
                                        <span class="text-yellow-300">+15%</span> from last month
                                    </p>
                                </div>
                                <div class="bg-purple-400 bg-opacity-30 rounded-lg p-3">
                                    <i class="fas fa-inbox text-2xl"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Total Templates -->
                        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl p-6 text-white shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-orange-100 text-sm font-medium">Total Templates</p>
                                    <p class="text-3xl font-bold">45</p>
                                    <p class="text-orange-100 text-sm mt-1">
                                        <span class="text-green-300">+3%</span> from last month
                                    </p>
                                </div>
                                <div class="bg-orange-400 bg-opacity-30 rounded-lg p-3">
                                    <i class="fas fa-file-alt text-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Messages Table -->
                    <div class="bg-white/80 backdrop-blur-md rounded-xl shadow-xl border border-white/20">
                        <!-- Table Header -->
                        <div class="p-6 border-b border-gray-200/50">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <h2 class="text-xl font-bold text-gray-900">Messages</h2>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-search text-gray-400"></i>
                                    </div>
                                    <input type="text" 
                                           placeholder="Search messages..." 
                                           class="w-full sm:w-64 pl-10 pr-4 py-2 bg-white/50 backdrop-blur-sm border border-gray-200/50 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent shadow-sm transition-all">
                                </div>
                            </div>
                        </div>

                        <!-- Table Content -->
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50/50 backdrop-blur-sm border-b border-gray-200/50">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Display Sender</th>
                                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Timestamp</th>
                                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sender/Receiver</th>
                                        <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Message Content</th>
                                        <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white/30 backdrop-blur-sm divide-y divide-gray-200/50">
                                    <!-- Sample Row 1 -->
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                                Delivered
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">John Doe</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500 hidden md:table-cell">2024-01-15 10:30 AM</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-gray-900">+1234567890</td>
                                        <td class="px-6 py-4 text-gray-500 hidden lg:table-cell max-w-xs truncate">Hello, how can I help you today?</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <div x-data="{ actionOpen: false }" class="relative">
                                                <button @click="actionOpen = !actionOpen" 
                                                        class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100/50 transition-colors">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </button>
                                                <div x-show="actionOpen" 
                                                     @click.away="actionOpen = false"
                                                     x-transition
                                                     class="absolute right-0 mt-2 w-48 bg-white/90 backdrop-blur-md rounded-lg shadow-xl border border-white/20 py-2 z-10">
                                                    <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100/50 transition-colors">
                                                        <i class="fas fa-eye mr-3 text-gray-400"></i>
                                                        View Details
                                                    </a>
                                                    <a href="#" class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50/50 transition-colors">
                                                        <i class="fas fa-trash mr-3"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Sample Row 2 -->
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                                Sent
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">Jane Smith</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500 hidden md:table-cell">2024-01-15 09:15 AM</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-gray-900">+0987654321</td>
                                        <td class="px-6 py-4 text-gray-500 hidden lg:table-cell max-w-xs truncate">Thank you for your quick response!</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <div x-data="{ actionOpen: false }" class="relative">
                                                <button @click="actionOpen = !actionOpen" 
                                                        class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100/50 transition-colors">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </button>
                                                <div x-show="actionOpen" 
                                                     @click.away="actionOpen = false"
                                                     x-transition
                                                     class="absolute right-0 mt-2 w-48 bg-white/90 backdrop-blur-md rounded-lg shadow-xl border border-white/20 py-2 z-10">
                                                    <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100/50 transition-colors">
                                                        <i class="fas fa-eye mr-3 text-gray-400"></i>
                                                        View Details
                                                    </a>
                                                    <a href="#" class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50/50 transition-colors">
                                                        <i class="fas fa-trash mr-3"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Sample Row 3 -->
                                    <tr class="hover:bg-gray-50/50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                                Failed
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">Mike Johnson</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500 hidden md:table-cell">2024-01-15 08:45 AM</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-mono text-sm text-gray-900">+1122334455</td>
                                        <td class="px-6 py-4 text-gray-500 hidden lg:table-cell max-w-xs truncate">Can you please send me the details?</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right">
                                            <div x-data="{ actionOpen: false }" class="relative">
                                                <button @click="actionOpen = !actionOpen" 
                                                        class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100/50 transition-colors">
                                                    <i class="fas fa-ellipsis-h"></i>
                                                </button>
                                                <div x-show="actionOpen" 
                                                     @click.away="actionOpen = false"
                                                     x-transition
                                                     class="absolute right-0 mt-2 w-48 bg-white/90 backdrop-blur-md rounded-lg shadow-xl border border-white/20 py-2 z-10">
                                                    <a href="#" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100/50 transition-colors">
                                                        <i class="fas fa-eye mr-3 text-gray-400"></i>
                                                        View Details
                                                    </a>
                                                    <a href="#" class="flex items-center px-4 py-2 text-red-600 hover:bg-red-50/50 transition-colors">
                                                        <i class="fas fa-trash mr-3"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="px-6 py-4 border-t border-gray-200/50 bg-gray-50/30 backdrop-blur-sm">
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-gray-700">
                                    Showing <span class="font-medium">1</span> to <span class="font-medium">3</span> of <span class="font-medium">3</span> results
                                </div>
                                <div class="flex items-center space-x-2">
                                    <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white/50 backdrop-blur-sm border border-gray-300/50 rounded-lg hover:bg-gray-50/50 disabled:opacity-50 transition-all" disabled>
                                        <i class="fas fa-chevron-left mr-1"></i>
                                        Previous
                                    </button>
                                    <span class="px-3 py-2 text-sm font-medium text-gray-700">
                                        Page 1 of 1
                                    </span>
                                    <button class="px-3 py-2 text-sm font-medium text-gray-500 bg-white/50 backdrop-blur-sm border border-gray-300/50 rounded-lg hover:bg-gray-50/50 disabled:opacity-50 transition-all" disabled>
                                        Next
                                        <i class="fas fa-chevron-right ml-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Account Overview (1/4 width) -->
                <div class="xl:col-span-1 space-y-6">
                    <!-- WABA Account Selector -->
                    <div class="bg-white/80 backdrop-blur-md rounded-xl shadow-xl border border-white/20 p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Select WABA Account</h3>
                        <div x-data="{ wabaOpen: false }" class="relative">
                            <button @click="wabaOpen = !wabaOpen" 
                                    class="w-full flex items-center justify-between p-3 bg-white/50 border border-gray-200/50 rounded-lg hover:bg-gray-50/50 transition-colors">
                                <span class="text-gray-700" x-text="selectedWaba ? selectedWaba.phone_number_id : 'Select Account'"></span>
                                <i class="fas fa-chevron-down transition-transform duration-200" :class="wabaOpen ? 'rotate-180' : ''"></i>
                            </button>
                            <div x-show="wabaOpen" 
                                 @click.away="wabaOpen = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute z-10 w-full mt-2 bg-white/90 backdrop-blur-md rounded-lg shadow-xl border border-white/20 py-2">
                                <template x-for="waba in wabaAccounts" :key="waba.phone_number_id">
                                    <button @click="selectWaba(waba); wabaOpen = false" 
                                            class="w-full text-left px-4 py-2 hover:bg-gray-100/50 transition-colors">
                                        <span x-text="waba.phone_number_id"></span>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Account Overview -->
                    <div class="bg-white/80 backdrop-blur-md rounded-xl shadow-xl border border-white/20 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-lg font-semibold text-gray-900">Account Overview</h3>
                            <button @click="editProfile()" class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100/50 transition-colors" title="Edit Profile">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>

                        <!-- Loading State -->
                        <div x-show="profileLoading" class="flex flex-col items-center py-8">
                            <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-green-500 mb-4"></div>
                            <p class="text-gray-500">Loading profile...</p>
                        </div>

                        <!-- Error State -->
                        <div x-show="profileError && !profileLoading" class="text-center py-8">
                            <i class="fas fa-exclamation-triangle text-4xl text-red-300 mb-4"></i>
                            <p class="text-red-500 mb-4" x-text="profileError"></p>
                            <button @click="fetchProfile()" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                                Try Again
                            </button>
                        </div>

                        <!-- Profile Content -->
                        <div x-show="!profileLoading && !profileError && profileData" class="space-y-4">
                            <!-- Profile Picture and Name -->
                            <div class="text-center">
                                <img :src="profileData.profile_picture_url || 'https://ui-avatars.com/api/?name=' + encodeURIComponent(profileData.verified_name || 'User') + '&background=22c55e&color=fff'" 
                                     :alt="profileData.verified_name" 
                                     class="w-20 h-20 rounded-full mx-auto mb-4 shadow-lg">
                                <h4 class="text-xl font-bold text-gray-900" x-text="profileData.verified_name || 'N/A'"></h4>
                                <p class="text-gray-600 text-sm mt-1" x-text="profileData.about || 'No description available'"></p>
                            </div>

                            <!-- Contact Information -->
                            <div class="space-y-3 pt-4 border-t border-gray-200/50">
                                <!-- Phone Number -->
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-phone text-green-600 text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wide">Phone Number</p>
                                        <p class="font-medium text-gray-900" x-text="profileData.display_phone_number || 'N/A'"></p>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-envelope text-blue-600 text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wide">Email</p>
                                        <p class="font-medium text-gray-900" x-text="profileData.email || 'N/A'"></p>
                                    </div>
                                </div>

                                <!-- Website -->
                                <div x-show="profileData.websites" class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-globe text-purple-600 text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wide">Website</p>
                                        <a :href="profileData.websites" target="_blank" class="font-medium text-blue-600 hover:text-blue-800 transition-colors" x-text="profileData.websites"></a>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div x-show="profileData.address" class="flex items-start space-x-3">
                                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center mt-1">
                                        <i class="fas fa-map-marker-alt text-orange-600 text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wide">Address</p>
                                        <p class="font-medium text-gray-900 text-sm leading-relaxed" x-text="profileData.address"></p>
                                    </div>
                                </div>

                                <!-- Business Account Status -->
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-check-circle text-green-600 text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wide">Account Status</p>
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full" 
                                              :class="profileData.is_official_business_account ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'"
                                              x-text="profileData.is_official_business_account ? 'Official Business' : 'Standard Account'"></span>
                                    </div>
                                </div>

                                <!-- Messaging Limit -->
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-layer-group text-indigo-600 text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wide">Messaging Tier</p>
                                        <p class="font-medium text-gray-900" x-text="profileData.messaging_limit_tier || 'N/A'"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
function dashboardPage() {
    return {
        sidebarOpen: true,
        profileLoading: true,
        profileError: null,
        profileData: {}, // Initialize as empty object to prevent null errors
        wabaAccounts: [],
        selectedWaba: null,

        async init() {
            await this.initializeWabaAccounts();
            await this.fetchProfile();
        },

        async initializeWabaAccounts() {
            try {
                const phoneNumberId = '{{ session("phone_number_id") ?? "N/A" }}';
                if (phoneNumberId === 'N/A') {
                    console.warn('No phone_number_id found in session');
                    this.profileError = 'No WABA account selected. Please log in again.';
                    return;
                }
                this.wabaAccounts = [{ phone_number_id: phoneNumberId }];
                this.selectedWaba = this.wabaAccounts[0];
                console.log('Initialized WABA accounts:', this.wabaAccounts);
                console.log('Selected WABA:', this.selectedWaba);
            } catch (error) {
                console.error('Error initializing WABA accounts:', error);
                this.profileError = 'Failed to initialize WABA accounts. Please try again.';
            }
        },

        selectWaba(waba) {
            this.selectedWaba = waba;
            console.log('Selected WABA:', waba);
            this.fetchProfile(waba.phone_number_id);
        },

        async fetchProfile(phoneNumberId = null) {
            try {
                this.profileLoading = true;
                this.profileError = null;

                const id = phoneNumberId || '{{ session("phone_number_id") ?? "N/A" }}';
                const token = '{{ session("tickzap_token") ?? "" }}';
                if (!id || id === 'N/A') {
                    throw new Error('No valid phone_number_id provided');
                }
                if (!token) {
                    throw new Error('No authentication token provided');
                }

                console.log('Fetching profile for phone_number_id:', id);
                console.log('Using token:', token);

                const response = await fetch(`https://api.tickzap.com/api/phone-profile/${id}`, {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    if (response.status === 401) {
                        throw new Error('Authentication failed. Please log in again.');
                    } else if (response.status === 404) {
                        throw new Error(`Profile not found for phone_number_id: ${id}`);
                    } else {
                        const errorText = await response.text();
                        throw new Error(`HTTP error! status: ${response.status}, message: ${errorText}`);
                    }
                }

                const data = await response.json();
                console.log('Profile API Response:', data);

                if (data.success && data.data) {
                    this.profileData = {
                        phone_number_id: data.data.phone_number_id || 'N/A',
                        about: data.data.about || 'No description available',
                        address: data.data.address || 'N/A',
                        email: data.data.email || 'N/A',
                        websites: data.data.websites || 'N/A',
                        profile_picture_url: data.data.profile_picture_url || 'https://ui-avatars.com/api/?name=User&background=22c55e&color=fff',
                        verified_name: data.data.verified_name || 'N/A',
                        display_phone_number: data.data.display_phone_number || 'N/A',
                        is_official_business_account: data.data.is_official_business_account || 0,
                        messaging_limit_tier: data.data.messaging_limit_tier || 'N/A'
                    };
                } else {
                    throw new Error('Invalid response format: Expected success and data fields');
                }

            } catch (error) {
                console.error('Error fetching profile:', error.message);
                this.profileError = error.message || 'Failed to load profile. Please try again.';
                if (error.message.includes('Authentication failed')) {
                    window.location.href = '{{ route("login") }}';
                }
            } finally {
                this.profileLoading = false;
            }
        },

        editProfile() {
            // Placeholder for edit functionality
            alert('Edit profile functionality will be implemented soon.');
        }
    }
}
</script>
@endsection
