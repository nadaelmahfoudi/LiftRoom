@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div class="flex justify-center bg-gray-500">
    <section class="pt-6 pb-6 bg-gray-500 w-full max-w-screen-lg">
        <h1 class="text-xl font-semibold text-gray-900 dark:text-white text-center">LiftRoom</h1>
        <div class="container mx-auto p-4 bg-gray-300 rounded-lg shadow-xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <hr class="mb-4">

                    <div class="mb-4">
                        <strong class="block text-gray-600">Titre:</strong>
                        <p class="text-lg font-bold">{{ $exercice->titre }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="block text-gray-600">Description:</strong>
                        <p>{{ $exercice->description }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="block text-gray-600">Durée:</strong>
                        <p>{{ $exercice->duree }}</p>
                    </div>

                    
                    <div class="flex justify-center space-x-4 mb-2">

                        <!-- Border -->
                        <a class="bg-gray-500 inline-block rounded border border-current px-8 py-3 text-sm font-medium text-amber-400 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:text-amber-400" href="{{route('Exercises')}}">
                            Retour !
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@include('layouts.footer')
@endsection
