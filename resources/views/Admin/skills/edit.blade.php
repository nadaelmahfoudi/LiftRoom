@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<body class="bg-gray-700">

    <div class="container mx-auto mt-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-slate-200 text-2xl font-bold">Update Objectif</h2>
            <a class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700" href="{{ route('skills.index') }}">Back</a>
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

        <form action="{{ route('skills.update', $skill->id) }}" method="POST" enctype="multipart/form-data" class="bg-gray-500  shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="titre" class="block text-slate-200 text-sm font-bold mb-2">Titre:</label>
                <input type="text" name="titre" id="titre" value="{{ $skill->titre }}" class="bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-800 leading-tight focus:outline-none focus:shadow-outline" placeholder="Titre">
            </div>

            <div class="text-center">
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>

</body>
@endsection
