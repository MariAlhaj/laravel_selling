<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $products = Product::all();

        return response(['products' => $products  ]);
    }



    public function show_all_products()
    {
        $products = Product::all();



        return view('pages.product',compact('products'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
       return view('pages.create_product',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //name
    //price
    //desc
    //urlimage
    //category_id
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:200',
            'price' => 'required|max:10000|min:10|numeric',
            'desc' => 'required|string|max:200',
            'image' => 'required',
            'category_id' => 'required|numeric',
         ]);



         $filename = $request->file('image')->store('public/images');

         $imageUrl = Storage::url($filename);


         Product::create([
            'name' => $request->name,
            'price' =>  $request->price,
            'desc' => $request->desc,
            'image' => asset($imageUrl),
            'category_id' =>$request->category_id

         ]);

         return redirect()->route('all_products');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return response()->json(['product' => $product]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
       $product =  Product::find($id);
       return view('pages.edit_product',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:200',
            'price' => 'required|max:10000|min:10|numeric',
            'desc' => 'required|string|max:200',
            'image' => 'required',
            'category_id' => 'required|numeric',
         ]);


         $filename = $request->file('image')->store('public/images');
         $imageUrl = Storage::url($filename);


        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->image = asset($imageUrl);
        $product->category_id =$request->category_id;
        $product->save();



         return redirect()->route('all_products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('all_products');
    }
}
