<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class ProdukController extends Controller
{
    public function index()
    {
        $data['produk'] = Produk::all();
        $data['total_produk'] = $data['produk']->count();
        return view('index',$data);
    }


    public function search(Request $request)
    {
        $data['produk'] = Produk::where('name','LIKE','%'.$request->cari.'%')->orwhere('kategori','LIKE','%'.$request->cari.'%')->get();
        $data['total_produk'] = $data['produk']->count();
        return view('index',$data);
    }

    public function cari(Request $request)
    {
        $data['produk'] = Produk::where('name','LIKE','%'.$request->cari.'%')->orwhere('kategori','LIKE','%'.$request->cari.'%')->get();
        $data['total_produk'] = $data['produk']->count();
        return view('search',$data);
    }

    public function create()
    {
        return view('create');
    }

    public function input(Request $request)
    {
        $filename = '';
        if ($request->file('gambar')) {
            $extfile = $request->file('gambar')->getClientOriginalExtension();
            $filename = time().".".$extfile;
            $request -> file('gambar')->storeAs('gambar',$filename);
        }

        Produk::create([
            'name' => $request->name,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $filename
        ]);

        return redirect('index');
    }

    public function delete(Request $request)
    {
        Produk::where('id',$request->id)->delete();
        return redirect('/index');
    }

    public function edit(Request $request)
    {
        $data['produk'] = Produk::find($request->id);
        return view('edit',$data);
    }

    public function update(Request $request)
    {
        $produk = Produk::where('id',$request->id)->first();
        if ($produk->gambar) {
            Storage::delete('gambar/'.$produk->gambar);
        }

        $filename = '';
        if ($request->file('gambar')) {
            $extfile = $request->file('gambar')->getClientOriginalExtension();
            $filename = time().".".$extfile;
            $request -> file('gambar')->storeAs('gambar',$filename);
        }

        $produk->update([
            'name' => $request->name,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'gambar' => $filename
        ]);

        return redirect('/index');
    }

    public function home()
    {
        $data['produk'] = Produk::all();
        $data['keranjang'] = keranjang::where('id_user',Auth()->user()->id)->get();
        return view('home', $data);
    }

    public function cart()
    {
        $user_id = Auth::id();
        $data['produk'] = Keranjang::where('id_user', $user_id)
            ->where('status', 'Belum Dipesan') // Only get items that are not ordered
            ->with('item')
            ->get();

        $data['jumlah'] = $data['produk']->sum('jumlah'); // Sum the quantity of items in the cart
        $data['total'] = $data['produk']->sum('subtotal'); // Calculate total price

        return view('cart', $data);
    }

    public function shipped()
    {
        $user_id = Auth::id();
        $data['produk'] = Keranjang::where('id_user', $user_id)
            ->where('status', 'Sudah Dipesan') // Only get shipped items
            ->with('item')
            ->get();

        $data['jumlah'] = $data['produk']->sum('jumlah'); // Sum the quantity of shipped items
        $data['total'] = $data['produk']->sum('subtotal'); // Calculate total price

        return view('shipped', $data);
    }

    public function arrived()
    {
        $user_id = Auth::id();
        $data['produk'] = Keranjang::where('id_user', $user_id)
            ->where('status', 'Sudah Sampai') // Only get arrived items
            ->with('item')
            ->get();

        $data['jumlah'] = $data['produk']->sum('jumlah'); // Sum the quantity of arrived items
        $data['total'] = $data['produk']->sum('subtotal'); // Calculate total price

        return view('arrived', $data);
    }

    public function tambah($id, Request $request)
    {
        // Get the product price
        $itemHarga = Produk::where('id', $id)->value('harga');

        // Check if the product is already in the cart with status 'Belum Dipesan'
        $existingItem = Keranjang::where('id_user', auth()->user()->id)
            ->where('id_produk', $id)
            ->where('status', 'Belum Dipesan')
            ->first();

        // Check current stock for the product
        $currentStock = Produk::where('id', $id)->value('stok');

        // Validate stock availability before proceeding
        if ($currentStock < 1) {
            Alert::error('Error', 'Stok Habis');
            return redirect('/home');
        }

        // Set quantity and subtotal
        if ($existingItem) {
            // If it exists, increment the quantity
            $jumlah = $existingItem->jumlah + 1;
            $subtotalValue = $itemHarga * $jumlah;

            // Update the existing item in the cart
            $existingItem->update([
                'jumlah' => $jumlah,
                'subtotal' => $subtotalValue,
            ]);
        } else {
            // If it doesn't exist, set quantity to 1
            $jumlah = 1;
            $subtotalValue = $itemHarga * $jumlah;

            // Insert into the cart
            Keranjang::insert([
                'id_user' => auth()->user()->id,
                'id_produk' => $id,
                'jumlah' => $jumlah,
                'subtotal' => $subtotalValue,
                'status' => 'Belum Dipesan'
            ]);
        }

        // Deduct stock from the product only if the stock is sufficient
        Produk::where('id', $id)->decrement('stok');

        // Update total and alert
        $this->updateTotal();
        Alert::info('Info', 'Produk berhasil ditambahkan');

        return redirect('/home');
    }

    public function editjumlah($id, Request $request)
    {
        // Retrieve the cart item with related product information
        $keranjang = Keranjang::with('item')->where('id', $id)->first();

        // Get the current quantity in the cart
        $currentQuantity = $keranjang->jumlah;

        // Get the new quantity from the request
        $newQuantity = $request->jumlah;

        // Get the product ID and price
        $productId = $keranjang->item->id;
        $itemHarga = $keranjang->item->harga;

        // Calculate the subtotal for the new quantity
        $subtotalValue = $itemHarga * $newQuantity;

        // Update stock based on the quantity change
        if ($newQuantity > $currentQuantity) {
            // If the new quantity is greater, decrease stock accordingly
            $stockChange = $newQuantity - $currentQuantity;
            Produk::where('id', $productId)->decrement('stok', $stockChange);
        } elseif ($newQuantity < $currentQuantity) {
            // If the new quantity is less, increase stock accordingly
            $stockChange = $currentQuantity - $newQuantity;
            Produk::where('id', $productId)->increment('stok', $stockChange);
        }

        // Update the cart item with the new quantity and subtotal
        $keranjang->update([
            'jumlah' => $newQuantity,
            'subtotal' => $subtotalValue,
        ]);

        // Update the total for the cart
        $this->updateTotal();

        // Redirect back to the cart page
        return redirect('/home/cart');
    }

    public function pesan(Request $request)
    {
        $user_id = auth()->user()->id;
        keranjang::where('id_user', $user_id)->update([
        'status' => 'Sudah Dipesan'
        ]);
        Alert::success('Info', 'Pesanan akan dikemas');
        return redirect('/home');
    }

    public function abort(Request $request)
    {
        $user_id = auth()->user()->id;
        keranjang::where('id_user', $user_id)->update([
        'status' => 'Belum Dipesan'
        ]);
        Alert::success('Info', 'Pesanan telah dibatalkan');
        return redirect('/home/cart');
    }

    public function updateTotal()
    {
        $total = keranjang::where('id_user', auth()->user()->id)->sum('subtotal');
        keranjang::where('id_user', auth()->user()->id)->update(['total' => $total]);
    }

    public function hapusproduk($keranjang)
    {
        // Find the cart item
        $item = Keranjang::find($keranjang);

        if ($item) {
            // Get the product ID and quantity from the cart item
            $productId = $item->id_produk;
            $quantity = $item->jumlah;

            // Increase the stock for the product
            Produk::where('id', $productId)->increment('stok', $quantity);

            // Delete the cart item
            $item->delete();
        }

        return redirect()->back();
    }
}
