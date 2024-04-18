@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div class="flex">
    @include('layouts.sidebar')
    <section class="container px-4 mx-auto pt-10 shadow-2xl bg-graay">
    <a href="{{ route('programmes.create') }}" class="btn btn-info bg-amber-400 py-2 px-4 rounded">Create a new Programme</a>
        <h2 class="text-lg font-medium text-gray-800 dark:text-white mb-4">Programmes</h2>

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
                            <tr class="text-white">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th  scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-300 dark:text-gray-400">id</th>
                                    <th  scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-300 dark:text-gray-400">Name</th>
                                    <th  scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-300 dark:text-gray-400">Description</th>
                                    <th  scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-300 dark:text-gray-400">Image</th>
                                    <th  scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-300 dark:text-gray-400">Sessions</th>
                                    <th  scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-300 dark:text-gray-400">Objectifs</th>
                                    <th  scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-300 dark:text-gray-400">Actions</th>
                            </tr>

                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 bg-gray-400">
                            @foreach($programmes as $programme)
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>{{ $programme->id }}</td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-900 dark:text-gray-200 whitespace-nowrap">
                                    {{ $programme->titre }}
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 dark:text-gray-300 whitespace-nowrap">{{ $programme->description}}</td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-800 dark:text-gray-200 whitespace-nowrap">
                                    @if ($programme->image)
                                    <img src="{{ asset('storage/' . $programme->image) }}" alt="programme Image">
                                    @else
                                    <p>No image available</p>
                                    @endif
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 dark:text-gray-300 whitespace-nowrap">
                                    @foreach($programme->sessions as $session)
                                        <li class="px-4 py-4 text-sm font-medium text-gray-900 dark:text-gray-200 whitespace-nowrap">
                                            <span class="exercise-title">{{ $session->name }}</span> every <span class="exercise-repetition">{{ $session->pivot->day }}</span>
                                        </li>
                                    @endforeach
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-800 dark:text-gray-300 whitespace-nowrap">
                                            @foreach ($programme->skills as $skill)
                                            <li class="px-4 py-4 text-sm font-medium text-gray-900 dark:text-gray-200 whitespace-nowrap">
                                                <span >{{ $skill->titre }}</span>
                                            </li>
                                            @endforeach
                                </td>
                                

                                <td>
                                    <div class="flex">
                                        <a href="{{ route('programmes.edit', $programme->id) }}" class="btn btn-info bg-blue-500 py-2 px-4 rounded hover:bg-blue-700 mr-2">Edit</a> 
                                        <form action="{{ route('programmes.destroy', $programme->id) }}" method="POST">
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
