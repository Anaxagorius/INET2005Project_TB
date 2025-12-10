@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold mb-6">Categories <a href="{{ route('categories.create') }}" class="text-blue-600 underline">+ Add New</a></h1>
<table class="w-full border-collapse border border-gray-300 bg-white">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-4 text-left">Name</th>
            <th class="p-4 text-left">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr class="border-b">
                <td class="p-4">{{ $category->name }}</td>
                <td class="p-4">
                    <a href="{{ route('categories.edit', $category) }}" class="text-blue-600 mr-4">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete category {{ addslashes($category->name) }}?')" class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
