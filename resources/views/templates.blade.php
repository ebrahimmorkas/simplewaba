@extends('layouts.app')

@section('content')
<div class="flex h-screen w-screen" x-data="templatesPage()">
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
                
                <!-- Templates - Active -->
                <a href="{{ route('templates') }}" class="flex items-center space-x-3 p-3 rounded-lg bg-gradient-to-r from-green-500 to-green-600 text-white shadow-lg group">
                    <i class="fas fa-file-alt w-5"></i>
                    <span x-show="sidebarOpen" 
                          x-transition:enter="transition ease-out duration-300 delay-75"
                          x-transition:enter-start="opacity-0 transform translate-x-2"
                          x-transition:enter-end="opacity-100 transform translate-x-0"
                          x-transition:leave="transition ease-in duration-200"
                          x-transition:leave-start="opacity-100 transform translate-x-0"
                          x-transition:leave-end="opacity-0 transform translate-x-2"
                          class="font-medium">Templates</span>
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
                        <h1 class="text-2xl font-bold text-gray-900">Templates</h1>
                        <p class="text-sm text-gray-600">Manage your WhatsApp message templates</p>
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
                               placeholder="Search templates..." 
                               x-model="searchQuery"
                               @input="filterTemplates()"
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
            <!-- Loading State -->
            <div x-show="templatesLoading" class="flex justify-center py-8">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-green-500 mb-4"></div>
                <p class="text-gray-500 ml-2">Loading templates...</p>
            </div>
            <!-- Error State -->
            <div x-show="templatesError && !templatesLoading" class="text-center py-8">
                <i class="fas fa-exclamation-triangle text-4xl text-red-300 mb-4"></i>
                <p class="text-red-500 mb-4" x-text="templatesError"></p>
                <button @click="fetchTemplates()" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                    Try Again
                </button>
            </div>
            <!-- Templates Table -->
            <div x-show="!templatesLoading && !templatesError" class="bg-white/80 backdrop-blur-md rounded-xl shadow-xl border border-white/20">
                <!-- Table Header -->
                <div class="p-6 border-b border-gray-200/50">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                        <h2 class="text-xl font-bold text-gray-900">All Templates</h2>
                        
                        <!-- Action Buttons -->
                        <div class="flex flex-wrap items-center gap-3">
                            <button @click="refreshTemplates()" 
                                    :disabled="refreshLoading"
                                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors flex items-center space-x-2 disabled:opacity-50 disabled:cursor-not-allowed">
                                <span x-show="!refreshLoading">
                                    <i class="fas fa-sync-alt"></i>
                                    <span>Refresh Templates</span>
                                </span>
                                <span x-show="refreshLoading" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Refreshing...
                                </span>
                            </button>
                            <button @click="createTemplate()" 
                                    class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors flex items-center space-x-2">
                                <i class="fas fa-plus"></i>
                                <span>Create Template</span>
                            </button>
                            <button @click="manageInMeta()" 
                                    class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors flex items-center space-x-2">
                                <i class="fas fa-external-link-alt"></i>
                                <span>Manage in Meta Business</span>
                            </button>
                        </div>
                    </div>

                    <!-- Entries Selector and Search -->
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
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Language</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Created At</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Updated At</th>
                                <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white/30 backdrop-blur-sm divide-y divide-gray-200/50">
                            <template x-for="template in paginatedTemplates" :key="template.id">
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900" x-text="template.name"></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                                              :class="{
                                                  'bg-blue-100 text-blue-800': template.category === 'MARKETING',
                                                  'bg-green-100 text-green-800': template.category === 'UTILITY',
                                                  'bg-gray-100 text-gray-800': template.category === 'AUTHENTICATION'
                                              }"
                                              x-text="template.category"></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900" x-text="template.language"></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                                              :class="{
                                                  'bg-green-100 text-green-800': template.status === 'APPROVED',
                                                  'bg-yellow-100 text-yellow-800': template.status === 'PENDING',
                                                  'bg-red-100 text-red-800': template.status === 'REJECTED'
                                              }"
                                              x-text="template.status"></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500 text-sm hidden md:table-cell" x-text="formatDate(template.created_at)"></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500 text-sm hidden lg:table-cell" x-text="formatDate(template.updated_at)"></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <button @click="editTemplate(template)" 
                                                class="p-2 text-gray-400 hover:text-green-600 rounded-lg hover:bg-gray-100/50 transition-colors"
                                                title="Edit Template">
                                            <i class="fas fa-edit"></i>
                                        </button>
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
                            Showing <span class="font-medium" x-text="startEntry"></span> to <span class="font-medium" x-text="endEntry"></span> of <span class="font-medium" x-text="filteredTemplates.length"></span> results
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

    <!-- Edit Template Modal -->
    <div x-show="editModalOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto" 
         x-cloak>
        
        <!-- Background Overlay -->
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
                 @click="closeEditModal()"></div>

            <!-- Modal Content -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                
                <!-- Modal Header -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Edit Template</h3>
                        <button @click="closeEditModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <!-- Modal Form -->
                    <form @submit.prevent="saveTemplate()" class="space-y-4">
                        <!-- Template Name -->
                        <div>
                            <label for="template_name" class="block text-sm font-medium text-gray-700 mb-1">Template Name</label>
                            <input type="text" 
                                   id="template_name"
                                   x-model="editForm.name"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all"
                                   placeholder="Enter template name">
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <select id="category"
                                    x-model="editForm.category"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                <option value="MARKETING">Marketing</option>
                                <option value="UTILITY">Utility</option>
                                <option value="AUTHENTICATION">Authentication</option>
                            </select>
                        </div>

                        <!-- Language -->
                        <div>
                            <label for="language" class="block text-sm font-medium text-gray-700 mb-1">Language</label>
                            <select id="language"
                                    x-model="editForm.language"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                <option value="en">English</option>
                                <option value="es">Spanish</option>
                                <option value="fr">French</option>
                                <option value="de">German</option>
                                <option value="it">Italian</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select id="status"
                                    x-model="editForm.status"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                <option value="APPROVED">Approved</option>
                                <option value="PENDING">Pending</option>
                                <option value="REJECTED">Rejected</option>
                            </select>
                        </div>

                        <!-- Modal Actions -->
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
</div>

