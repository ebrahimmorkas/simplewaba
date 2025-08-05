@extends('layouts.app')

@section('content')
<div class="flex h-screen w-screen" x-data="usersPage()">
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
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                    <i class="fas fa-chart-bar w-5 text-gray-400 group-hover:text-white"></i>
                    <span x-show="sidebarOpen" 
                          x-transition:enter="transition ease-out duration-300 delay-75"
                          x-transition:enter-start="opacity-0 transform translate-x-2"
                          x-transition:enter-end="opacity-100 transform translate-x-0"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 transform translate-x-0"
                          x-transition:leave-end="opacity-0 transform translate-x-2"
                          class="text-gray-300 group-hover:text-white">Dashboard</span>
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
                        <div x-show="!sidebarOpen" 
                             class="absolute left-16 bg-gray-800 text-white px-2 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap z-50">
                            Contacts
                        </div>
                    </button>
                    
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
                <a href="{{ route('templates') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                    <i class="fas fa-file-alt w-5 text-gray-400 group-hover:text-white"></i>
                    <span x-show="sidebarOpen" 
                          x-transition:enter="transition ease-out duration-300 delay-75"
                          x-transition:enter-start="opacity-0 transform translate-x-2"
                          x-transition:enter-end="opacity-100 transform translate-x-0"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 transform translate-x-0"
                          x-transition:leave-end="opacity-0 transform translate-x-2"
                          class="text-gray-300 group-hover:text-white">Templates</span>
                    <div x-show="!sidebarOpen" 
                         class="absolute left-16 bg-gray-800 text-white px-2 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap z-50">
                        Templates
                    </div>
                </a>

                <!-- Users - Active -->
                <a href="{{ route('users') }}" class="flex items-center space-x-3 p-3 rounded-lg bg-gradient-to-r from-green-500 to-green-600 text-white shadow-lg group">
                    <i class="fas fa-user w-5"></i>
                    <span x-show="sidebarOpen" 
                          x-transition:enter="transition ease-out duration-300 delay-75"
                          x-transition:enter-start="opacity-0 transform translate-x-2"
                          x-transition:enter-end="opacity-100 transform translate-x-0"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 transform translate-x-0"
                          x-transition:leave-end="opacity-0 transform translate-x-2"
                          class="font-medium">Users</span>
                    <div x-show="!sidebarOpen" 
                         class="absolute left-16 bg-gray-800 text-white px-2 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none whitespace-nowrap z-50">
                        Users
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
                    <button @click="sidebarOpen = !sidebarOpen" 
                            class="p-2 rounded-lg hover:bg-gray-100/50 transition-colors backdrop-blur-sm">
                        <i class="fas fa-bars text-gray-600 text-lg"></i>
                    </button>
                    
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Users</h1>
                        <p class="text-sm text-gray-600">Manage your system users</p>
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
                               placeholder="Search users..." 
                               x-model="searchQuery"
                               @input="filterUsers()"
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
            <!-- Loading State -->
            <div x-show="usersLoading" class="flex justify-center py-8">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-green-500 mb-4"></div>
                <p class="text-gray-500 ml-2">Loading users...</p>
            </div>
            <!-- Error State -->
            <div x-show="usersError && !usersLoading" class="text-center py-8">
                <i class="fas fa-exclamation-triangle text-4xl text-red-300 mb-4"></i>
                <p class="text-red-500 mb-4" x-text="usersError"></p>
                <button @click="fetchUsers()" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                    Try Again
                </button>
            </div>
            <!-- Users Table -->
            <div x-show="!usersLoading && !usersError" class="bg-white/80 backdrop-blur-md rounded-xl shadow-xl border border-white/20">
                <!-- Table Header -->
                <div class="p-6 border-b border-gray-200/50">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                        <h2 class="text-xl font-bold text-gray-900">Users</h2>
                        
                        <!-- Action Buttons -->
                        <div class="flex flex-wrap items-center gap-3">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-search text-gray-400"></i>
                                </div>
                                <input type="text" 
                                       placeholder="Search users..." 
                                       x-model="searchQuery"
                                       @input="filterUsers()"
                                       class="pl-10 pr-4 py-2 bg-white/50 backdrop-blur-sm border border-gray-200/50 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent shadow-sm transition-all">
                            </div>
                            <button @click="openAddUserModal()" 
                                    class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors flex items-center space-x-2">
                                <i class="fas fa-plus"></i>
                                <span>Add User</span>
                            </button>
                        </div>
                    </div>

                    <!-- Entries Selector -->
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mt-4">
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-gray-600">Show</span>
                            <select x-model="entriesPerPage" 
                                    @change="updatePagination()"
                                    class="px-3 py-1 bg-white/50 border border-gray-200/50 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent text-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span class="text-sm text-gray-600">entries</span>
                        </div>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50/50 backdrop-blur-sm border-b border-gray-200/50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mobile</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Type</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white/30 backdrop-blur-sm divide-y divide-gray-200/50">
                            <template x-for="user in paginatedUsers" :key="user.user_id">
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900" x-text="user.name"></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900" x-text="user.email"></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900" x-text="user.mobile"></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900" x-text="user.user_type"></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                                              :class="{
                                                  'bg-green-100 text-green-800': user.status === 'enabled',
                                                  'bg-red-100 text-red-800': user.status === 'disabled'
                                              }"
                                              x-text="user.status"></span>
                                    </td>
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
                                                <button @click="editUser(user)" 
                                                        class="w-full flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100/50 transition-colors">
                                                    <i class="fas fa-edit mr-3 text-gray-400"></i>
                                                    Edit
                                                </button>
                                                <button @click="toggleStatus(user)" 
                                                        class="w-full flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100/50 transition-colors">
                                                    <i class="fas" :class="user.status === 'enabled' ? 'fa-ban' : 'fa-check-circle' mr-3 text-gray-400"></i>
                                                    <span x-text="user.status === 'enabled' ? 'Disable' : 'Enable'"></span>
                                                </button>
                                                <button @click="resetPassword(user)" 
                                                        class="w-full flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100/50 transition-colors">
                                                    <i class="fas fa-key mr-3 text-gray-400"></i>
                                                    Reset Password
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200/50 bg-gray-50/30 backdrop-blur-sm">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Showing <span class="font-medium" x-text="startEntry"></span> to <span class="font-medium" x-text="endEntry"></span> of <span class="font-medium" x-text="filteredUsers.length"></span> results
                        </div>
                        <div class="flex items-center space-x-2">
                            <button @click="previousPage()" 
                                    :disabled="currentPage === 1"
                                    class="px-3 py-2 text-sm font-medium text-gray-500 bg-white/50 backdrop-blur-sm border border-gray-300/50 rounded-lg hover:bg-gray-50/50 disabled:opacity-50 disabled:cursor-not-allowed transition-all">
                                <i class="fas fa-chevron-left mr-1"></i>
                                Previous
                            </button>
                            <span class="px-3 py-2 text-sm font-medium text-gray-700">
                                Page <span x-text="currentPage"></span> of <span x-text="totalPages"></span>
                            </span>
                            <button @click="nextPage()" 
                                    :disabled="currentPage === totalPages"
                                    class="px-3 py-2 text-sm font-medium text-gray-500 bg-white/50 backdrop-blur-sm border border-gray-300/50 rounded-lg hover:bg-gray-50/50 disabled:opacity-50 disabled:cursor-not-allowed transition-all">
                                Next
                                <i class="fas fa-chevron-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add User Modal -->
    <div x-show="addModalOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto" 
         x-cloak>
        
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
                 @click="closeAddModal()"></div>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Add New User</h3>
                        <button @click="closeAddModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <form @submit.prevent="addUser()" class="space-y-4">
                        <div>
                            <label for="add_waba" class="block text-sm font-medium text-gray-700 mb-1">WABA</label>
                            <select id="add_waba"
                                    x-model="addForm.waba"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                <option value="waba 1">waba 1</option>
                                <option value="waba 2">waba 2</option>
                                <option value="waba 3">waba 3</option>
                            </select>
                        </div>
                        <div>
                            <label for="add_name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" 
                                   id="add_name"
                                   x-model="addForm.name"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                   placeholder="Enter user name">
                        </div>
                        <div>
                            <label for="add_email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" 
                                   id="add_email"
                                   x-model="addForm.email"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                   placeholder="Enter email address">
                        </div>
                        <div>
                            <label for="add_mobile" class="block text-sm font-medium text-gray-700 mb-1">Mobile</label>
                            <input type="text" 
                                   id="add_mobile"
                                   x-model="addForm.mobile"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                   placeholder="Enter mobile number">
                        </div>
                        <div>
                            <label for="add_type" class="block text-sm font-medium text-gray-700 mb-1">User Type</label>
                            <select id="add_type"
                                    x-model="addForm.type"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                <option value="agent">Agent</option>
                                <option value="bot">Bot</option>
                            </select>
                        </div>
                        <div>
                            <label for="add_password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" 
                                   id="add_password"
                                   x-model="addForm.password"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                   placeholder="Enter password">
                        </div>
                        <div class="flex justify-end space-x-3 pt-4">
                            <button type="button" 
                                    @click="closeAddModal()"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">
                                Cancel
                            </button>
                            <button type="submit" 
                                    :disabled="saveLoading"
                                    class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                <span x-show="!saveLoading">Add User</span>
                                <span x-show="saveLoading" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Adding...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div x-show="editModalOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto" 
         x-cloak>
        
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
                 @click="closeEditModal()"></div>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Edit User</h3>
                        <button @click="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <form @submit.prevent="saveUser()" class="space-y-4">
                        <div>
                            <label for="edit_name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" 
                                   id="edit_name"
                                   x-model="editForm.name"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                   placeholder="Enter user name">
                        </div>
                        <div>
                            <label for="edit_email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" 
                                   id="edit_email"
                                   x-model="editForm.email"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                   placeholder="Enter email address">
                        </div>
                        <div>
                            <label for="edit_mobile" class="block text-sm font-medium text-gray-700 mb-1">Mobile</label>
                            <input type="text" 
                                   id="edit_mobile"
                                   x-model="editForm.mobile"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                   placeholder="Enter mobile number">
                        </div>
                        <div>
                            <label for="edit_type" class="block text-sm font-medium text-gray-700 mb-1">User Type</label>
                            <select id="edit_type"
                                    x-model="editForm.user_type"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                <option value="Agent">Agent</option>
                                <option value="Bot">Bot</option>
                            </select>
                        </div>
                        <div class="flex justify-end space-x-3 pt-4">
                            <button type="button" 
                                    @click="closeEditModal()"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">
                                Cancel
                            </button>
                            <button type="submit" 
                                    :disabled="saveLoading"
                                    class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                <span x-show="!saveLoading">Save Changes</span>
                                <span x-show="saveLoading" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Saving...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Reset Password Modal -->
    <div x-show="passwordModalOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto" 
         x-cloak>
        
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
                 @click="closePasswordModal()"></div>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Reset Password</h3>
                        <button @click="closePasswordModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <form @submit.prevent="savePassword()" class="space-y-4">
                        <div>
                            <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                            <input type="password" 
                                   id="new_password"
                                   x-model="passwordForm.password"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                   placeholder="Enter new password">
                        </div>
                        <div class="flex justify-end space-x-3 pt-4">
                            <button type="button" 
                                    @click="closePasswordModal()"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">
                                Cancel
                            </button>
                            <button type="submit" 
                                    :disabled="saveLoading"
                                    class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                                <span x-show="!saveLoading">Reset Password</span>
                                <span x-show="saveLoading" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Resetting...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function usersPage() {
    return {
        sidebarOpen: true,
        searchQuery: '',
        entriesPerPage: 10,
        currentPage: 1,
        usersLoading: false,
        usersError: null,
        saveLoading: false,
        users: [],
        filteredUsers: [],
        paginatedUsers: [],
        addModalOpen: false,
        editModalOpen: false,
        passwordModalOpen: false,
        addForm: {
            waba: 'waba 1',
            name: '',
            email: '',
            mobile: '',
            type: 'agent',
            password: ''
        },
        editForm: {
            user_id: null,
            name: '',
            email: '',
            mobile: '',
            user_type: ''
        },
        passwordForm: {
            user_id: null,
            password: ''
        },

        async init() {
            await this.fetchUsers();
        },

        async fetchUsers() {
            try {
                this.usersLoading = true;
                this.usersError = null;

                const token = '{{ session("tickzap_token") ?? "" }}';
                if (!token) {
                    throw new Error('No authentication token provided');
                }

                const response = await fetch('https://api.tickzap.com/api/users', {
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
                    } else {
                        const errorText = await response.text();
                        throw new Error(`HTTP error! status: ${response.status}, message: ${errorText}`);
                    }
                }

                const data = await response.json();
                console.log('Users API Response:', data);

                if (data.success && data.users) {
                    this.users = data.users.map(user => ({
                        user_id: user.user_id,
                        name: user.name,
                        email: user.email,
                        mobile: user.mobile,
                        user_type: user.user_type,
                        status: user.status,
                        waba_id: user.waba_id,
                        created_at: user.created_at
                    }));
                    this.filteredUsers = [...this.users];
                    this.updatePagination();
                } else {
                    throw new Error('Invalid response format: Expected success and users fields');
                }

            } catch (error) {
                console.error('Error fetching users:', error.message);
                this.usersError = error.message || 'Failed to load users. Please try again.';
                if (error.message.includes('Authentication failed')) {
                    window.location.href = '{{ route("login") }}';
                }
            } finally {
                this.usersLoading = false;
            }
        },

        filterUsers() {
            if (this.searchQuery.trim() === '') {
                this.filteredUsers = [...this.users];
            } else {
                const query = this.searchQuery.toLowerCase();
                this.filteredUsers = this.users.filter(user => 
                    user.name.toLowerCase().includes(query) ||
                    user.email.toLowerCase().includes(query) ||
                    user.mobile.toLowerCase().includes(query) ||
                    user.user_type.toLowerCase().includes(query) ||
                    user.status.toLowerCase().includes(query)
                );
            }
            this.currentPage = 1;
            this.updatePagination();
        },

        updatePagination() {
            const start = (this.currentPage - 1) * this.entriesPerPage;
            const end = start + this.entriesPerPage;
            this.paginatedUsers = this.filteredUsers.slice(start, end);
        },

        get totalPages() {
            return Math.ceil(this.filteredUsers.length / this.entriesPerPage);
        },

        get startEntry() {
            return this.filteredUsers.length === 0 ? 0 : (this.currentPage - 1) * this.entriesPerPage + 1;
        },

        get endEntry() {
            const end = this.currentPage * this.entriesPerPage;
            return end > this.filteredUsers.length ? this.filteredUsers.length : end;
        },

        previousPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
                this.updatePagination();
            }
        },

        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
                this.updatePagination();
            }
        },

        openAddUserModal() {
            this.addForm = {
                waba: 'waba 1',
                name: '',
                email: '',
                mobile: '',
                type: 'agent',
                password: ''
            };
            this.addModalOpen = true;
        },

        closeAddModal() {
            this.addModalOpen = false;
            this.saveLoading = false;
        },

        async addUser() {
            try {
                this.saveLoading = true;

                const token = '{{ session("tickzap_token") ?? "" }}';
                if (!token) {
                    throw new Error('No authentication token provided');
                }

                const wabaId = '378243102032704'; // Hardcoded as per API example
                const payload = {
                    waba: this.addForm.waba,
                    name: this.addForm.name,
                    email: this.addForm.email,
                    mobile: this.addForm.mobile,
                    type: this.addForm.type,
                    password: this.addForm.password
                };

                const response = await fetch(`https://api.tickzap.com/api/users/create-user/${wabaId}`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(`Failed to add user: HTTP status ${response.status}, message: ${errorData.message || 'Unknown error'}`);
                }

                const data = await response.json();
                console.log('Add User API Response:', data);

                if (data.success) {
                    await this.fetchUsers();
                    this.closeAddModal();
                    alert(data.message || 'User added successfully!');
                } else {
                    throw new Error(data.message || 'Invalid response format: Expected success field');
                }

            } catch (error) {
                console.error('Error adding user:', error.message);
                alert(error.message || 'Failed to add user. Please try again.');
            } finally {
                this.saveLoading = false;
            }
        },

        editUser(user) {
            this.editForm = {
                user_id: user.user_id,
                name: user.name,
                email: user.email,
                mobile: user.mobile,
                user_type: user.user_type
            };
            this.editModalOpen = true;
        },

        closeEditModal() {
            this.editModalOpen = false;
            this.saveLoading = false;
        },

        async saveUser() {
            try {
                this.saveLoading = true;

                const token = '{{ session("tickzap_token") ?? "" }}';
                if (!token) {
                    throw new Error('No authentication token provided');
                }

                const payload = {
                    name: this.editForm.name,
                    email: this.editForm.email,
                    mobile: this.editForm.mobile,
                    user_type: this.editForm.user_type
                };

                const response = await fetch(`https://api.tickzap.com/api/users/update/${this.editForm.user_id}`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(`Failed to update user: HTTP status ${response.status}, message: ${errorData.message || 'Unknown error'}`);
                }

                const data = await response.json();
                console.log('Update User API Response:', data);

                if (data.success) {
                    await this.fetchUsers();
                    this.closeEditModal();
                    alert(data.message || 'User updated successfully!');
                } else {
                    throw new Error(data.message || 'Invalid response format: Expected success field');
                }

            } catch (error) {
                console.error('Error updating user:', error.message);
                alert(error.message || 'Failed to update user. Please try again.');
            } finally {
                this.saveLoading = false;
            }
        },

        async toggleStatus(user) {
            try {
                this.saveLoading = true;

                const token = '{{ session("tickzap_token") ?? "" }}';
                if (!token) {
                    throw new Error('No authentication token provided');
                }

                const newStatus = user.status === 'enabled' ? 'disabled' : 'enabled';
                const response = await fetch(`https://api.tickzap.com/api/users/toggle-status/${user.user_id}`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ status: newStatus })
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(`Failed to toggle status: HTTP status ${response.status}, message: ${errorData.message || 'Unknown error'}`);
                }

                const data = await response.json();
                console.log('Toggle Status API Response:', data);

                if (data.success) {
                    await this.fetchUsers();
                    alert(data.message || `User ${newStatus} successfully!`);
                } else {
                    throw new Error(data.message || 'Invalid response format: Expected success field');
                }

            } catch (error) {
                console.error('Error toggling status:', error.message);
                alert(error.message || 'Failed to toggle user status. Please try again.');
            } finally {
                this.saveLoading = false;
            }
        },

        resetPassword(user) {
            this.passwordForm = {
                user_id: user.user_id,
                password: ''
            };
            this.passwordModalOpen = true;
        },

        closePasswordModal() {
            this.passwordModalOpen = false;
            this.saveLoading = false;
        },

        async savePassword() {
            try {
                this.saveLoading = true;

                const token = '{{ session("tickzap_token") ?? "" }}';
                if (!token) {
                    throw new Error('No authentication token provided');
                }

                const response = await fetch(`https://api.tickzap.com/api/users/reset-password/${this.passwordForm.user_id}`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ password: this.passwordForm.password })
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(`Failed to reset password: HTTP status ${response.status}, message: ${errorData.message || 'Unknown error'}`);
                }

                const data = await response.json();
                console.log('Reset Password API Response:', data);

                if (data.success) {
                    this.closePasswordModal();
                    alert(data.message || 'Password reset successfully!');
                } else {
                    throw new Error(data.message || 'Invalid response format: Expected success field');
                }

            } catch (error) {
                console.error('Error resetting password:', error.message);
                alert(error.message || 'Failed to reset password. Please try again.');
            } finally {
                this.saveLoading = false;
            }
        }
    }
}
</script>
@endsection