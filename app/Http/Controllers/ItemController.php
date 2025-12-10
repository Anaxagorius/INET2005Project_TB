<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'sku' => 'required|string|unique:items,sku',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('picture');
        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')->store('items', 'public');
        }

        Item::create($data);

        return redirect()->route('items.index')->with('success', 'Product added successfully.');
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'sku' => 'required|string|unique:items,sku,' . $item->id,
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('picture');

        if ($request->hasFile('picture')) {
            if ($item->picture) {
                Storage::disk('public')->delete($item->picture);
            }
            $data['picture'] = $request->file('picture')->store('items', 'public');
        }

        $item->update($data);

        return redirect()->route('items.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Item $item)
    {
        if ($item->picture) {
            Storage::disk('public')->delete($item->picture);
        }
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Product deleted successfully.');
    }
}
