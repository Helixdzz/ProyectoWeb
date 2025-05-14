@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Eco Tip Details</h1>
            <div class="flex space-x-4">
                <a href="{{ route('eco-tips.edit', $eco_tip->id) }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                    Edit Tip
                </a>
                <form action="{{ route('eco-tips.destroy', $eco_tip->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition"
                            onclick="return confirm('Are you sure you want to delete this tip?')">
                        Delete Tip
                    </button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            @if($eco_tip->image_path)
            <img src="{{ asset('storage/' . $eco_tip->image_path) }}" 
     alt="{{ $eco_tip->title }}" 
     class="w-full max-h-[600px] object-contain mx-auto">

            @endif
            
            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <span class="inline-block bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full mb-4">
                            {{ $eco_tip->category }}
                        </span>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $eco_tip->title }}</h2>
                    </div>
                    <p class="text-gray-500 text-sm">
                        Created: {{ $eco_tip->created_at->format('M d, Y') }}
                    </p>
                </div>
                
                <div class="prose max-w-none text-gray-600 mb-8">
                    {!! nl2br(e($eco_tip->content)) !!}
                </div>
                
                <div class="border-t pt-6">
                    <a href="{{ route('eco-tips.index') }}" 
                       class="text-green-600 hover:text-green-800 font-medium inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Back to all Eco Tips
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection