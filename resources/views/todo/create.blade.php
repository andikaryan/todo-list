<x-app-layout>
    @if(Auth::check())
    @else
    @endif

    <div class="py-6 max-w-2xl mx-auto">
        <div class="bg-white shadow rounded p-6">
            <form action="{{ route('todo.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="job_applied" class="block text-blue-800">Job Applied</label>
                    <input id="job_applied" type="text" name="job_applied" class="w-full mt-1 p-2 border rounded"
                        value="{{ old('job_applied') }}" required>
                    @error('job_applied')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label for="place" class="block text-blue-800">Place</label>
                    <textarea id="place" name="place" class="w-full mt-1 p-2 border rounded">{{ old('place') }}</textarea>
                    @error('place')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label for="date_applied" class="block text-blue-800">Date Applied</label>
                    <input id="date_applied" type="date" name="date_applied" class="w-full mt-1 p-2 border rounded"
                        value="{{ old('date_applied') }}">
                    @error('date_applied')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-blue-800">Status</label>
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
