<?php

namespace App\Http\Controllers;

use App\Image;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function edit($slug)
    {

        // use native 'Auth' -> so other user can't access personal data edit page
        $user = Auth::user();

        // find if user set image, if not give them default image
        // Accessor in Image model give default value to path, so we have one more check

        $user_image = '/hi-fi_exchange/public/image/ProfilePlaceholder.png';

        if (isset($user->image))
        {
            foreach ($user->image as $item)
            {
               if($item->path == '/hi-fi_exchange/public/image/')
               {
                   $user_image = '/hi-fi_exchange/public/image/ProfilePlaceholder.png';
               } else
               {
                   $user_image = $item->path;
               }
            }

        }


        return view('users.edit', compact('user', 'user_image'));
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
        // use 'Auth' user, so other user can't access person data
        $user = Auth::user();

        $input = $request->except('password', 'repeat_password', 'image');

        // if it is image file in form upload image, insert image path in db, and connect image to user
        if($image = $request->file('image'))
        {
            //first check if user have image, and if have delete image from storage, and db

            if (isset($user->image))
            {
                foreach ($user->image as $item)
                {
                    unlink(public_path() . '/../../' . $item->path);
                }

                Image::where('imageable_type', 'App\User')->where('imageable_id', $user->id)->delete();
            }


            $name = time() . $image->getClientOriginalName();
            $image->move('image', $name);

            // this is not typical insert for image, because we uses "one to one" relation for image,
            // but insert in "one to many" polymorphic table.
            // We uses this type of image insert because we insert image from user and product in one table ("images")
            Image::create(['path' => $name, 'imageable_type' => 'App\User', 'imageable_id' => $user->id]);
        }

        // if user write new password, password will be encrypted
        if($request->password != '' && $request->password === $request->repeat_password)
        {

            $input['password'] = bcrypt($request->password);

            session()->flash('new_password', 'Password is updated.');
        }

        $user->update($input);

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
