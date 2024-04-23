@extends('layouts.app')
@section('content')
@include('layouts.navbar')


<section class="ezy__epprofile4 light py-14 md:py-24  bg-gray-700 text-zinc-900  relative overflow-hidden z-10">
    <div class="container mx-auto ">

        <!-- content -->
        <div class="col-span-12 md:col-span-9 lg:col-span-10 ">
            <div class="bg-gray-500 dark:bg-slate-800 shadow-2xl rounded-xl p-6 py-12 ">
                <h3 class="text-3xl md:text-[40px] font-bold text-amber-500 leading-tight">
                    Account Setting
                </h3>
                <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                    <div class="mt-12">
                        <a href="" class="text-[17px] leading-tight text-amber-800">
                            Change Your Records
                        </a>
                        @if(Auth::check())
                        <div class="grid grid-cols-1 gap-6"> 
                            <div class="col-span-12 lg:col-span-5 mt-2">
                                <div class="flex flex-col p-2 mb-6">
                                    <label for="name" class="mb-2 text-black">Your Name !</label>
                                    <input
                                        type="text" name="name"
                                        class="h-12 p-4 bg-amber-50 dark:bg-slate-700 rounded-xl border-none focus:outline-none"
                                        id="name"  value="{{$user->name}}"
                                    />
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-5 mt-2">
                                <div class="flex flex-col p-2 mb-6">
                                    <label for="email" class="mb-2">Your Email !</label>
                                    <input
                                        type="email" name="email"
                                        class="h-12 p-4 bg-amber-50 dark:bg-slate-700 rounded-xl border-none focus:outline-none"
                                        id="email" value="{{ $user->email }}"
                                    />
                                </div>
                            </div>
                        </div>
                        @else
                            <p>Please log in to view your profile.</p>
                        @endif
                    </div>

                    <!-- conditions -->
                    <div class="mt-12">
                        <!-- Checkbox inputs -->
                    </div>
                    <div class="grid grid-cols-1"> <!-- Remplace grid-cols-12 par grid-cols-1 -->
                        <div class="col-span-12 lg:col-span-5 mt-6">
                            <div>
                                <button type="submit" class="bg-amber-600 text-white hover:bg-opacity-90 font-bold py-3.5 px-5 rounded-xl w-full">
                                    Update All Records
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
@endsection
