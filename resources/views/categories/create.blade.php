@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold mb-6">Add Category</h1>
<form action="{{ route('categories.store') }}" method="POST" class="bg-white p-6 rounded shadow">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 font-bold mb-2">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2 rounded" required>
        @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>
    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Save</button>
    <a href="{{ route('categories.index') }}" class="ml-4 text-gray-600">Cancel</a>
</form>
@endsection
