@extends('layouts.layout') <!-- Extend the layout -->

@section('title')
    <title>Kamus</title>
@endsection

@section('scripts')
    <script>
        function searchDictionary(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            const searchTerm = document.getElementById('search-input').value; // Get the input value
            const url = `/search/${encodeURIComponent(searchTerm)}`; // Construct the URL
            window.location.href = url; // Redirect to the constructed URL
        }
    </script>
@endsection

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Welcome to the Admin Dashboard</h1>

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Tambah Kata</h2>
            <form method="POST" action="{{ route('dictionaries.store') }}" class="space-y-4">
                @csrf
                <input type="text" name="name_dict" placeholder="Masukkan kata baru"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
                <input type="text" name="exp_dict" placeholder="Masukkan definisi"
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
                <button type="submit"
                    class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition duration-200">Tambah
                    Kata</button>
            </form>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Cari Kata</h2>
            <form onsubmit="return searchDictionary(event)" class="space-y-4">
                <input type="text" id="search-input" placeholder="Cari kata..."
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500">
                <button type="submit"
                    class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition duration-200">Cari
                    Kata</button>
            </form>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Logout</h2>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 transition duration-200">Logout</button>
            </form>
        </div>
    </div>
@endsection
