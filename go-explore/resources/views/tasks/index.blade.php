<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Travel Packages') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%); min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 px-6 py-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg shadow-md">
                    <strong>✓</strong> {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="background: rgba(255, 255, 255, 0.95);">
                <div class="p-6 text-gray-900">
                    <!-- CREATE BUTTON -->
                    <div class="mb-6 text-center">
                        <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-8 py-4 border border-transparent rounded-lg font-bold text-lg text-white shadow-lg hover:shadow-xl transition duration-300" style="background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%);">
                            ➕ ADD NEW PACKAGE
                        </a>
                    </div>

                    @if($tasks->count() > 0)
                        <div class="space-y-4">
                            @foreach($tasks as $task)
                                <div class="p-6 rounded-xl shadow-lg hover:shadow-xl transition duration-300" style="background: linear-gradient(135deg, #f0fdfa 0%, #ccfbf1 100%); border-left: 5px solid #0d9488;">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <h3 class="text-2xl font-bold text-gray-800 mb-2">🌍 {{ $task->title }}</h3>
                                            @if($task->description)
                                                <p class="text-gray-700 mb-3 leading-relaxed">{{ $task->description }}</p>
                                            @endif
                                            <div class="flex items-center gap-4 text-sm">
                                                <span class="px-3 py-1 rounded-full font-semibold
                                                    @if($task->status === 'completed') bg-green-100 text-green-800
                                                    @elseif($task->status === 'in_progress') bg-amber-100 text-amber-800
                                                    @else bg-gray-100 text-gray-800
                                                    @endif">
                                                    {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                                </span>
                                                <span class="text-gray-600">
                                                    📅 {{ $task->due_date ? $task->due_date->format('M d, Y') : 'No travel date' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex gap-2 ml-4">
                                            <a href="{{ route('tasks.show', $task) }}" class="px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition">👁️ View</a>
                                            <a href="{{ route('tasks.edit', $task) }}" class="px-4 py-2 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition">✏️ Edit</a>
                                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this package?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">🗑️ Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <p class="text-gray-500 text-xl">No packages yet. Click the button above to add your first travel package!</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
