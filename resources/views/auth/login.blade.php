@extends('layouts.custom-login')

@section('content')
    <div class="login-container">
        <div class="login-card">
            <h2 class="text-center mb-6">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" required autofocus
                           class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required
                           class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="block mb-0">
                    <label for="remember_me" class="flex items-center space-x-2">
                        <input id="remember_me" type="checkbox" name="remember" class="mr-2">
                        <span class="text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>


                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-800">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit" class="bg-indigo-600 text-white py-2 px-6 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
