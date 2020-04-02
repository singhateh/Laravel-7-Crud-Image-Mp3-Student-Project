<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
class ImageControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return view('laravel7.index', compact('images'));
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
            $input = $request->all();
                // dd($input);
                $file = $request->file('file');
                
                if($file)
                {

                    $filename = $file->getClientOriginalName();
                    $filesize = $file->getClientSize();
                    $extension = $file->getClientOriginalExtension();

                    $file_title = time().'.' .$extension;

                    $file -> move('laravel7/images/' , $file_title);

                    $multi_images = Image::create([
                        'image_title' => $filename,
                        'image_name' => $file_title,
                        'image_size' => $filesize,
                        'image_extension' => $extension
                    ]);

                    if ($multi_images ){
                        echo "true";
                        return redirect()->back();
                    }




                }

            
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
        // $delete = Image::find($id);

        // $delete->delete();

        // return redirect()->back();
    }

    public function delete($id)
    {
        $delete = Image::find($id);

        $delete->delete();

        return redirect()->back();
    }
}
