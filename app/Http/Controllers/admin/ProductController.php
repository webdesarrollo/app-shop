<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Redirect;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Product::paginate(6);
        return view('admin.productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Category::orderBy('nombre')->get();
        return view('admin.productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto= new Product();
        $producto->nombre = $request->input('nombre');
        $producto->precio =$request->input('precio');
        $producto->descripcion =$request->input('descripcion');
        $producto->descripcion_larga =$request->input('descripcion_larga');
        $producto->category_id=$request->category_id;
        $producto->save();
        return Redirect::to('/admin/productos');
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
        $producto = Product::find($id);
        $categorias=Category::orderBy('nombre')->get();
        return view('admin.productos.edit',compact('producto','categorias'));
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
        $producto= Product::find($id);
        $producto->nombre = $request->input('nombre');
        $producto->precio =$request->input('precio');
        $producto->descripcion =$request->input('descripcion');
        $producto->descripcion_larga =$request->input('descripcion_larga');
        $producto->category_di =$request->category_id;
        $producto->update();
        return Redirect::to('/admin/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=Product::find($id);
        $producto->delete();
        return back();
    }
}
