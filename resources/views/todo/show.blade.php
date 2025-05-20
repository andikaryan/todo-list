<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Todo Detail') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
            <div class="mb-4">
                <strong>Job Applied:</strong> {{ $todo->job_applied }}
            </div>
            <div class="mb-4">
                <strong>Place:</strong> {{ $todo->place }}
            </div>
            <div class="mb-4">
                <strong>Date Applied:</strong> {{ $todo->date_applied }}
            </div>
            <div class="mb-4">
                <strong>Status:</strong> {{ ucfirst($todo->status) }}
            </div>
            <a href="{{ route('todo.edit', $todo->id) }}" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">Edit</a>
            <a href="{{ route('todo.index') }}" class="ml-2 px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Back</a>
        </div>
    </div>
</x-app-layout>
