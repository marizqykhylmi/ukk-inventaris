<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Division;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }


    public function create()
    {
        $divisions = Division::all();
        return view('admin.categories.create', compact('divisions'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|unique:categories,name',
        'division_pj_id' => 'required'
    ], [
        'name.unique' => 'Nama category sudah ada, tidak boleh duplikat!'
    ]);

    Category::create([
        'name' => $request->name,
        'division_pj_id' => $request->division_pj_id
    ]);

    return redirect('/admin/categories')
        ->with('success', 'Category berhasil ditambahkan');
    }


    public function show(string $id)
    {
        //
    }

  
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $divisions = Division::all();

        return view('admin.categories.edit', compact('category', 'divisions'));
    }

  
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'division_pj_id' => 'required',
            'total_items' => 'required|integer'
        ]);

       
        $category = Category::findOrFail($id);

       
        $category->update([
            'name' => $request->name,
            'division_pj_id' => $request->division_pj_id,
            'total_items' => $request->total_items
        ]);

        
        return redirect('/admin/categories')
            ->with('success', 'Category berhasil diupdate');
    }


    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/admin/categories')
            ->with('success', 'Category berhasil dihapus');
    }
}
