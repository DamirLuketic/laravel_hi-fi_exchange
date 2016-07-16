<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id')->all();
        
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // first create db input for product, because we need to have product id for image
        $product = Product::create($request->all());

        if( $image = $request->file('image')){
            
            $name = time() . $image->getClientOriginalName();
            $image->move('image', $name);

            // this is not typical insert for image, because we uses "one to one" relation for image,
            // but insert in "one to many" polymorphic table.
            // We uses this type of image insert because we insert image from user and product in one table ("images")
            Image::create(['path' => $name, 'imageable_type' => 'App\Product', 'imageable_id' => $product->id]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // find product
        $product = Product::findOrFail($id);

        // find user who have this product
        $users = $product->users;

        // create array with id of product owner
        $users_array = array();
        foreach ($users as $user)
        {
            $users_array[] = $user->id;
        }

        // Find if current user is owner of product, and put this data in variable
        if(in_array(Auth::user()->id, $users_array))
        {
            $owner = 1;
        }else
        {
            $owner = 0;
        }

        return view('products.show', compact('product', 'owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    // function for attach product with current user
    
    public function attach_product($product_id)
    {
        $user = Auth::user();

        $user->products()->attach($product_id);

        return redirect()->back();
    }

    // function for detach product from current user

    public function detach_product($product_id)
    {
        $user = Auth::user();

        $user->products()->detach($product_id);

        return redirect()->back();
    }
}
