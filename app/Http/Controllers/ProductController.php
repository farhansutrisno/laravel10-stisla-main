<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index (){
        $product = Product::get();
        return view('product.index_product', compact('product'));

    }

    public function create (){
        return view('product.create_product');
    }

    public function store (Request $request){

        $this->validate($request, [
            'code_product'  => 'required',
            'name'          => 'required',
            'price'         => 'required',
        ]);

        $product = Product::create([
            'code_product'  => $request->code_product,
            'name'          => $request->name,
            'price'         => $request->price,
            'status'        => $request->status,
        ]);

        if($product){

            return redirect()->route('product.index')
            ->with(['success' => 'berhasil menambahkan produk baru']);

        }else{

            return redirect()->back()->withInput()->with(['error' => 'gagal tambah produk']);

        }

    }

    public function destroy($id){

        $product = Product::findOrFail($id);
        $product->delete();

        if($product){

            return redirect()->route('product.index')
            ->with([
                'success' => 'produk berhasil dihapus!!'
            ]);

        }else{

            return redirect()->route('product.index')
            ->with([
                'error' => 'produk gagal dihapus!!'
            ]);

        }

    }

    public function edit($id){

        $product = Product::findOrFail($id);
        return view('product.edit_product', compact('product'));

    }

    public function update(Request $request, $id){

        $product = Product::findOrFail($id);

        $product->update([
            'code_product'  => $request->code_product,
            'name'          => $request->name,
            'price'         => $request->price,
            'status'        => $request->status,
        ]);

        if($product){

            return redirect()->route('product.index')
            ->with(['success' => 'berhasil mengubah produk']);

        }else{

            return redirect()->back()->withInput()
            ->with(['error' => 'gagal tambah produk']);

        }

    }

}
