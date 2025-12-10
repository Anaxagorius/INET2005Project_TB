@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold mb-6">Add Product</h1>
<form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
    @csrf
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-700 font-bold mb-2">Category</label>
            <select name="category_id" class="w-full border p-2 rounded" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border p-2 rounded" required>
            @error('title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="col-span-2">
            <label class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea name="description" class="w-full border p-2 rounded">{{ old('description') }}</textarea>
        </div>
        <div>
            <label class="block text-gray-700 font-bold mb-2">Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full border p-2 rounded" required>
            @error('price') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 font-bold mb-2">Quantity</label>
            <input type="number" name="quantity" value="{{ old('quantity') }}" class="w-full border p-2 rounded" required>
            @error('quantity') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 font-bold mb-2">SKU</label>
            <input type="text" name="sku" value="{{ old('sku') }}" class="w-full border p-2 rounded" required>
            @error('sku') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div>
            <label class="block text-gray-700 font-bold mb-2">Picture</label>
            <input type="file" name="picture" class="w-full border p-2 rounded" required>
            @error('picture') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="mt-6">
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Save Product</button>
        <a href="{{ route('items.index') }}" class="ml-4 text-gray-600">Cancel</a>
    </div>
</form>
@endsection
