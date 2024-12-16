@extends('layouts.layout') <!-- Assuming you have a layout file -->

@section('title')
    <title>Ubah Isi Kamus</title>
@endsection

@section('content')
    <div class="container mx-auto">
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Edit Dictionary Entry</h2>

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dictionaries.update', $dictionary->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="name_dict" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name_dict" name="name_dict"
                        value="{{ old('name_dict', $dictionary->name_dict) }}"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500"
                        required>
                </div>

                <div>
                    <label for="exp_dict" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="exp_dict" name="exp_dict" rows="4"
                        class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500" required>{{ old('exp_dict', $dictionary->exp_dict) }}</textarea>
                </div>

                <button type="submit"
                    class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600 transition duration-200">Update
                    Entry</button>
            </form>
        </div>
    </div>
@endsection
