<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['only' => ['purchase']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    
        $keyword = $request->input('keyword');
        $query = Product::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
                $products = $query->paginate(12);
        } else {   
            $products = Product::paginate(12);
        }

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.addition');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $image = $request->file('files');

        if($request->hasFile('files') && $image->isValid()){
          $file_name = $image->getClientOriginalName();
          $path = $image->storeAs('public', $file_name, ['disk' => 'local']);
          $path = asset("storage/${file_name}");
        }else{
          $path = null;
        }

        $product = new Product();
        $product->name = $request->input('name');
        $product->image = $path;
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');                
        $product->save();

	    return redirect('products')->with('message-login', '商品が出品されました！！');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $productData = Product::find($id);

        return view('products.show', ['productData' => $productData]);
    }

    public function purchase($id)
    {
        $productData = Product::find($id);
        
        $userData = Auth::user();

        return view('products.purchase', ['productData' => $productData], ['userData' => $userData]);
    }

    public function complete($id)
    {
        $productData = Product::find($id)->decrement('stock', 1);
        return view('products.complete');
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
    public function update(Request $request, Product $product)
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
