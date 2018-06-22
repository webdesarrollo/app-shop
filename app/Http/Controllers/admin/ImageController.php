<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;


class ImageController extends Controller
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
        
        $file=$request->file('imagen');
        $path=public_path().'/imagenes/productos';
        $fileName=uniqid().$file->getClientOriginalName();;
        $moved=$file->move($path,$fileName);
        
        if($moved){
            $productoImagen = new ProductImage();
            $productoImagen->imagen = $fileName;
            $productoImagen->product_id=$request->id;
            $productoImagen->save();
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto=Product::find($id);
        $imagenes=$producto->images;
        return view('admin.productos.imagenes.index',compact('producto','imagenes'));
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
        $imagen=ProductImage::find($id);
        if(substr($imagen->imagen, 0,4)==="http"){
            $deleted=true;
        }else{
           $fullPath=public_path().'/imagenes/productos/'.$imagen->imagen;
            $deleted=File::delete($fullPath);
        }
        
        if($deleted){
            $imagen->delete();
        }
        return back();
    }
}
