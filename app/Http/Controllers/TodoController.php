<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the authenticated user's ID
        $userId = auth()->id();

        // Retrieve all Todo items for the authenticated user
        $todos = Todo::where('user_id', $userId)->get();

        return response()->json($todos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'isCompleted' => 'required',
        ]);

        return Todo::create([
            'name' => $request->name,
            'isCompleted' => $request->isCompleted,
            'user_id' => auth()->id()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Todo::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todo = Todo::find($id);
        $todo->update($request->all());

        return $todo;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Todo::destroy($id);
    }

    /**
     * Update the isCompleted
     */
    public function updateCompleted(Request $request, string $id)
    {
        $request->validate([
            'isCompleted' => 'required'
        ]);

        $todo = Todo::find($id);
        $todo->update($request->all());

        return $todo;
    }
}
