<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Http\Requests\Admin\ProductRequest;
use App\ProductGallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardProductsController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries', 'category'])->where('users_id', Auth::user()->id)->get();
        return view('pages.dashboard-products', [
            'products' => $products
        ]); 
    }

    public function detail(Request $request, $id)
    {
        $product = Product::with((['galleries','user','category']))->findOrFail($id);
        $categories = Category::all();

        return view('pages.dashboard-products-detail',[
            'product' => $product,
            'categories' => $categories
        ]);
    }

    public function uploadGallery(Request $request){

        $data = $request->all();

        $data['photo'] = $request->file('photo')->store('assets/product', 'public'); 

        ProductGallery::create($data);

        return redirect()->route('dashboard-products-detail', $request->products_id);
    }

    public function deleteGallery(Request $request, $id){

        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-products-detail', $item->products_id);
    }

    public function create()
    {
        $categories = Category::all();

        return view('pages.dashboard-products-create',[
            'categories' => $categories,
        ]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name); 
        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photo' => $request->file('photo')->store('assets/product','public')
        ];

        ProductGallery::create($gallery);

        return redirect()->route('dashboard-products');
    }

    public function update(ProductRequest $request, $id){

        $data = $request->all();
 
        $item = Product::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('dashboard-products');
    }
}
