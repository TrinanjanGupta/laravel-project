<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::all();
        return view('people.index', compact('people'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'age' => 'required|integer',
            'address' => 'required',
        ]);

        Person::create($request->all());
        return redirect()->route('people.index')->with('success', 'Person created successfully.');
    }

    public function update(Request $request, Person $person)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'age' => 'required|integer',
            'address' => 'required',
        ]);

        $person->update($request->all());
        return redirect()->route('people.index')->with('success', 'Person updated successfully.');
    }

    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('people.index')->with('success', 'Person deleted successfully.');
    }
}
