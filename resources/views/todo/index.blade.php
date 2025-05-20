<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
            <h3 class="text-lg text-white font-semibold mb-4">Todo List</h3>
            @if(session('success'))
                <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">{{ session('success') }}</div>
            @endif
            <a href="{{ route('todo.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah Todo</a>
            <table class="min-w-full bg-white border rounded">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Task</th>
                        <th class="py-2 px-4 border-b">Description</th>
                        <th class="py-2 px-4 border-b">Due Date</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($todos as $todo)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $todo->task }}</td>
                            <td class="py-2 px-4 border-b">{{ $todo->description }}</td>
                            <td class="py-2 px-4 border-b">{{ $todo->due_date }}</td>
                            <td class="py-2 px-4 border-b">{{ ucfirst($todo->status) }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('todo.edit', $todo->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-2 px-4 text-center">Belum ada todo.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
