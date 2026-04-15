<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Category;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::with(['category', 'lendings'])->get();
        return view('admin.items.index', compact('items'));
    }


    public function create()
    {
        $categories = Category::all(); 
        return view('admin.items.create', compact('categories'));

    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'category_id' => 'required',
        'total' => 'required|integer'
    ]);

    Item::create([
        'name' => $request->name,
        'category_id' => $request->category_id,
        'total' => $request->total,
        'repair' => 0,
        'lending' => 0
    ]);

    return redirect('/admin/items');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();

    return view('admin.items.edit', compact('item', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $item->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'total' => $request->total,
            'repair' => $request->repair,
        ]);

        return redirect('/admin/items')
            ->with('success', 'Item berhasil diupdate');
    }

    public function destroy(string $id)
    {
        Item::destroy($id);
        
        return redirect('/admin/items')
            ->with('success', 'Item berhasil dihapus');
    }

}
