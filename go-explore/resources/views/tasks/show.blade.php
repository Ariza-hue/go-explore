<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Diary Entry Details') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh;">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="background: rgba(255, 255, 255, 0.95);">
                <div class="p-8 text-gray-900">
                    <div class="mb-8">
                        <h3 class="text-4xl font-bold text-gray-800 mb-4">{{ $task->title }}</h3>
                        <span class="px-4 py-2 inline-flex text-base font-bold rounded-full shadow-md
                            @if($task->status === 'completed') bg-green-100 text-green-800
                            @elseif($task->status === 'in_progress') bg-yellow-100 text-yellow-800
                            @else bg-gray-100 text-gray-800
                            @endif">
                            @if($task->status === 'completed') ✅
                            @elseif($task->status === 'in_progress') 🔄
                            @else ⏳
                            @endif
                            {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                        </span>
                    </div>

                    @if($task->description)
                        <div class="mb-8 p-6 rounded-xl" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
                            <h4 class="text-2xl font-bold text-gray-800 mb-4 flex items-center">
                                <span class="mr-2">📝</span> Your Entry
                            </h4>
                            <p class="text-gray-800 text-lg leading-relaxed whitespace-pre-line">{{ $task->description }}</p>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="p-6 rounded-xl shadow-md" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                            <h4 class="text-xl font-bold text-gray-800 mb-2 flex items-center">
                                <span class="mr-2">📅</span> Target Date
                            </h4>
                            <p class="text-gray-800 text-lg font-semibold">
                                {{ $task->due_date ? $task->due_date->format('F d, Y') : 'No target date set' }}
                            </p>
                        </div>

                        <div class="p-6 rounded-xl shadow-md" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
                            <h4 class="text-xl font-bold text-gray-800 mb-2 flex items-center">
                                <span class="mr-2">⏰</span> Created
                            </h4>
                            <p class="text-gray-800 text-lg font-semibold">{{ $task->created_at->format('F d, Y h:i A') }}</p>
                        </div>
                    </div>

                    @if($task->updated_at != $task->created_at)
                        <div class="mb-8 p-4 rounded-lg bg-blue-50 border-l-4 border-blue-500">
                            <p class="text-blue-800">
                                <strong>ℹ️ Last Updated:</strong> {{ $task->updated_at->format('F d, Y h:i A') }}
                            </p>
                        </div>
                    @endif

                    <div class="flex items-center justify-center gap-4 mt-10">
                        <a href="{{ route('tasks.index') }}" class="px-6 py-3 bg-gray-500 text-white rounded-lg font-bold hover:bg-gray-600 transition shadow-lg">
                            ← Back to Entries
                        </a>
                        <a href="{{ route('tasks.edit', $task) }}" class="px-6 py-3 text-white rounded-lg font-bold shadow-lg hover:shadow-xl transition" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            ✏️ Edit Entry
                        </a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this diary entry?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-6 py-3 text-white rounded-lg font-bold shadow-lg hover:shadow-xl transition" style="background: linear-gradient(135deg, #ff6b6b 0%, #c92a2a 100%);">
                                🗑️ Delete Entry
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
