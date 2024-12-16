@extends('layouts.layout') <!-- Extend the layout -->

@section('title')
    <title>Masuk Log</title>
@endsection

@section('content')
    <div class="container mx-auto p-6">
        <!-- Error Messages -->
        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form id="loginForm" method="POST" action="{{ route('login') }}"
            class="bg-white shadow-md rounded-lg p-8 w-full max-w-md mx-auto">
            @csrf

            <!-- Username Field -->
            <div class="flex flex-col mb-4">
                <label for="username" class="mb-1 text-gray-700">Username:</label>
                <input type="text" name="username" id="username" required
                    class="border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-500 w-full">
            </div>

            <!-- Password Field -->
            <div class="flex flex-col mb-4">
                <label for="password" class="mb-1 text-gray-700">Password:</label>
                <input type="password" name="password" id="password" required
                    class="border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-green-500 w-full">
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="bg-green-500 text-white py-2 rounded hover:bg-green-600 transition duration-200 w-full">
                Login
            </button>
        </form>
    </div>
@endsection
