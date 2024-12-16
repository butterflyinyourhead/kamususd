@extends('layouts.layout') <!-- Extend the layout -->

@section('title')
    <title>Kamus KBBI Online Sanata Dharma</title>
@endsection

@section('scripts')
    <script>
        function searchDictionary(event) {
            event.preventDefault(); // Prevent the default form submission
            const searchTerm = document.getElementById('searchBar').value; // Use the correct ID
            const url = `/search/${encodeURIComponent(searchTerm)}`; // Create the search URL
            window.location.href = url; // Redirect to the search URL
        }
    </script>
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-6">Kamus Online Universitas Sanata Dharma</h1>

        <div class="flex justify-center mb-6">
            <form onsubmit="searchDictionary(event)" class="flex items-center w-full"> <!-- Set form to full width -->
                <input type="text" id="searchBar" name="query" placeholder="Cari kata..."
                    class="border border-gray-300 rounded-l-lg p-2 w-full shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <button type="submit"
                    class="bg-blue-500 text-white rounded-r-lg p-2 hover:bg-blue-600 transition duration-200">
                    Search
                </button>
            </form>
        </div>

        <div id="results" class="mt-4">
            <!-- Results will be displayed here -->
        </div>
    </div>

    <style>
        body {
            background-color: #f9fafb;
            /* Light background color */
        }

        .container {
            max-width: 800px;
            /* Limit container width */
            background-color: #ffffff;
            /* White background for content */
            border-radius: 8px;
            /* Rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
        }

        h1 {
            color: #1f2937;
            /* Dark text color */
        }

        #searchBar {
            transition: border-color 0.3s;
            /* Smooth transition for focus */
        }

        #searchBar:focus {
            border-color: #3b82f6;
            /* Change border color on focus */
        }
    </style>
@endsection
