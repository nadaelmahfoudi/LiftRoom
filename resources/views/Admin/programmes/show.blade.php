@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div class="flex justify-center bg-gray-500">

    <section class="pt-6 pb-6 bg-gray-500 w-full max-w-screen-lg">
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
        <h1 class="text-xl font-semibold text-gray-900 dark:text-white text-center">LiftRoom</h1>
        <div class="container mx-auto p-4 bg-gray-300 rounded-lg shadow-xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div>
                    <hr class="mb-4">

                    <div class="mb-4">
                        <strong class="block text-gray-600">Titre:</strong>
                        <p class="text-lg font-bold">{{ $programme->titre }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="block text-gray-600">Description:</strong>
                        <p>{{ $programme->description }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="block text-gray-600">Les Objectifs de ce programme sont:</strong>
                        <ul>
                            @foreach ($programme->skills as $skill)
                                <li>{{ $skill->titre }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="flex justify-center space-x-4 mb-2">    
                    <form action="{{ route('abonnements.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" value="{{$programme->id}}" name="programme_id">
                        <button type="submit" class="inline-block rounded bg-amber-400 px-8 py-3 text-sm font-medium text-white transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:bg-amber-400">
                            S'abonner Pour Plus de détails !
                        </button>
                    </form>

                        <!-- Border -->
                        <a class="bg-gray-500 inline-block rounded border border-current px-8 py-3 text-sm font-medium text-amber-400 transition hover:scale-110 hover:shadow-xl focus:outline-none focus:ring active:text-amber-400" href="/">
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
