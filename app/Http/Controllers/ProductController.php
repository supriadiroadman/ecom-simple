<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $slug = \Str::slug($image->getClientOriginalName());
        $ext = $image->getClientOriginalExtension();
        $Imagename = $slug . '-' . time() . '.' . $ext;

        $image->storeAs('public/uploads', $Imagename);

        $validateData['image'] = $Imagename;
        Product::create($validateData);
        return redirect()->route('products.index')->with('success', "{$validateData['name']} saved successfully");
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $imagePath = "storage/uploads/" . $product->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $image = $request->file('image');
            $slug = \Str::slug($image->getClientOriginalName());
            $ext = $image->getClientOriginalExtension();
            $Imagename = $slug . '-' . time() . '.' . $ext;

            $image->storeAs('public/uploads', $Imagename);
            $validateData['image'] = $Imagename;
        }
        $product->update($validateData);
        return redirect()->route('products.index')->with('success', "{$validateData['name']} updated successfully");
    }


    public function destroy(Product $product)
    {
        $imagePath = "storage/uploads/" . $product->image;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', "{$product->name} deleted successfully");
    }
}
