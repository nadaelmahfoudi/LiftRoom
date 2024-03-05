@extends('layouts.app')

@section('content')
<body class="bg-cover bg-center" style="background-image: url('{{ asset('/img/Woman_training.svg') }}')">
    <div class="flex items-center justify-center h-full">
        <div class="shadow-md rounded-lg p-8 max-w-md w-full bg-white bg-opacity-60 backdrop-blur-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Connexion</h2>
            <form method="POST" action="{{ route('login') }}">
            @csrf
                    @error('record')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                    <h1 class="text-gray-800 font-bold text-2xl mb-1">Hello Again!</h1>
                    <p class="text-sm font-normal text-gray-600 mb-8">Welcome Back</p>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Adresse Email</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" placeholder="Enter Your Email">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500" placeholder="Enter Your Password">
                </div>
                <button type="submit" class="w-full bg-slate-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-slate-700">Se connecter</button>
                <div class="flex justify-between mt-4">
                        <a href="{{ route('password.request') }}"
                            class="text-sm ml-2 hover:text-blue-500 cursor-pointer hover:-translate-y-1 duration-500 transition-all">Forgot
                            Password ?</a>

                        <a href="{{ route('register') }}"
                            class="text-sm ml-2 hover:text-blue-500 cursor-pointer hover:-translate-y-1 duration-500 transition-all">Don't
                            have an account yet?</a>
                    </div>
            </form>
        </div>
    </div>
</body>
@endsection
