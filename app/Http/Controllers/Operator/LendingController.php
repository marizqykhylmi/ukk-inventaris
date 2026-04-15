<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Lending;
use App\Models\Item;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function index(Request $request)
    {
    $query = Lending::with('item')->latest();

    if ($request->start_date && $request->end_date) {
        $query->whereBetween('borrowed_at', [
            $request->start_date . ' 00:00:00',
            $request->end_date . ' 23:59:59'
        ]);
    }

    $lendings = $query->get();

    return view('operator.lending.index', compact('lendings'));
    }

    public function create()
    {
        $items = Item::all();

        return view('operator.lending.create', compact('items'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'name' => 'required',
        ]);

        $item = Item::findOrFail($request->item_id);

        if ($item->total < $request->quantity) {
            return back()->with('error', 'Stok tidak cukup');
        }


        Lending::create([
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'name' => $request->name,
            'keterangan' => $request->keterangan,
            'borrowed_at' => now(),
            'peminjam' => $request->peminjam,
        ]);

        $item = Item::findOrFail($request->item_id);

        $item->decrement('total', $request->quantity);
        

        return redirect()->route('operator.lending.index')
            ->with('success', 'Lending berhasil ditambahkan');

        
    }

    public function returnForm($id)
    {
        $lending = Lending::with('item')->findOrFail($id);

        return view('operator.lending.return', compact('lending'));
    }

    public function processReturn(Request $request, $id)
    {
    $request->validate([
        'returned_at' => 'required|date',
        'lost_qty' => 'nullable|integer|min:0',
        'damaged_qty' => 'nullable|integer|min:0',
    ]);

    $lending = Lending::findOrFail($id);

    if ($lending->returned_at) {
        return back()->with('error', 'Barang sudah dikembalikan');
    }

    $lending->update([
        'returned_at' => $request->returned_at,
        'lost_qty' => $request->lost_qty ?? 0,
        'damaged_qty' => $request->damaged_qty ?? 0,
    ]);

    $item = Item::findOrFail($lending->item_id);

    $returnQty = $lending->quantity - ($request->lost_qty ?? 0);

    $item->increment('total', $returnQty);

    $item->increment('repair', $request->damaged_qty ?? 0);

    return redirect('/operator/lending')
        ->with('success', 'Barang berhasil dikembalikan');
    }

    public function destroy($id)
    {
        Lending::findOrFail($id)->delete();

        return back()->with('success', 'Data lending dihapus');
    }
}