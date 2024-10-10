<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class productController extends Controller
{
    public function index(): View {
        $products = Product::latest()->paginate(10);
        return view('product.index', compact('products'));
    }

    public function create(): View {
        return view('product.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'nama_produk' => 'required|min:5',
            'harga'       => 'required|numeric',
            'deskripsi'   => 'required|min:10',
        ]);

        Product::create([
            'nama_produk' => $request->nama_produk,
            'harga'       => $request->harga,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect()->route('product.index')->with('success', 'Data Produk Berhasil Ditambahkan');
    }

    public function show(string $id): View {

        $product = Product::findOrFail($id);

        return view('product.show', compact('product'));
    }
    
    public function edit(string $id): View {

        $product = Product::findOrFail($id);

        return view('product.edit', compact('product'));
    }
        
    public function update(Request $request, $id): RedirectResponse {

        $request->validate([
            'nama_produk' => 'required|min:5',
            'deskripsi'   => 'required|min:10',
            'harga'       => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi'   => $request->deskripsi,
            'harga'       => $request->harga,
        ]);

        // Redirect to index
        return redirect()->route('product.index')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
