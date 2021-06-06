<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Validator;


use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Http\Request;
use Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $product = Product::all();
        return ProductResource::collection($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file'  => 'required',
            'serie' => 'required',
            'categorie_id' => 'required',


        ]);
        if ($validator->fails()) {

            return response()->json(['error' => $validator->errors()], 401);
        }


        if ($file = $request->file('file')) {
            $path = $file->store('public/image');
            $name = $file->getClientOriginalName();

            //store your file into directory and db
            $prod = new Product();
            $prod->file = $name;
            $prod->serie = $request->serie;
            $prod->categorie_id = $request->categorie_id;
            $prod->save();

            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $file
            ]);
        }
    }
    public function contact()
    {
        $contact = Contact::all();
        return $contact;
    }
    public function categories()
    {
        $countCategories = Category::count();
        return $countCategories;
    }
    public function products()
    {
        $countProducts = Product::count();
        return $countProducts;
    }
    public function getGategories()
    {
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $Product = Product::findOrFail($id);


        $Product->update($request->all());

        return $Product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Product = Product::findOrFail($id);

        $Product->delete();

        return $Product;
    }
}
