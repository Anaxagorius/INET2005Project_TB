@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold mb-6">Products <a href="{{ route('items.create') }}" class="text-blue-600 underline">+ Add New</a></h1>
<table class="w-full border-collapse border border-gray-300 bg-white">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-4 text-left">Image</th>
            <th class="p-4 text-left">Title</th>
            <th class="p-4 text-left">Category</th>
            <th class="p-4 text-left">Price</th>
            <th class="p-4 text-left">Quantity</th>
            <th class="p-4 text-left">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr class="border-b">
                <td class="-centering class="p-4">
                    @if($item->picture)
                        <img src="{{ asset('storage/' . $item->picture) }}" alt="{{ $item->title }}" class="w-16 h-16 object-cover rounded">
                    @else
                        No image
                    @endif
                </td>
                <td class="p-4">{{ $item->title }}</td>
                <td class="p-4">{{ $item->category->name }}</td>
                <td class="p-4">${{ number_format($item->price, 2) }}</td>
                <td class="p-4">{{ $item->quantity }}</td>
                <td class="p-4">
                    <a href="{{ route('items.edit', $item) }}" class="text-blue-600 mr-4">Edit</a>
                    <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete product {{ addslashes($item->title) }}?')" class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
