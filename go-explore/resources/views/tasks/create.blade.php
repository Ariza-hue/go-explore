<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book A Trip') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%); min-height: 100vh;">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="background: rgba(255, 255, 255, 0.95);">
                <div class="p-8 text-gray-900">
                    <div class="text-center mb-6">
                        <h3 class="text-3xl font-bold" style="background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">🌍 Book Your Adventure</h3>
                        <p class="text-gray-600 mt-2">Fill in the details for your travel package</p>
                    </div>

                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf

                        <!-- Destination -->
                        <div class="mb-6">
                            <label for="title" class="block font-bold text-lg text-gray-800 mb-2">📍 Destination</label>
                            <input id="title" class="block w-full border-2 border-teal-200 focus:border-teal-500 focus:ring-teal-500 rounded-lg shadow-sm p-3 text-lg" type="text" name="title" value="{{ old('title') }}" placeholder="e.g., Bali Beach Resort" required autofocus>
                            @error('title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Package Details -->
                        <div class="mb-6">
                            <label for="description" class="block font-bold text-lg text-gray-800 mb-2">📝 Package Details</label>
                            <textarea id="description" class="block w-full border-2 border-teal-200 focus:border-teal-500 focus:ring-teal-500 rounded-lg shadow-sm p-3 text-lg" name="description" rows="8" placeholder="Describe the travel package: activities, accommodation, meals included...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Booking Status -->
                        <div class="mb-6">
                            <label for="status" class="block font-bold text-lg text-gray-800 mb-2">📊 Booking Status</label>
                            <select id="status" name="status" required class="block w-full border-2 border-teal-200 focus:border-teal-500 focus:ring-teal-500 rounded-lg shadow-sm p-3 text-lg">
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>⏳ Pending</option>
                                <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>💼 Booked</option>
                                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>✅ Completed</option>
                            </select>
                            @error('status')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Travel Date -->
                        <div class="mb-6">
                            <label for="due_date" class="block font-bold text-lg text-gray-800 mb-2">📅 Travel Date</label>
                            <input id="due_date" class="block w-full border-2 border-teal-200 focus:border-teal-500 focus:ring-teal-500 rounded-lg shadow-sm p-3 text-lg" type="date" name="due_date" value="{{ old('due_date') }}">
                            @error('due_date')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-8 space-x-4">
                            <a href="{{ route('tasks.index') }}" class="px-6 py-3 bg-gray-400 text-white rounded-lg font-bold hover:bg-gray-500 transition">
                                Cancel
                            </a>
                            <button type="submit" class="px-8 py-3 text-white rounded-lg font-bold shadow-lg hover:shadow-xl transition" style="background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%);">
                                ✔️ Book Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
