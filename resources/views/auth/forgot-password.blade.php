@extends('layouts.app')

@section('content')
<body class="bg-cover bg-center" style="background-image: url('{{ asset('/img/Woman_training.svg') }}')">
    <div class="flex items-center justify-center h-full">
        <div class="shadow-md rounded-lg p-8 max-w-md w-full bg-white bg-opacity-60 backdrop-blur-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Forgot Password</h2>
            <form method="POST" action="{{ route('password.email') }}">
            @csrf
                    @error('record')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Adresse Email</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" placeholder="Enter Your Email">
                </div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</body>
@endsection
