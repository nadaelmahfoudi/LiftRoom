@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<section class="bg-gray-700">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-2xl font-semibold text-center text-gray-900 capitalize lg:text-3xl dark:text-white">Here are Your Subscribed Programs</h1>
        <p class="max-w-2xl mx-auto my-6 text-center text-slate-300 dark:text-gray-300">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate fuga soluta eligendi nulla! Ex dicta aut, rerum voluptates nihil, quibusdam atque aperiam repudiandae rem, neque libero ab veniam modi iusto?</p>

        <div class="flex flex-wrap justify-center">
        @foreach($abonnements as $abonnement)
            <div class="flex flex-col items-center p-8 transition-colors duration-300 transform border cursor-pointer rounded-xl hover:border-transparent group  bg-gray-900 dark:hover:border-transparent mb-8 mr-4">
                <img class="object-cover w-32 h-32 rounded-full ring-4 ring-gray-300" src="{{ asset('storage/' . $abonnement->programme->image )}}" alt="">
                <h1 class="mt-4 text-2xl font-semibold text-gray-300 capitalize dark:text-white group-hover:text-white">{{$abonnement->programme->titre}}</h1>
                @foreach ($abonnement->programme->skills as $skill)
                    <p class="px-4 py-4 text-sm font-medium text-gray-400 dark:text-gray-200 whitespace-nowrap">
                                                Objectifs:
                                            </p>
                                            <li class="px-4 py-4 text-sm font-medium text-gray-400 dark:text-gray-200 whitespace-nowrap">
                                                <span >{{ $skill->titre }}</span>
                                            </li>
                                            @endforeach
                <a class="inline-block rounded border border-current px-8 py-3 text-sm font-medium text-amber-400 transition hover:scale-110 hover:shadow-xl hover:bg-amber-100 focus:outline-none focus:ring active:text-amber-400" href="{{ route('programmes.sessions', $abonnement->programme->id) }}">
                        Follow the Sessions !
                    </a>
            </div>
        @endforeach
        </div>
    </div>
</section>

@include('layouts.footer')
@endsection