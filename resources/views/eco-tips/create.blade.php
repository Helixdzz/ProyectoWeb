@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Create New Eco Tip</h1>
        
        <div class="bg-white rounded-xl shadow-md p-6">
            <form action="{{ route('eco-tips.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-6">
                    <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                    <input type="text" name="title" id="title" 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                           value="{{ old('title') }}" required>
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="category" class="block text-gray-700 font-medium mb-2">Category</label>
                    <select name="category" id="category" 
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                        <option value="">Select a category</option>
                        <option value="Recycling" {{ old('category') == 'Recycling' ? 'selected' : '' }}>Recycling</option>
                        <option value="Energy" {{ old('category') == 'Energy' ? 'selected' : '' }}>Energy</option>
                        <option value="Water" {{ old('category') == 'Water' ? 'selected' : '' }}>Water</option>
                        <option value="Food" {{ old('category') == 'Food' ? 'selected' : '' }}>Food</option>
                        <option value="Transportation" {{ old('category') == 'Transportation' ? 'selected' : '' }}>Transportation</option>
                    </select>
                    @error('category')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
                    <textarea name="content" id="content" rows="6"
                              class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500"
                              required>{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="mb-6">
                    <label for="image" class="block text-gray-700 font-medium mb-2">Image (Optional)</label>
                    <input type="file" name="image" id="image" 
                           class="w-full px-4 py-2 border rounded-lg file:mr-4 file:py-2 file:px-4
                                  file:rounded-lg file:border-0 file:text-sm file:font-semibold
                                  file:bg-green-50 file:text-green-700 hover:file:bg-green-100"
                           accept="image/jpeg, image/png, image/jpg">
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-gray-500 text-sm mt-1">Max file size: 2MB (JPEG, PNG, JPG)</p>
                </div>
                
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('eco-tips.index') }}" 
                       class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-green-600 text-black rounded-lg hover:bg-green-700 transition">
                        Create Eco Tip
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection