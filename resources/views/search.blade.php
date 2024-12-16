@extends('layouts.layout')

@section('title')
    <title>Search</title>
@endsection

@section('scripts')
    <script>
        function searchDictionary(event) {
            event.preventDefault();
            const searchTerm = document.getElementById('search-input').value;
            const url = `/search/${encodeURIComponent(searchTerm)}`;
            window.location.href = url;
        }
    </script>
@endsection

@section('content')
    <div class="container mx-auto">

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

        <h1 class="text-2xl font-bold mb-4">Hasil Pencarian</h1>

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if (isset($dictionaries) && $dictionaries->isNotEmpty())
            @foreach ($dictionaries as $dictionary)
                <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $dictionary->name_dict }}</h2>
                            <p class="mt-2">{{ $dictionary->exp_dict }}</p>
                            <p class="text-gray-500 text-sm">Created at: {{ $dictionary->created_at->format('d M Y H:i') }}
                            </p>
                        </div>
                        @if (auth()->check())
                            <div class="flex flex-col items-center space-y-2">
                                <a href="{{ route('dictionaries.edit', $dictionary->id) }}"
                                    class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600 transition duration-200">Edit</a>

                                <form action="{{ route('dictionaries.destroy', $dictionary->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition duration-200"
                                        onclick="return confirm('Are you sure you want to delete this entry?');">Delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @elseif($noResult)
            <div class="bg-gray-200 p-4 rounded">
                <p class="text-red-500">Kata tidak ditemukan.</p>
            </div>
        @endif
    </div>
@endsection
