@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<body class="bg-gray-700">

    <div class="container mx-auto mt-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-slate-200 text-2xl font-bold">Edit Programme</h2>
            <a class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700" href="{{ route('programmes.index') }}">Back</a>
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

        <form action="{{ route('programmes.update', $programme->id) }}" method="POST" enctype="multipart/form-data" class="bg-gray-500 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="titre" class="block text-slate-200 text-sm font-bold mb-2">Titre:</label>
                <input type="text" name="titre" id="titre" class=" bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="titre" value="{{ $programme->titre }}">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-slate-200 text-sm font-bold mb-2">Description:</label>
                <input type="text" name="description" id="description" class="bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $programme->description }}">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-slate-200 text-sm font-bold mb-2">Image:</label>
                <input type="file" name="image" id="image" class="bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div id="show_item" class="mt-4">
                @foreach ($programme->sessions as $session)
                <div class="flex flex-wrap mb-3  session-row session-row-{{ $loop->index }}">
                    <div class="w-full md:w-5/12 mb-3 md:mb-0">
                        <label for="select_session" class="block text-sm font-medium text-slate-200">Session</label>
                        <select class="form-select form-select-lg block w-full mt-1 bg-gray-400" name="sessions[]" aria-label=".form-select-lg example">
                            <option>Select a session</option>
                            @foreach($sessions as $option)
                            <option value="{{ $option->id }}" {{ $option->id === $session->id ? 'selected' : '' }}>{{ $option->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full md:w-5/12 mb-3 md:mb-0">
                        <label for="input_quantite" class="block text-sm font-medium text-slate-200">Day</label>
                        <input type="text" name="days[]" class="form-input mt-1 block w-full h-12 rounded-md shadow-sm bg-gray-400 " placeholder="Day" value="{{ $session->pivot->day }}">
                    </div>
                    <div class="w-full md:w-2/12 flex items-end">
                        <button class="btn btn-primary btn-sm add_item_btn mt-3">
                            <i class="fas fa-plus">+</i>
                        </button>
                    </div>
                </div>
                @endforeach
            </div>

            <div>
            <label for="input_quantite" class="block text-sm font-medium text-slate-200">Objectifs</label>
                @foreach ($skills as $skill)
                <li class="relative flex mb-2 ">
                    <input type="checkbox" id="cat_{{ $skill->id }}" name="skills[]" value="{{ $skill->id }}" class="hidden peer" {{ $programme->skills->contains($skill) ? 'checked' : '' }}>
                    <label for="cat_{{ $skill->id }}" class="flex flex-col justify-between w-full p-2 text-gray-500 bg-gray-400 border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="block">
                            <div class="w-full text-lg font-semibold">{{ $skill->titre }}</div>
                        </div>
                    </label>
                    <span class="hidden absolute top-0 right-0 rounded bg-blue-600 peer-checked:block">
                        <svg class="w-5 h-5 p-0 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                    </span>
                </li>
                @endforeach
            </div>

            <div class="text-center">
                <button type="submit" class="bg-amber-400 text-gray-700 py-2 px-4 rounded hover:bg-amber-600 focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>

</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let sessionCounter = 1;
    const selectsession = document.querySelector("[name='sessions[]']");
    const initialOptions = selectsession.innerHTML;

    document.querySelector(".add_item_btn").addEventListener('click', function(e) {
        e.preventDefault();

        const showItem = document.getElementById("show_item");
        const newRow = document.createElement('div');
        newRow.classList.add('flex', 'flex-wrap', 'mb-3', 'session-row', 'session-row-' + sessionCounter);
        newRow.innerHTML = `
            <div class="w-full md:w-5/12 mb-3 md:mb-0">
                <label for="select_session" class="block text-sm font-medium text-gray-700">session</label>
                <select class="form-select form-select-lg block w-full mt-1" name="sessions[]" aria-label=".form-select-lg example">
                    ${initialOptions} 
                </select>
            </div>
            <div class="w-full md:w-5/12 mb-3 md:mb-0">
                <label for="input_quantite" class="block text-sm font-medium text-gray-700">Répétition</label>
                <input type="text" name="days[]" class="form-input mt-1 block w-full h-12 rounded-md shadow-sm" placeholder="Répétition">
            </div>
        `;
        let div_ = document.createElement('div');
        div_.innerHTML = `<div class="w-full md:w-2/12 flex items-end"></div>`;
        let btn_ = document.createElement('button');
        btn_.innerHTML = `<button type="button" class="btn btn-danger btn-sm remove_item_btn mt-3 ml-2"><i class="fas fa-minus">-</i></button>`;
        btn_.addEventListener('click', (event)=>{
            let rowItem = event.target.closest('.session-row');
            rowItem.remove();
        });
        div_.appendChild(btn_);
        newRow.appendChild(div_);
        showItem.appendChild(newRow);
        sessionCounter++;
    });

    document.addEventListener('click', function(event) {
        if (event.target && event.target.classList.contains('remove_item_btn')) {
            event.preventDefault();
            let rowItem = event.target.closest('.session-row');
            rowItem.remove();
        }
    });
});

</script>
@endsection
