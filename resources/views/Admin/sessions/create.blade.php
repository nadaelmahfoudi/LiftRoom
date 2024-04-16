@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<body class="bg-gray-700">

    <div class="container mx-auto mt-8">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-slate-200 text-2xl font-bold">Add New Session</h2>
            <a class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700" href="{{ route('sessions.index') }}">Back</a>
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

        <form action="{{ route('sessions.store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-500 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-slate-200 text-sm font-bold mb-2">Name:</label>
                <input type="text" name="name" id="name" class=" bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="name">
            </div>

            <div class="mb-4">
                <label for="objectif" class="block text-slate-200 text-sm font-bold mb-2">Objectif:</label>
                <input type="text" name="objectif" id="objectif" class="bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="duree" class="block text-slate-200 text-sm font-bold mb-2">Durée:</label>
                <input type="number" name="duree" id="duree" class=" bg-slate-400 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Durée">
            </div>

            <div id="show_item" class="mt-4">
                <div class="flex flex-wrap mb-3">
                    <div class="w-full md:w-5/12 mb-3 md:mb-0">
                        <label for="select_exercice" class="block text-sm font-medium text-gray-700">Exercice</label>
                        <select class="form-select form-select-lg block w-full mt-1" name="exercices[]" aria-label=".form-select-lg example">
                            <option selected>Open this select menu</option>
                            @foreach($exercices as $exercice)
                                <option value="{{ $exercice->id }}">{{ $exercice->titre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full md:w-5/12 mb-3 md:mb-0">
                        <label for="input_quantite" class="block text-sm font-medium text-gray-700">Repetition</label>
                        <input type="number" name="repetitions[]" id="input_quantite" class="form-input mt-1 block w-full h-12 rounded-md shadow-sm" placeholder="Repetition">
                    </div>
                    <div class="w-full md:w-2/12 flex items-end">
                        <button class="btn btn-primary btn-sm add_item_btn mt-3">
                            <i class="fas fa-plus">+</i>
                        </button>
                    </div>
                </div>
            </div>


            <div class="text-center">
                <button type="submit" class="bg-amber-400 text-gray-700 py-2 px-4 rounded hover:bg-amber-600 focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>

</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let exerciceCounter = 1;
    const selectExercice = document.querySelector("[name='exercices[]']");
    const initialOptions = selectExercice.innerHTML;

    document.querySelector(".add_item_btn").addEventListener('click', function(e) {
        e.preventDefault();

        const showItem = document.getElementById("show_item");
        const newRow = document.createElement('div');
        newRow.classList.add('flex', 'flex-wrap', 'mb-3', 'exercice-row', 'exercice-row-' + exerciceCounter);
        newRow.innerHTML = `
            <div class="w-full md:w-5/12 mb-3 md:mb-0">
                <label for="select_exercice" class="block text-sm font-medium text-gray-700">Exercice</label>
                <select class="form-select form-select-lg block w-full mt-1" name="exercices[]" aria-label=".form-select-lg example">
                    ${initialOptions} 
                </select>
            </div>
            <div class="w-full md:w-5/12 mb-3 md:mb-0">
                <label for="input_quantite" class="block text-sm font-medium text-gray-700">Répétition</label>
                <input type="number" name="repetitions[]" class="form-input mt-1 block w-full h-12 rounded-md shadow-sm" placeholder="Répétition">
            </div>
        `;
        let div_ = document.createElement('div');
        div_.innerHTML = `<div class="w-full md:w-2/12 flex items-end"></div>`;
        let btn_ = document.createElement('button');
        btn_.innerHTML = `<button type="button" class="btn btn-danger btn-sm remove_item_btn mt-3 ml-2"><i class="fas fa-minus">-</i></button>`;
        btn_.addEventListener('click', (event)=>{
            let rowItem = event.target.closest('.exercice-row');
            rowItem.remove();
        });
        div_.appendChild(btn_);
        newRow.appendChild(div_);
        showItem.appendChild(newRow);
        exerciceCounter++;
    });

    document.addEventListener('click', function(event) {
        if (event.target && event.target.classList.contains('remove_item_btn')) {
            event.preventDefault();
            let rowItem = event.target.closest('.exercice-row');
            rowItem.remove();
        }
    });
});

</script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>

@endsection