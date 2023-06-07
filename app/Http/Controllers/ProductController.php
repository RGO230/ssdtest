<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\PhotoTrait;

class ProductController extends Controller
{
    use PhotoTrait;
    public function index()
    {

        $product = Product::with('category')->with('photoes')->orderBy('id', 'desc')->get();

        return view('product.index')->with('product', $product);
    }
    public function create()
    {
        $category = Category::all();
        return view('product.create', [
            'category' => $category,
        ]);
    }
    public function store(ProductRequest $request)
    {
        $request->validated();
        $product = new Product;
        $product->cover = $this->loadCover($request);
        $product->title = $request->title;
        $product->price = $request->price;
        $product->descr = $request->descr;
        $product->category_id = $request->category_id;
        $product->size = $request->size;
        $product->save();


        $loadedFiles = $this->loadFiles($request);
        $product->photoes()->saveMany($loadedFiles);
        return redirect()->route('product.index');
    }
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('product.edit', [
            'product' => $product,
            'category' => $category,
        ]);
    }
    public function update(Product $product, ProductRequest $request)
    {

        $request->validated();
        $product->update([
            "cover" => $this->loadCover($request),
            "title" => $request->title,
            "price" => $request->price,
            "descr" => $request->descr,
            "price" => $request->price,
            "category_id" => $request->category_id,
            "size" => $request->size,
        ]);
        $loadedFiles = $this->loadFiles($request);
        $product->deletePrevios($request->get('savedFiles', []));
        $product->photoes()->saveMany($loadedFiles);
      

        return redirect()->route('product.index');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
    public function show (){
        $product = Product::with('category')->with('photoes')->get();

        return view('home')->with('product', $product);
        
}
public function shop (){
    $product = Product::with('category')->with('photoes')->get();

    return view('shop')->with('product', $product);
    
}
public function singlePage (Product $product){

    return  view('product-single')->with('product',$product->with('category')->with('photoes')->find($product->id));
    
}
}