<x-app-layout>

    <div class="py-6 max-w-7xl mx-auto">
        <div class="bg-white shadow rounded p-6">
            <h3 class="text-lg text-blue-700 font-semibold mb-4">Todo List</h3>
            @if(session('success'))
                <div class="mb-4 p-2 bg-blue-100 text-blue-800 rounded">{{ session('success') }}</div>
            @endif
            <a href="{{ route('todo.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Tambah Todo</a>
            <table class="min-w-full bg-white border border-blue-200 rounded">
                <thead class="bg-blue-50">
                    <tr>
                        <th class="py-2 px-4 border-b border-blue-200 text-left text-blue-800">Job Applied</th>
                        <th class="py-2 px-4 border-b border-blue-200 text-left text-blue-800">Place</th>
                        <th class="py-2 px-4 border-b border-blue-200 text-left text-blue-800">Date Applied</th>
                        <th class="py-2 px-4 border-b border-blue-200 text-left text-blue-800">Status</th>
                        <th class="py-2 px-4 border-b border-blue-200 text-left text-blue-800">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($todos as $todo)
                        <tr class="hover:bg-blue-50">
                            <td class="py-2 px-4 border-b border-blue-100">{{ $todo->job_applied }}</td>
                            <td class="py-2 px-4 border-b border-blue-100">{{ $todo->place }}</td>
                            <td class="py-2 px-4 border-b border-blue-100">{{ $todo->date_applied }}</td>
                            <td class="py-2 px-4 border-b border-blue-100">{{ ucfirst($todo->status) }}</td>
                            <td class="py-2 px-4 border-b border-blue-100">
                                <a href="{{ route('todo.edit', $todo->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-2 px-4 text-center text-blue-700">Belum ada todo.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                <div class="flex justify-center">
                    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center space-x-1">
                        @if ($todos->onFirstPage())
                            <span class="px-3 py-1 bg-blue-100 text-blue-400 border border-blue-200 rounded cursor-not-allowed">&laquo;</span>
                        @else
                            <a href="{{ $todos->previousPageUrl() }}" class="px-3 py-1 bg-white text-blue-700 border border-blue-200 rounded hover:bg-blue-600 hover:text-white">&laquo;</a>
                        @endif
                        @foreach ($todos->getUrlRange(1, $todos->lastPage()) as $page => $url)
                            @if ($page == $todos->currentPage())
                                <span class="px-3 py-1 bg-blue-600 text-white border border-blue-600 rounded">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="px-3 py-1 bg-white text-blue-700 border border-blue-200 rounded hover:bg-blue-600 hover:text-white">{{ $page }}</a>
                            @endif
                        @endforeach
                        @if ($todos->hasMorePages())
                            <a href="{{ $todos->nextPageUrl() }}" class="px-3 py-1 bg-white text-blue-700 border border-blue-200 rounded hover:bg-blue-600 hover:text-white">&raquo;</a>
                        @else
                            <span class="px-3 py-1 bg-blue-100 text-blue-400 border border-blue-200 rounded cursor-not-allowed">&raquo;</span>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
