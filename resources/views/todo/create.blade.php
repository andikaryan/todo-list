<x-app-layout>
    @if(Auth::check())
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tambah') }}
            </h2>
        </x-slot>
    @else
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tambah') }}
            </h2>
        </x-slot>
    @endif

    <div class="py-6 max-w-2xl mx-auto">
        <div class="bg-white dark:bg-gray-800 shadow rounded p-6">
            <form action="{{ route('todo.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="task" class="block text-gray-700 dark:text-gray-200">Task</label>
                    <input id="task" type="text" name="task" class="w-full mt-1 p-2 border rounded"
                        value="{{ old('task') }}" required>
                    @error('task')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 dark:text-gray-200">Description</label>
                    <textarea id="description" name="description" class="w-full mt-1 p-2 border rounded">{{ old('description') }}</textarea>
                    @error('description')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label for="due_date" class="block text-gray-700 dark:text-gray-200">Due Date</label>
                    <input id="due_date" type="date" name="due_date" class="w-full mt-1 p-2 border rounded"
                        value="{{ old('due_date') }}">
                    @error('due_date')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-gray-700 dark:text-gray-200">Status</label>
                    <select id="status" name="status" class="w-full mt-1 p-2 border rounded">
                        <option value="Draft" @if(old('status')==='Draft') selected @endif>Draft</option>
                        <option value="Applied" @if(old('status')==='Applied') selected @endif>Applied</option>
                        <option value="Interview Scheduled" @if(old('status')==='Interview Scheduled') selected @endif>Interview Scheduled</option>
                        <option value="Interviewed" @if(old('status')==='Interviewed') selected @endif>Interviewed</option>
                        <option value="Accepted" @if(old('status')==='Accepted') selected @endif>Accepted</option>
                        <option value="Rejected" @if(old('status')==='Rejected') selected @endif>Rejected</option>
                    </select>
                    @error('status')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Create</button>
                <a href="{{ route('todo.index') }}"
                    class="ml-2 px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancel</a>
            </form>
        </div>
    </div>

</x-app-layout>
