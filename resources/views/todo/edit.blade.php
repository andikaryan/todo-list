<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Todo') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
            <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="task" class="block text-gray-700 dark:text-gray-200">Task</label>
                    <input id="task" type="text" name="task" class="w-full mt-1 p-2 border rounded" value="{{ old('task', $todo->task) }}" required>
                    @error('task')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-200">Description</label>
                    <textarea id="description" name="description" class="w-full mt-1 p-2 border rounded">{{ old('description', $todo->description) }}</textarea>
                    @error('description')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label for="due_date" class="block text-gray-700 dark:text-gray-200">Due Date</label>
                    <input id="due_date" type="date" name="due_date" class="w-full mt-1 p-2 border rounded" value="{{ old('due_date', $todo->due_date) }}">
                    @error('due_date')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 dark:text-gray-200">Status</label>
                    <select id="status" name="status" class="w-full mt-1 p-2 border rounded">
                        <option value="pending" @if(old('status', $todo->status)==='pending') selected @endif>Pending</option>
                        <option value="completed" @if(old('status', $todo->status)==='completed') selected @endif>Completed</option>
                    </select>
                    @error('status')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
                <a href="{{ route('todo.index') }}" class="ml-2 px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancel</a>
            </form>
        </div>
    </div>
</x-app-layout>
