<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%); min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="background: rgba(255, 255, 255, 0.95);">
                <div class="p-6 text-gray-900">
                    <div class="text-center mb-8">
                        <img src="{{ asset('pngwing.com.png') }}" alt="GoExplore" class="w-20 h-20 mx-auto mb-4">
                        <h3 class="text-4xl font-bold mb-4" style="background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Explore The World</h3>
                        <p class="text-gray-600 text-lg mb-6">Discover beautiful places at exclusive prices</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                        <div class="p-6 rounded-xl shadow-lg" style="background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%);">
                            <h4 class="text-lg font-semibold text-white mb-2">Total Packages</h4>
                            <p class="text-4xl font-bold text-white">{{ auth()->user()->tasks()->count() }}</p>
                        </div>
                        <div class="p-6 rounded-xl shadow-lg" style="background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);">
                            <h4 class="text-lg font-semibold text-white mb-2">Booked</h4>
                            <p class="text-4xl font-bold text-white">{{ auth()->user()->tasks()->where('status', 'in_progress')->count() }}</p>
                        </div>
                        <div class="p-6 rounded-xl shadow-lg" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                            <h4 class="text-lg font-semibold text-white mb-2">Completed</h4>
                            <p class="text-4xl font-bold text-white">{{ auth()->user()->tasks()->where('status', 'completed')->count() }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-10 text-center">
                        <a href="{{ route('tasks.index') }}" class="inline-flex items-center px-8 py-4 border border-transparent rounded-lg font-bold text-lg text-white shadow-lg hover:shadow-xl transition duration-300" style="background: linear-gradient(135deg, #0d9488 0%, #14b8a6 100%);">
                            🌍 View All Packages
                        </a>
                        <a href="{{ route('tasks.create') }}" class="ml-4 inline-flex items-center px-8 py-4 border border-transparent rounded-lg font-bold text-lg text-white shadow-lg hover:shadow-xl transition duration-300" style="background: linear-gradient(135deg, #f59e0b 0%, #f97316 100%);">
                            ➕ Add New Package
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
