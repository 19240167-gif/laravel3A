<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use Illuminate\Http\RedirectResponse;

use Illuminate\View\View;

class ProductController extends Controller
{
    public function index() : View
    {
        //ini coding untuk ambil data ke model yang namanya product
        $nama_produk = Product::latest()->paginate(20);

        //ini coding menuju ke interface dengan membawa data
        return view('products.index', compact('nama_produk'));
    }

    public function create() : View
    {
       //CODING MENUJU TAMPILAN TAMBAH PRODUK
        return view ('products.tambahproduk');
    }

    public function store(Request $request)
{
    //CODING MENUJU TAMBAH DATA
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'stok' => 'required|integer',
        'harga' => 'required|numeric',
    ]);

    //CODING MENUJU SIMPAN DATA
    Product::create([
        'title' => $validated['nama'],
        'deskripsi' => $validated['deskripsi'],
        'stock' => $validated['stok'],
        'price' => $validated['harga'],
    ]);


    return redirect()->route('products.index');
}


public function edit(string $id) : View
{
//ini coding untuk ambil data ke model berdasarkan id (primary key)    
$nama_produk = Product::findOrFail($id);

//ini coding untuk menuju interface sambil membawa id
return view('products.editproduk', compact('nama_produk'));

}

public function update(Request $request, $id ) : RedirectResponse
{

 //CODING MENUJU TAMBAH DATA
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'stok' => 'required|integer',
        'harga' => 'required|numeric',
    ]);
    
//CARI DULU DATA YANG MAU DI EDIT BERDASARKAN ID
$product = Product::findOrFail($id);

    //CODING MENUJU SIMPAN DATA
     $product->update([
        'title' => $validated['nama'],
        'deskripsi' => $validated['deskripsi'],
        'stock' => $validated['stok'],
        'price' => $validated['harga'],
    ]);


    return redirect()->route('products.index');

}


  public function destroy(Product $product): RedirectResponse
    {
        //CODING MENUJU PILIH HAPUS DATA
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil dihapus!');
    }


    public function massDelete(Request $request)
{
    $ids = $request->ids; // ambil array ID yang dicentang
    Product::whereIn('id', $ids)->delete();

    return redirect()->route('products.index')->with('success', 'Produk terpilih berhasil dihapus!');
}

    
}
