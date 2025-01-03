<style>
    .main_color{
        background: #3498db;
    }
    .text_color{
        color:rgb(27, 78, 112);
    }
    .main_text_color{
        color: #3498db;
    }
    .box-shadow-table{
        box-shadow: 0px 4px 10px rgba(133, 154, 169, 0.8);
        border-radius: 15px;
        padding: 10px 10px; 
        margin: 8px;
        width: auto;
        min-width: 100%; 
    }
    .table_scroll{
        overflow-x: auto; 
        width: 100%;
        white-space: nowrap;
    }
    .read-more:hover{
        background:hsl(204, 69.90%, 40.10%);
    }
    .deleteButton{
        background:hsl(0, 91.80%, 48.00%);
    }
    .deleteButton:hover{
        background:hsl(0, 91.80%, 35.00%);
    }
    .book:hover{
        box-shadow: 0px 4px 10px rgba(133, 154, 169, 0.8);
        border-radius: 15px;
    }
</style>

<?php
    use Illuminate\Support\Facades\DB;
    $genres = DB::table('genres')
    ->get();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700" >
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16" style="flex-wrap: wrap"> 
            <div class="flex" style="flex-wrap: wrap">
                
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mt-2 mb-2" style="width:80%">
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="flex-wrap: wrap">
                        <x-nav-link :href="route('manage_books')" :active="request()->routeIs('manage_books')">
                            {{ __('Books') }}
                        </x-nav-link>
                        <x-nav-link :href="route('authors')" :active="request()->routeIs('authors')">
                            {{ __('Authors') }}
                        </x-nav-link>
                        <x-nav-link :href="route('borrowers')" :active="request()->routeIs('borrowers')">
                            {{ __('Borrowers') }}
                        </x-nav-link>
                        <x-nav-link :href="route('publishers')" :active="request()->routeIs('publishers')">
                            {{ __('Publishers') }}
                        </x-nav-link>
                        <x-nav-link :href="route('genre')" :active="request()->routeIs('genre')">
                            {{ __('Genres') }}
                        </x-nav-link>
                        <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                            {{ __('Profile') }}
                        </x-nav-link>
                </div>
            </div>
            
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @if(!Auth::user()->is_admin)
                    <form action="{{route('selectBook.search')}}" method="post" class="form-inline mt-2 w-full">
                        @csrf
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search" style="width:80%">
                        <button class="btn btn-outline-success my-2 my-sm-0 main_color text-white rounded read-more" type="submit" style="width:18%;height:40px"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                @endif
    
                <x-dropdown align="right" width="48">
                    
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            
                            <div>{{ Auth::user()->name }}</div>
                            
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('manage_books')" :active="request()->routeIs('manage_books')">
                {{ __('Books') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('authors')" :active="request()->routeIs('authors')">
                {{ __('Authors') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('borrowers')" :active="request()->routeIs('borrowers')">
                {{ __('Borrowers') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('publishers')" :active="request()->routeIs('publishers')">
                {{ __('Publishers') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('genre')" :active="request()->routeIs('genre')">
                {{ __('Genres') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>