@extends('layouts.app')

@section('content')
<div class="flex h-screen w-screen" x-data="tagsPage()">
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
        <nav class="mt-6" x-data="{ contactsOpen: true }">
            <div class="px-4 space-y-2">
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group">
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
                
                <!-- Contacts with Dropdown - Active -->
                <div class="relative">
                    <button @click="contactsOpen = !contactsOpen" 
                            class="w-full flex items-center justify-between space-x-3 p-3 rounded-lg bg-gradient-to-r from-green-500 to-green-600 text-white shadow-lg group relative">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-users w-5"></i>
                            <span x-show="sidebarOpen" 
                                  x-transition:enter="transition ease-out duration-300 delay-75"
                                  x-transition:enter-start="opacity-0 transform translate-x-2"
                                  x-transition:enter-end="opacity-100 transform translate-x-0"
                                  x-transition:leave="transition ease-in duration-200"
                                  x-transition:leave-start="opacity-100 transform translate-x-0"
                                  x-transition:leave-end="opacity-0 transform translate-x-2"
                                  class="font-medium">Contacts</span>
                        </div>
                        <i x-show="sidebarOpen" 
                           :class="contactsOpen ? 'rotate-180' : ''" 
                           class="fas fa-chevron-down transition-transform duration-200"></i>
                        
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
                        <a href="{{ route('tags') }}" class="flex items-center space-x-3 p-2 rounded-lg bg-green-600/50 text-white group">
                            <i class="fas fa-tags w-4"></i>
                            <span class="text-sm font-medium">Tags/Segments</span>
                        </a>
                    </div>
                </div>
                
                <!-- Other menu items... (Templates, Sent Messages, etc.) -->
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                    <i class="fas fa-file-alt w-5 text-gray-400 group-hover:text-white"></i>
                    <span x-show="sidebarOpen" class="text-gray-300 group-hover:text-white">Templates</span>
                </a>
                
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                    <i class="fas fa-paper-plane w-5 text-gray-400 group-hover:text-white"></i>
                    <span x-show="sidebarOpen" class="text-gray-300 group-hover:text-white">Sent Messages</span>
                </a>
                
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                    <i class="fas fa-inbox w-5 text-gray-400 group-hover:text-white"></i>
                    <span x-show="sidebarOpen" class="text-gray-300 group-hover:text-white">Inbox</span>
                </a>
                
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                    <i class="fas fa-chart-line w-5 text-gray-400 group-hover:text-white"></i>
                    <span x-show="sidebarOpen" class="text-gray-300 group-hover:text-white">Reports</span>
                </a>
                
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition-colors group relative">
                    <i class="fas fa-cog w-5 text-gray-400 group-hover:text-white"></i>
                    <span x-show="sidebarOpen" class="text-gray-300 group-hover:text-white">Settings</span>
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
                        <h1 class="text-2xl font-bold text-gray-900">Tags Management</h1>
                        <p class="text-sm text-gray-600">Manage your contact tags and segments</p>
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
            <!-- Tags Table -->
            <div class="bg-white/80 backdrop-blur-md rounded-xl shadow-xl border border-white/20">
                <!-- Table Header -->
                <div class="p-6 border-b border-gray-200/50">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <h2 class="text-xl font-bold text-gray-900">Tags Management</h2>
                        
                        <!-- Action Buttons -->
                        <div class="flex gap-2">
                            <!-- Add New Tag -->
                            <button @click="showAddModal = true" class="px-4 py-2 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg hover:from-green-600 hover:to-green-700 transition-all shadow-md hover:shadow-lg">
                                <i class="fas fa-plus mr-2"></i>
                                Add Tag
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Table Content -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50/50 backdrop-blur-sm border-b border-gray-200/50">
                            <tr>
                                <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Tag Name</th>
                                <th class="px-6 py-4 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white/30 backdrop-blur-sm divide-y divide-gray-200/50">
                            <template x-for="tag in paginatedTags" :key="tag.id">
                                <tr class="hover:bg-gray-50/50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full" 
                                              :class="{
                                                'bg-blue-100 text-blue-800': tag.id % 4 === 0,
                                                'bg-green-100 text-green-800': tag.id % 4 === 1,
                                                'bg-purple-100 text-purple-800': tag.id % 4 === 2,
                                                'bg-orange-100 text-orange-800': tag.id % 4 === 3
                                              }"
                                              x-text="tag.name"></span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center space-x-4">
                                            <!-- Edit Button -->
                                            <button @click="editTag(tag)" class="p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                            <!-- Delete Button -->
                                            <button @click="deleteTag(tag.id)" class="p-2 text-red-600 hover:text-red-800 hover:bg-red-50 rounded-lg transition-colors" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                            
                            <!-- No tags state -->
                            <tr x-show="filteredTags.length === 0">
                                <td colspan="2" class="px-6 py-12 text-center text-gray-500">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-tags text-4xl text-gray-300 mb-4"></i>
                                        <p class="text-lg font-medium">No tags found</p>
                                        <p class="text-sm">Try adding a new tag</p>
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
                            Showing <span class="font-medium" x-text="startIndex + 1"></span> to <span class="font-medium" x-text="Math.min(endIndex, filteredTags.length)"></span> of <span class="font-medium" x-text="filteredTags.length"></span> results
                        </div>
                        <div class="flex items-center space-x-2">
                            <button @click="previousPage()" 
                                    :disabled="currentPage === 1"
                                    class="px-3 py-2 text-sm font-medium text-gray-500 bg-white/50 backdrop-blur-sm border border-gray-300/50 rounded-lg hover:bg-gray-50/50 disabled:opacity-50 transition-all">
                                <i class="fas fa-chevron-left mr-1"></i>
                                Previous
                            </button>
                            <span class="px-3 py-2 text-sm font-medium text-gray-700">
                                Page <span x-text="currentPage"></span> of <span x-text="totalPages"></span>
                            </span>
                            <button @click="nextPage()" 
                                    :disabled="currentPage === totalPages || totalPages === 0"
                                    class="px-3 py-2 text-sm font-medium text-gray-500 bg-white/50 backdrop-blur-sm border border-gray-300/50 rounded-lg hover:bg-gray-50/50 disabled:opacity-50 transition-all">
                                Next
                                <i class="fas fa-chevron-right ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Add Tag Modal -->
    <div x-show="showAddModal" 
         class="fixed inset-0 z-50 overflow-y-auto" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
            </div>

            <div @click.away="showAddModal = false" 
                 class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Add New Tag
                            </h3>
                            <div class="mt-4">
                                <label for="tagName" class="block text-sm font-medium text-gray-700">Tag Name</label>
                                <input type="text" 
                                       id="tagName" 
                                       x-model="newTag.name" 
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="addTag()" 
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Add Tag
                    </button>
                    <button @click="showAddModal = false" 
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Tag Modal -->
    <div x-show="showEditModal" 
         class="fixed inset-0 z-50 overflow-y-auto" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
            </div>

            <div @click.away="showEditModal = false" 
                 class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Edit Tag
                            </h3>
                            <div class="mt-4">
                                <label for="editTagName" class="block text-sm font-medium text-gray-700">Tag Name</label>
                                <input type="text" 
                                       id="editTagName" 
                                       x-model="editingTag.name" 
                                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="updateTag()" 
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Update Tag
                    </button>
                    <button @click="showEditModal = false" 
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function tagsPage() {
    return {
        sidebarOpen: true,
        searchTerm: '',
        currentPage: 1,
        itemsPerPage: 10,
        showAddModal: false,
        showEditModal: false,
        newTag: {
            name: ''
        },
        editingTag: {
            id: null,
            name: ''
        },
        tags: [
            { id: 1, name: 'Premium' },
            { id: 2, name: 'Active' },
            { id: 3, name: 'New' },
            { id: 4, name: 'Interested' },
            { id: 5, name: 'Loyal' },
            { id: 6, name: 'Potential' },
            { id: 7, name: 'Inactive' },
            { id: 8, name: 'VIP' },
            { id: 9, name: 'Business' },
            { id: 10, name: 'Retail' }
        ],
        filteredTags: [],
        
        init() {
            this.filteredTags = this.tags;
        },
        
        filterTags() {
            if (this.searchTerm === '') {
                this.filteredTags = this.tags;
            } else {
                this.filteredTags = this.tags.filter(tag => 
                    tag.name.toLowerCase().includes(this.searchTerm.toLowerCase())
                );
            }
            this.currentPage = 1; // Reset to first page when searching
        },
        
        get totalPages() {
            return Math.ceil(this.filteredTags.length / this.itemsPerPage) || 1;
        },
        
        get startIndex() {
            return (this.currentPage - 1) * this.itemsPerPage;
        },
        
        get endIndex() {
            return this.startIndex + this.itemsPerPage;
        },
        
        get paginatedTags() {
            return this.filteredTags.slice(this.startIndex, this.endIndex);
        },
        
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
            }
        },
        
        previousPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
            }
        },
        
        addTag() {
            if (this.newTag.name.trim() !== '') {
                const newId = this.tags.length > 0 ? Math.max(...this.tags.map(t => t.id)) + 1 : 1;
                this.tags.push({
                    id: newId,
                    name: this.newTag.name.trim()
                });
                this.newTag.name = '';
                this.showAddModal = false;
                this.filterTags();
            }
        },
        
        editTag(tag) {
            this.editingTag = { ...tag };
            this.showEditModal = true;
        },
        
        updateTag() {
            if (this.editingTag.name.trim() !== '') {
                const index = this.tags.findIndex(t => t.id === this.editingTag.id);
                if (index !== -1) {
                    this.tags[index].name = this.editingTag.name.trim();
                    this.showEditModal = false;
                    this.filterTags();
                }
            }
        },
        
        deleteTag(id) {
            if (confirm('Are you sure you want to delete this tag?')) {
                this.tags = this.tags.filter(t => t.id !== id);
                this.filterTags();
            }
        }
    }
}
</script>
@endsection
