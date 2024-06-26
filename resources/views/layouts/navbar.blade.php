@extends('layouts.app')
<nav class="relative shadow">
    <div class=" px-6 py-4 mx-auto bg-graay">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex items-center justify-between">
                <a href="#">
                    <img class="" src="{{asset('img/logo.svg')}}" alt="">
                </a>

                <!-- Mobile menu button -->
                <div class="flex lg:hidden">
                    <button type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                        </svg>
                
                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white dark:bg-gray-800 lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:bg-transparent lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">
                <div class="flex flex-col -mx-6 lg:flex-row lg:items-center lg:mx-8">
                    @if (Auth::check() && auth()->user()->roles->pluck('role')->contains('admin'))
                        <a href="/" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">Home</a>
                        <a href="{{route('AboutUs')}}" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">About Us</a>
                        <a href="{{route('Exercises')}}" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">Exercises</a>
                        <a href="{{route('ContactUs')}}" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">Contact Us</a>
                        <a href="{{ route('skills.index') }}" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">Dashboard</a>
                    @endif
                    @guest
                    <a href="/" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">Home</a>
                    <a href="{{route('AboutUs')}}" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">About Us</a>
                    <a href="{{route('ContactUs')}}" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">Contact Us</a>
                    @endguest
                    @if (Auth::check() && auth()->user()->roles->pluck('role')->contains('client'))
                    
                    <a href="/" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">Home</a>
                    <a href="{{route('AboutUs')}}" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">About Us</a>     
                        <a href="{{route('Exercises')}}" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">Exercises</a>
                        <a href="{{route('showSubscribedProgramme')}}" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">Mes Programmes</a>
                    <a href="{{route('ContactUs')}}" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">Contact Us</a> 
                    @endif
                    @if (Route::has('login') || Route::has('register'))
                        @auth
                        <p class="text-white">Welcome, {{auth()->user()->name}} again!</p>
                        <div class="flex items-center mt-4 lg:mt-0 ml-2">
                        <button type="button" class="flex items-center focus:outline-none" aria-label="toggle profile dropdown">
                            <div class="w-8 h-8 overflow-hidden border-2 border-gray-400 rounded-full">
                            <a href="{{ route('Profile') }}">
                            <img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80" class="object-cover w-full h-full" alt="avatar">
                            </a>
                                
                            </div>

                            <h3 class="mx-2 text-gray-700 dark:text-gray-200 lg:hidden">Khatab wedaa</h3>
                            
                        </button>
                        </div>
                        @else
                        <a href="{{ route('login') }}" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">Log in</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-3 py-2 mx-3 mt-2 text-gray-200 transition-colors duration-300 transform rounded-md lg:mt-0  hover:bg-gray-500 dark:hover:bg-gray-700">Register</a>
                        @endif
                        @endauth
                    
                    @endif
                </div>


            </div>
        </div>
    </div>
</nav>