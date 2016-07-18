<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('approved', 'asc')->orderBy('created_at', 'asc')->get();

        return view('admin.products.approve', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find product
        $product = Product::findOrFail($id);

        // find if product have image, if not give product default image
        // Accessor in Image model give default value to path, so we have one more check

        $product_image = '/hi-fi_exchange/public/image/ProductPlaceholder.jpg';

        if (isset($product->image))
        {
            foreach ($product->image as $item)
            {
                if($item->path == '/hi-fi_exchange/public/image/')
                {
                    $product_image = '/hi-fi_exchange/public/image/ProductPlaceholder.jpg';
                } else
                {
                    $product_image = $item->path;
                }
            }

        }

        // find user who have this product
        $users = $product->users;

        // create array with id of product owner
        $users_array = array();
        foreach ($users as $user)
        {
            $users_array[] = $user->id;
        }

        // Find all user who own this product

        $owners = User::whereIn('id', $users_array)->get();

        return view('admin.products.edit', compact('product', 'product_image', 'owners'));

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
        // function update in this Controller we use to approve or un-approve product

        $product = Product::findOrFail($id);

        if($product->approved === 1)
        {
            $product->update(['approved' => 0]);
        }else
        {
            $product->update(['approved' => 1]);
        }

        return redirect()->back();


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
    




}
