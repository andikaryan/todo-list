<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::where('user_id', Auth::id())->paginate(5);
        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $validated = $request->validate([
            'job_applied' => 'required|string|max:255',
            'place' => 'nullable|string',
            'date_applied' => 'nullable|date',
            'status' => 'required|in:Draft,Applied,Interview Scheduled,Interviewed,Accepted,Rejected',
        ]);
        $validated['user_id'] = Auth::user()->id;
        Todo::create($validated);
        return redirect()->route('todo.index')->with('success', 'Todo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'job_applied' => 'required|string|max:255',
            'place' => 'nullable|string',
            'date_applied' => 'nullable|date',
            'status' => 'required|in:Draft,Applied,Interview Scheduled,Interviewed,Accepted,Rejected',
        ]);
        $todo = Todo::findOrFail($id);
        $todo->update($validated);
        return redirect()->route('todo.index')->with('success', 'Todo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect()->route('todo.index')->with('success', 'Todo deleted successfully.');
    }
}
