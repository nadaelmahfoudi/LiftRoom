@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<body class="bg-gray-700">

    <div class="container mx-auto mt-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-slate-200 text-2xl font-bold">Add New Exercice</h2>
            <a class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700" href="{{ route('exercices') }}">Back</a>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger bg-red-200 text-red-800 p-4 mb-4">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('exercices.store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-500 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="titre" class="block text-slate-200 text-sm font-bold mb-2">Titre:</label>
                <input type="text" name="titre" id="titre" class=" bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Titre">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-slate-200 text-sm font-bold mb-2">Description:</label>
                <textarea name="description" id="description" rows="4" class=" bg-slate-400 resize-none appearance-none border rounded w-full py-2 px-3  leading-tight focus:outline-none focus:shadow-outline" placeholder="Description"></textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-slate-200 text-sm font-bold mb-2">Image:</label>
                <input type="file" name="image" id="image" class="bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="duree" class="block text-slate-200 text-sm font-bold mb-2">Durée:</label>
                <input type="text" name="duree" id="duree" class=" bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Durée">
            </div>

            <div class="text-center">
                <button type="submit" class="bg-green-500 text-gray-700 py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>

</body>
@endsection