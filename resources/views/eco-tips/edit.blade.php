@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Eco Tip</h1>

    <form action="{{ route('eco-tips.update', $eco_tip->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $eco_tip->title) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>

        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <input type="text" name="category" id="category" value="{{ old('category', $eco_tip->category) }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>

        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" id="content" rows="5"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ old('content', $eco_tip->content) }}</textarea>
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full">
        </div>

        <button type="submit"
            class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Update Tip
        </button>
    </form>
</div>
@endsection
