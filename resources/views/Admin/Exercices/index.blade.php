@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div class="flex">
    @include('layouts.sidebar')
    <section class="container px-4 mx-auto pt-10 shadow-2xl bg-graay">
    <a href="{{ route('exercices.create') }}" class="btn btn-info bg-amber-400 py-2 px-4 rounded">Create a new Exercice</a>
        <h2 class="text-lg font-medium text-gray-800 dark:text-white mb-4">Exercices</h2>

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

        <div class="flex flex-col">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-600">
                                <tr>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-300 dark:text-gray-400">
                                        Titre
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-300 dark:text-gray-400">
                                        Description
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-300 dark:text-gray-400">
                                        Image
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-300 dark:text-gray-400">
                                        Durée
                                    </th>
                                    <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-300 dark:text-gray-400">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-gray-400">
                                @foreach($exercices as $exercice)
                                <tr>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-900 dark:text-gray-200 whitespace-nowrap">
                                        {{ $exercice->titre }}
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-800 dark:text-gray-300 whitespace-nowrap">
                                        {{ $exercice->description }}
                                    </td>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-800 dark:text-gray-200 whitespace-nowrap">
                                    @if ($exercice->image)
                                    <img src="{{ asset('storage/' . $exercice->image) }}" alt="Exercice Image">
                                    @else
                                    <p>No image available</p>
                                    @endif
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-800 dark:text-gray-300 whitespace-nowrap">
                                        {{ $exercice->duree }} minutes
                                    </td>
                                    <td>
                                        <div class="flex">
                                            <a href="{{ route('exercices.edit', $exercice->id) }}" class="btn btn-info bg-blue-500 py-2 px-4 rounded hover:bg-blue-700 mr-2">Edit</a> 
                                            <form action="{{ route('exercices.destroy', $exercice->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-info bg-red-500 py-2 px-4 rounded hover:bg-red-700">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
