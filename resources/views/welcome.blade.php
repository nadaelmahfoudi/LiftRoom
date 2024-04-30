@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<section class="bg-gray-700" >
  <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8 ">
    <header class="text-center">
      <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">LiftRoom</h2>

      <p class="mx-auto mt-4 max-w-md text-slate-300">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque praesentium cumque iure
        dicta incidunt est ipsam, officia dolor fugit natus?
      </p>
    </header>

    <ul class="mt-8 grid grid-cols-1 gap-4 lg:grid-cols-3">
      <li>
        <a href="#" class="group relative block">
          <img
            src="{{asset('img/NoPainNoGain.png')}}"
            alt=""
            class="aspect-square w-full object-cover transition duration-500 group-hover:opacity-90"
          />

          <div class="absolute inset-0 flex flex-col items-start justify-end p-6">
            <h3 class="text-xl font-medium text-white">Casual Training</h3>

            <span
              class="mt-1.5 inline-block bg-black px-5 py-3 text-xs font-medium uppercase tracking-wide text-white"
            >
              Read More
            </span>
          </div>
        </a>
      </li>

      <li>
        <a href="#" class="group relative block">
          <img
            src="{{asset('img/StayStrong.png')}}"
            alt=""
            class="aspect-square w-full object-cover transition duration-500 group-hover:opacity-90"
          />
        </a>
      </li>

      <li class="lg:col-span-2 lg:col-start-2 lg:row-span-2 lg:row-start-1">
        <a href="#" class="group relative block">
          <img
            src="{{asset('img/ShapeYourBody.png')}}"
            alt=""
            class="aspect-square w-full object-cover transition duration-500 group-hover:opacity-90"
          />

          <div class="absolute inset-0 flex flex-col items-start justify-end p-6">

            <span
              class="mt-1.5 inline-block bg-black px-5 py-3 text-xs font-medium uppercase tracking-wide text-white"
            >
              Read More
            </span>
          </div>
        </a>
      </li>
    </ul>
  </div>
