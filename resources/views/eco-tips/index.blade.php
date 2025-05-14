@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Eco Tips</h1>
        <a href="{{ route('eco-tips.create') }}" 
           class="bg-green-600 hover:bg-green-700 text-black px-4 py-2 rounded-lg transition">
            + Create New Tip
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse($tips as $tip)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                @if($tip->image_path)
                    <img src="{{ asset('storage/' . $tip->image_path) }}" 
                         alt="{{ $tip->title }}" 
                         class="w-full h-48 object-contain bg-white">
                @endif
                
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full mb-2">
                                {{ $tip->category }}
                            </span>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $tip->title }}</h3>
                        </div>
                    </div>
                    
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ $tip->content }}</p>
                    
                    <div class="flex justify-between items-center">
                        <a href="{{ route('eco-tips.show', $tip->id) }}" 
                           class="text-green-600 hover:text-green-800 font-medium">
                            View Details
                        </a>
                        <div class="flex space-x-2">
                            <a href="{{ route('eco-tips.edit', $tip->id) }}" 
                               class="text-blue-500 hover:text-blue-700">
                                Edit
                            </a>
                            <form action="{{ route('eco-tips.destroy', $tip->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="text-red-500 hover:text-red-700"
                                        onclick="return confirm('Are you sure?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">No eco tips found. Create your first one!</p>
            </div>
        @endforelse
    </div>

    @if($tips->hasPages())
        <div class="mt-8">
            {{ $tips->links() }}
        </div>
    @endif
</div>
@endsection