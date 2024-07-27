<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadFileTrait;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use function array_merge;
use function compact;

class ProductController extends Controller
{
    use UploadFileTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category:id,name')->latest()->paginate();
        return view('dashboard.pages.products.index', compact('products'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('dashboard.pages.products.show', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('dashboard.pages.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $imageName = $this->uploadImage($request->file('image'));

        Product::create(array_merge($request->validated(), ['image' => $imageName]));

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