<!-- Hidden input to pass templates data to JavaScript -->
<script type="application/json" id="templates-data">
    @json($templates ?? [])
</script>

<script>
function templatesPage() {
    return {
        sidebarOpen: true,
        searchQuery: '',
        entriesPerPage: 10,
        currentPage: 1,
        editModalOpen: false,
        saveLoading: false,
        templatesLoading: false,
        templatesError: null,
        refreshLoading: false,
        templates: [],
        filteredTemplates: [],
        paginatedTemplates: [],
        editForm: {
            id: null,
            name: '',
            category: '',
            language: '',
            status: ''
        },

        async init() {
            await this.fetchTemplates();
        },

        async fetchTemplates() {
            try {
                this.templatesLoading = true;
                this.templatesError = null;

                const phoneNumberId = '{{ session("phone_number_id") ?? "361462453714220" }}';
                const token = '{{ session("tickzap_token") ?? "" }}';
                if (!token) {
                    throw new Error('No authentication token provided');
                }

                console.log('Fetching templates for phone_number_id:', phoneNumberId);

                const response = await fetch(`https://waba.mpocket.in/api/phone/get/message_templates/${phoneNumberId}?accessToken=${token}`, {
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
                console.log('Templates API Response:', data);

                if (data.data) {
                    this.templates = data.data.map(template => ({
                        id: template.id,
                        name: template.name,
                        category: template.category,
                        language: template.language,
                        status: template.status,
                        created_at: template.created_at,
                        updated_at: template.updated_at
                    }));
                    this.filteredTemplates = [...this.templates];
                    this.updatePagination();
                } else {
                    throw new Error('Invalid response format: Expected data field');
                }

            } catch (error) {
                console.error('Error fetching templates:', error.message);
                this.templatesError = error.message || 'Failed to load templates. Please try again.';
                if (error.message.includes('Authentication failed')) {
                    window.location.href = '{{ route("login") }}';
                }
            } finally {
                this.templatesLoading = false;
            }
        },

        async refreshTemplates() {
            try {
                this.refreshLoading = true;
                this.templatesError = null;

                const phoneNumberId = '{{ session("phone_number_id") ?? "361462453714220" }}';
                const token = '{{ session("tickzap_token") ?? "" }}';
                if (!token) {
                    throw new Error('No authentication token provided');
                }

                console.log('Refreshing templates for phone_number_id:', phoneNumberId);

                const response = await fetch(`https://waba.mpocket.in/api/phone/refresh/message_templates/${phoneNumberId}`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ accessToken: token })
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(`Failed to refresh templates: HTTP status ${response.status}, message: ${errorData.message || 'Unknown error'}`);
                }

                const data = await response.json();
                console.log('Refresh Templates API Response:', data);

                if (data.success) {
                    // Fetch updated templates
                    await this.fetchTemplates();
                    alert(data.message || 'Templates refreshed successfully!');
                } else {
                    throw new Error(data.message || 'Invalid response format: Expected success field');
                }

            } catch (error) {
                console.error('Error refreshing templates:', error.message);
                this.templatesError = error.message || 'Failed to refresh templates. Please try again.';
                alert(this.templatesError);
            } finally {
                this.refreshLoading = false;
            }
        },

        filterTemplates() {
            if (this.searchQuery.trim() === '') {
                this.filteredTemplates = [...this.templates];
            } else {
                const query = this.searchQuery.toLowerCase();
                this.filteredTemplates = this.templates.filter(template => 
                    template.name.toLowerCase().includes(query) ||
                    template.category.toLowerCase().includes(query) ||
                    template.language.toLowerCase().includes(query) ||
                    template.status.toLowerCase().includes(query)
                );
            }
            this.currentPage = 1;
            this.updatePagination();
        },

        updatePagination() {
            const start = (this.currentPage - 1) * this.entriesPerPage;
            const end = start + this.entriesPerPage;
            this.paginatedTemplates = this.filteredTemplates.slice(start, end);
        },

        get totalPages() {
            return Math.ceil(this.filteredTemplates.length / this.entriesPerPage);
        },

        get startEntry() {
            return this.filteredTemplates.length === 0 ? 0 : (this.currentPage - 1) * this.entriesPerPage + 1;
        },

        get endEntry() {
            const end = this.currentPage * this.entriesPerPage;
            return end > this.filteredTemplates.length ? this.filteredTemplates.length : end;
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

        formatDate(dateString) {
            if (!dateString) return 'N/A';
            return new Date(dateString).toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        },

        createTemplate() {
            alert('Create template functionality will be implemented soon.');
        },

        manageInMeta() {
            alert('Redirecting to Meta Business Manager...');
        },

        editTemplate(template) {
            this.editForm = {
                id: template.id,
                name: template.name,
                category: template.category,
                language: template.language,
                status: template.status
            };
            this.editModalOpen = true;
        },

        closeEditModal() {
            this.editModalOpen = false;
            this.saveLoading = false;
        },

        async saveTemplate() {
            try {
                this.saveLoading = true;
                
                // Simulate API call
                await new Promise(resolve => setTimeout(resolve, 1000));
                
                const templateIndex = this.templates.findIndex(t => t.id === this.editForm.id);
                if (templateIndex !== -1) {
                    this.templates[templateIndex] = {
                        ...this.templates[templateIndex],
                        name: this.editForm.name,
                        category: this.editForm.category,
                        language: this.editForm.language,
                        status: this.editForm.status,
                        updated_at: new Date().toISOString().slice(0, 19).replace('T', ' ')
                    };
                }
                
                this.filterTemplates();
                this.closeEditModal();
                alert('Template updated successfully!');
                
            } catch (error) {
                console.error('Error saving template:', error);
                alert('Failed to save template. Please try again.');
            } finally {
                this.saveLoading = false;
            }
        }
    }
}
</script>
@endsection