</section>
<section class="bg-gray-700">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-2xl font-semibold text-center text-gray-900 capitalize lg:text-3xl dark:text-white">our team</h1>

        <p class="max-w-2xl mx-auto my-6 text-center text-gray-300">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo incidunt ex placeat modi magni quia error alias, adipisci rem similique, at omnis eligendi optio eos harum.
        </p>

        <form action="{{ route('search') }}" method="GET" class="flex items-center justify-center mt-4 mb-4">
            <input type="text" name="search" placeholder="Recherche..." class="w-full px-4 py-2 mr-2 rounded-md focus:outline-none focus:ring focus:border-amber-300 bg-slate-500">
            <button type="submit" class="px-4 py-2 bg-amber-400 text-white rounded-md hover:bg-amber-600 focus:outline-none focus:ring focus:border-amber-300">Rechercher</button>
        </form>

        <div class="checkbox-container  p-4 mb-4 rounded-lg bg-slate-500">
            <form action="{{ route('filter') }}" method="GET" class="flex flex-wrap">
                @foreach($skills as $skill)
                    <label class="checkbox-label flex items-center mr-4">
                        <input type="checkbox" name="skills[]" value="{{ $skill->id }}" class="mr-1">
                        <span class="text-gray-200">{{ $skill->titre }}</span>
                    </label>
                @endforeach
                <button type="submit" class="filter-button bg-amber-400 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded">
                    Filtrer
                </button>
            </form>
        </div>






        @if ($message = Session::get('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @endif
        <a class="inline-block rounded border border-current px-8 py-3 text-sm font-medium text-amber-400 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:text-amber-400" href="{{ route('welcome') }}">
                        View all the Programms
                    </a>

        <!-- <div class="flex items-center justify-center">
            <div class="flex items-center p-1 border border-amber-600 dark:border-amber-400 rounded-xl">
                <button class="px-4 py-2 text-sm font-medium text-white capitalize bg-amber-500 md:py-3 rounded-xl md:px-12">design</button>
                <button class="px-4 py-2 mx-4 text-sm font-medium text-amber-600 capitalize transition-colors duration-300 md:py-3 dark:text-amber-400 dark:hover:text-white focus:outline-none hover:bg-amber-500 hover:text-white rounded-xl md:mx-8 md:px-12">development</button>
                <button class="px-4 py-2 text-sm font-medium text-amber-600 capitalize transition-colors duration-300 md:py-3 dark:text-amber-400 dark:hover:text-white focus:outline-none hover:bg-amber-500 hover:text-white rounded-xl md:px-12">marketing</button>
            </div>
        </div> -->
        <div class="content grid grid-cols-1 gap-8 mt-8 xl:mt-16 md:grid-cols-2 xl:grid-cols-3 flex flex-wrap">
            @foreach ($programmes as $programme)
            <div class="flex flex-col items-center bg-slate-500 rounded-xl">
                <img class="object-cover w-full rounded-xl aspect-square" src="{{ asset('storage/' . $programme->image )}}" alt="">

                <h1 class="mt-4 text-2xl font-semibold text-gray-900 capitalize dark:text-white">{{$programme->titre}}</h1>

                <p class="mt-2 text-gray-800 capitalize ">{{ Str::limit($programme->description, 20) }}</p>
                
                <!-- Base -->
                <div class="flex space-x-4 mb-2">    
                <form action="{{ route('abonnements.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" value="{{$programme->id}}" name="programme_id">
                    <button type="submit" class="inline-block rounded bg-amber-400 px-8 py-3 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-amber-400">
                        S'abonner
                    </button>
                </form>


                    <!-- Border -->
                    <a class="inline-block rounded border border-current px-8 py-3 text-sm font-medium text-amber-400 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:text-amber-400" href="{{ route('programmes.show', $programme->id) }}">
                        Read More
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="flex justify-center mt-4 pagination">
            @if ($programmes->previousPageUrl())
                <a href="{{ $programmes->previousPageUrl() }}" class="flex items-center px-4 py-2 mx-1 text-gray-500 bg-gray-400 rounded-md dark:bg-gray-800 dark:text-gray-600 hover:bg-amber-500 dark:hover:bg-amber-500 hover:text-white dark:hover:text-gray-200">
                    Previous
                </a>
            @else
                <span class="flex items-center px-4 py-2 mx-1 text-gray-500 bg-gray-400 rounded-md cursor-not-allowed dark:bg-gray-800 dark:text-gray-600">
                    Previous
                </span>
            @endif

            @for ($i = 1; $i <= $programmes->lastPage(); $i++)
                <a href="{{ $programmes->url($i) }}" class="items-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-gray-400 rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-amber-500 dark:hover:bg-amber-500 hover:text-white dark:hover:text-gray-200 @if ($programmes->currentPage() == $i) bg-amber-500 text-white @endif">
                    {{ $i }}
                </a>
            @endfor

            @if ($programmes->hasMorePages())
                <a href="{{ $programmes->nextPageUrl() }}" class="flex items-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-gray-400 rounded-md dark:bg-gray-800 dark:text-gray-200 hover:bg-amber-500 dark:hover:bg-amber-500 hover:text-white dark:hover:text-gray-200">
                    Next
                </a>
            @else
                <span class="flex items-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-gray-400 rounded-md cursor-not-allowed dark:bg-gray-800 dark:text-gray-200">
                    Next
                </span>
            @endif
        </div>



    </div>
</section>
<section class="bg-gray-700">
    <div class="max-w-6xl px-6 py-10 mx-auto">
        <p class="text-xl font-medium text-amber-400 ">Testimonials</p>

        <h1 class="mt-2 text-2xl font-semibold text-slate-300 capitalize lg:text-3xl ">
            What clients saying
        </h1>

        <main class="relative z-20 w-full mt-8 md:flex md:items-center xl:mt-12">
            <div class="absolute w-full bg-amber-500 -z-10 md:h-96 rounded-2xl"></div>
            
            <div class="w-full p-6 bg-amber-500 md:flex md:items-center rounded-2xl md:bg-transparent md:p-0 lg:px-12 md:justify-evenly">
                <img class="h-24 w-24 md:mx-6 rounded-full object-cover shadow-md md:h-[32rem] md:w-80 lg:h-[36rem] lg:w-[26rem] md:rounded-2xl" src="https://images.unsplash.com/photo-1488508872907-592763824245?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="client photo" />
                
                <div class="mt-2 md:mx-6">
                    <div>
                        <p class="text-xl font-medium tracking-tight text-white">Ema Watson</p>
                        <p class="text-amber-800 ">Marketing Manager at Stech</p>
                    </div>

                    <p class="mt-4 text-lg leading-relaxed text-white md:text-xl"> “Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quibusdam ducimus libero ad tempora doloribus expedita laborum saepe voluptas perferendis delectus assumenda”.</p>
                    
                    <div class="flex items-center justify-between mt-6 md:justify-start">
                        <button title="left arrow" class="p-2 text-white transition-colors duration-300 border rounded-full rtl:-scale-x-100 hover:bg-amber-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <button title="right arrow" class="p-2 text-white transition-colors duration-300 border rounded-full rtl:-scale-x-100 md:mx-6 hover:bg-amber-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</section>
@include('layouts.footer')
@endsection