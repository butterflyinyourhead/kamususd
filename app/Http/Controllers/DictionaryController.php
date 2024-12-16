<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name_dict' => 'required|string|max:255',
            'exp_dict' => 'required|string',
        ]);
        Dictionary::create($validateData);
        return back()->with('success', 'Dictionary entry created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($name_dict)
    {
        $nameDict = strtolower($name_dict);
        $dictionaries = Dictionary::whereRaw('LOWER(name_dict) LIKE ?', ['%' . $nameDict . '%'])->get();

        return view('search', [
            'dictionaries' => $dictionaries,
            'noResult' => $dictionaries->isEmpty()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dictionary = Dictionary::findOrFail($id);
        return view('edit', compact('dictionary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_dict' => 'required|string|max:255',
            'exp_dict' => 'required|string',
        ]);

        $dictionary = Dictionary::findOrFail($id);

        $dictionary->name_dict = $request->input('name_dict');
        $dictionary->exp_dict = $request->input('exp_dict');
        $dictionary->save();
        return redirect()->route('dictionaries.search', $dictionary->name_dict)
            ->with('success', 'Dictionary entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dictionary = Dictionary::findOrFail($id);

        $dictionary->delete();

        return redirect()->route('dictionaries.index')
            ->with('success', 'Dictionary entry deleted successfully.');
    }
}
