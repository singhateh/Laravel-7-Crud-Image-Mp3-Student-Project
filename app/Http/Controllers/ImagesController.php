<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Images;
use Response;
class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Images::all();
       return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images.create');
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
            // dd($input); die;
            $file = $request->file('file');
            // $employment_image -> image = $request -> image;
            if($file){
                // $file = $request->file('file');
                $fileName = $file->getClientOriginalName();
                $fileSize = $file->getClientSize();
                $extension = $file->getClientOriginalExtension();
                $filename = time().'.'.$extension;
                $file -> move('uploads/documents/', $filename);
                $multi_image = Images::create([
                    'image_tittle'=>$fileName,
                    // 'document_title'=>$fileName,
                    'image_size'=>$fileSize,
                    'image_extension'=>$extension,
                    'image_name'=>$filename,
                    'create_at' => date("Y-m-d H:i:s")
                    ]);

                    if( $multi_image ) {
                        // return Response::json('success', 200);

                     return redirect()->back();
                    } else {
                        // return Response::json('error', 400);
                        return redirect()->back();
                    }
                    // dd($employment_image); die;
            }
    
            
    
            Toastr::success('Image successfully updated!','Success');
            return redirect()->back();
            // return response()->json(['message' => 'Employee  Bank Details Updated Successfully!']);
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
    //    $image_name = $request->get('image_name');
       $user = Images::find($id);
    //    dd($user);
       $user -> delete();
        // Images::where('image_name', $image_name)->delete();
        //     $paath = public_path('uploads/documents/', $filename);
        // if(file_exists ($path)){
        //     unlink($path);
        // }
        return redirect()->route('images.index');
        }

        public function delete($id)
        {
        //    $image_name = $request->get('image_name');
           $user = Images::find($id);
        //    dd($user);
           $user -> delete();
            // Images::where('image_name', $image_name)->delete();
            //     $paath = public_path('uploads/documents/', $filename);
            // if(file_exists ($path)){
            //     unlink($path);
            // }
            return redirect()->route('images.index');
            }
}
